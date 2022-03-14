<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

/**
 * Class DLDC_API
 *
 * This class contains repetitive functions that
 * are used globally within the plugin.
 *
 * @package		DLDC
 * @subpackage	Classes/DLDC_API
 * @author		Mohamed Yassin
 * @since		1.0.0
 */

class DLDC_API
{
	function __construct()
	{
		add_action( 'rest_api_init', function () {
			register_rest_route( 'dldc/v1', '/like_comment/', array(
			  'methods' => 'GET',
			  'callback' => array( $this, 'like_comment'  ) ,
			  'permission_callback' => '__return_true',
			) );
		} );
    }

	public function like_comment($data)
	{
		$nonce	= $data->get_param( 'nonce' );

		$this->verify_access( $nonce );

		$id			= $data->get_param( 'id' );
		
		$counter	= $this->likes_counter($id);
		$counter	= $counter + 1;

		update_comment_meta( $id, 'likes_counter', $counter, true );

		wp_send_json_success(
			array(
				'id' 		=> $id,
				'process' 	=> 'like',
				'counter' 	=> $counter
			)
		);
	}

	public function likes_counter( $id = null )
	{
		if( $id == null ){
			$id = $data->get_param( 'id' );
		}

		$counter 	= get_comment_meta( $id , 'likes_counter' , true );
		$counter	= (int)$counter > 0 ? $counter : 0;
		return $counter;
	}

	public function verify_access( $nonce = null ){

		// exit if the provided nonce not correct
		if( $nonce !== null && wp_verify_nonce( $nonce, 'dlds-action-nonce' ) !== false ){
			return true ;
		}
		
		//  for API only , 'token_dlds' plays as a dummy token
		if( isset( $_REQUEST['dlds_token'] ) && $_REQUEST['dlds_token'] === 'token_dlds' ){
			return true;
		}

		wp_send_json_success(
			array(
				'error'		=> true,
				'msg'		=> 'You are not allowed'
			)
		);	
	}

}