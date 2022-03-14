<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! class_exists( 'DLDC' ) ) :

	/**
	 * Main DLDC Class.
	 *
	 * @package		DLDC
	 * @subpackage	Classes/DLDC
	 * @since		1.0.0
	 * @author		Mohamed Yassin
	 */
	final class DLDC {

		/**
		 * The real instance
		 *
		 * @access	private
		 * @since	1.0.0
		 * @var		object|DLDC
		 */
		private static $instance;

		/**
		 * DLDC helpers object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|DLDC_Helpers
		 */
		public $helpers;

		/**
		 * DLDC settings object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|DLDC_Settings
		 */
		public $settings;

		/**
		 * Throw error on object clone.
		 *
		 * Cloning instances of the class is forbidden.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __clone() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to clone this class.', 'DLDC' ), '1.0.0' );
		}

		/**
		 * Disable unserializing of the class.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to unserialize this class.', 'DLDC' ), '1.0.0' );
		}

		/**
		 * Main DLDC Instance.
		 *
		 * Insures that only one instance of DLDC exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @access		public
		 * @since		1.0.0
		 * @static
		 * @return		object|DLDC	The one true DLDC
		 */
		public static function instance() {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof DLDC ) ) {
				/**
				 * Fire a custom action to allow dependencies
				 * before the plugin setup
				 */
				do_action( 'DLDC/before_plugin_loaded' );

				self::$instance	= new DLDC;
				self::$instance->includes();
				self::$instance->add_hooks();

				// run required classes
				if ( is_admin() ){
					new DLDC_Settings_Page;
				}

				new DLDC_Buttons;
				new DLDC_API;

				/**
				 * Fire a custom action to allow dependencies
				 * after the successful plugin setup
				 */
				do_action( 'DLDC/plugin_loaded' );
			}

			return self::$instance;
		}

		
		/**
		 * Include required files.
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function includes() {
			require_once DLDC_PLUGIN_DIR . 'classes/class-DLDC-settings-page.php';
			require_once DLDC_PLUGIN_DIR . 'classes/class-dldc-api.php';
			require_once DLDC_PLUGIN_DIR . 'classes/class-dldc-buttons.php';
		}

		/**
		 * Add base hooks for the core functionality
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function add_hooks() {
			add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
			add_action( 'plugin_action_links_' . DLDC_PLUGIN_BASE, array( $this, 'add_plugin_action_link' ), 20 );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_backend_scripts_and_styles' ), 20 );	
		}


		/**
		 * Loads the plugin language files.
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function load_textdomain() {
			load_plugin_textdomain( 'DLDC', FALSE, dirname( plugin_basename( DLDC_PLUGIN_FILE ) ) . '/languages/' );
		}

		/**
		* Adds action links to the plugin list table
		*
		* @access	public
		* @since	1.0.0
		*
		* @param	array	$links An array of plugin action links.
		*
		* @return	array	An array of plugin action links.
		*/
		public function add_plugin_action_link( $links ) {
			$settings_link = sprintf( 
				'<a href="%s" title="%s" style="font-weight:700;">%s</a>',
				admin_url('admin.php?page='.DLDC_SLUG ), 
				__( 'Settings', 'DLDC' ),
				__( 'Settings', 'DLDC' )
			);
			array_unshift( $links, $settings_link );	
			return $links;
		}

		/**
		 * Enqueue the backend related scripts and styles for this plugin.
		 * All of the added scripts andstyles will be available on every page within the backend.
		 *
		 * @access	public
		 * @since	1.0.0
		 *
		 * @return	void
		 */
		public function enqueue_backend_scripts_and_styles() {
			wp_enqueue_script( 'DLDC-backend-scripts', DLDC_PLUGIN_URL . 'includes/assets/js/backend-scripts.js', array(), DLDC_VERSION, false );
			wp_localize_script( 'DLDC', 'DLDC', array(
				'plugin_name'   	=> __( 'DLDC', 'DLDC' ),
			));
		}

		private function plugin_updater(Type $var = null)
		{
			if ((string) get_option('my_licence_key') !== '') {			
				$updater = new PDUpdater(__FILE__);
				$updater->set_username('username-here');
				$updater->set_repository('repository-name-here');
				$updater->authorize(get_option('my_licence_key'));
				$updater->initialize();
			}
			
		}		
}

endif; // End if class_exists check.