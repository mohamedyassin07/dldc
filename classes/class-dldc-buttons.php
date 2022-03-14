<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

/**
 * Class DLDC_Settings
 *
 * This class contains repetitive functions that
 * are used globally within the plugin.
 *
 * @package		DLDC
 * @subpackage	Classes/DLDC_Settings
 * @author		Mohamed Yassin
 * @since		1.0.0
 */

class DLDC_Buttons
{
	public $settings; // buttons plugin settings
	public $comment_id; // current comment id

	function __construct(){
		add_action( 'wp_enqueue_scripts', array( $this, 'load_assets') );
		add_filter( 'comment_reply_link', array( $this, 'render_buttons'  ) , 10 , 4  );
    }

	public function load_assets()
	{
		$rand_ver = date('d M Y H:i:s:').rand( 1000,10000 ); // preventing any cashing

		wp_enqueue_style('DLDC-frontend', DLDC_PLUGIN_URL . 'assets/css/frontend.css', array(), $rand_ver , 'all');
		wp_enqueue_script('DLDC-frontend',DLDC_PLUGIN_URL . 'assets/js/frontend.js', array('jquery'), $rand_ver, true );
		wp_localize_script( 'DLDC-frontend', 'dldc', array(
			'plugin_name'	=> __( 'DLDC', 'DLDC' ),
			'endpoint'		=> get_rest_url( null, '/dldc/v1/like_comment/' ),
			'nonce'			=> wp_create_nonce( 'dlds-action-nonce' )
		));
	}

	public function render_buttons( $link, $args, $comment, $post )
	{
		$this->comment_id 	= $comment->comment_ID;
		$this->settings 	= get_option( 'dldc_options' );
		$html 				= $link;

		if( $this->restrictions() ){
			return $html;
		}

		// add the like btn
		if( $this->settings['display_mode'] == 1 || $this->settings['display_mode'] == 3 ){
			$html 		.= $this->like_btn();
		}

		// add the dislike btn
		if( $this->settings['display_mode'] == 2 || $this->settings['display_mode'] == 3 ){
			//$html 	.= $this->dislike_btn();
		}


		// add the like btn
		if( $this->settings['display_the_counters'] == 1 || $this->settings['display_the_counters'] == 3 ){
			$html 	.= $this->like_counter();

		}
		
		// add the dislike btn
		if( $this->settings['display_the_counters'] == 2 || $this->settings['display_the_counters'] == 3 ){
			//$html 	.= $this->dislike_counter();
		}

		return $html;
	}

	public function restrictions()
	{
		if( $this->settings['restrictions'] == 1 && !get_current_user_id() > 0 ){
			return true;
		}

		return false;
	}

	public function like_btn()
	{
		return sprintf(
			'<a href="#" data-comment-id="%d" data-type="%s" title="%s" class="dldc-btn like">%s</a>',
			$this->comment_id,
			'like',
			__( 'like', 'DLDC' ),
			__( 'like', 'DLDC' )
		);
	}

	public function like_counter()
	{

		$counter 	= get_comment_meta( $this->comment_id , 'like_counter' , true );
		$counter	= (int)$counter > 0 ? $counter : 0;

		return sprintf(
			'<span id="likes-counter-%d">%d</span>'.__(' likes' , 'dldc'),
			$this->comment_id,
			$counter
		);
	}
}