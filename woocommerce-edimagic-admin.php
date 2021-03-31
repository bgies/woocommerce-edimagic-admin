<?php
/*
Plugin Name: WooCommerce EDI Magic Admin
Plugin URI: http://edishack.com
Description: WooCommerce EDI Magic custom plugin
Author: R. Brad Gies
Author URI: http://edishack.com
Version: 1.0.0

	Copyright: © 2021 bgies Enterprises Limited (email : info@edishack.com)
	License: GNU General Public License v3.0
	License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

/**
 * Check if WooCommerce is active
 */
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
   
   if ( ! class_exists( 'WC_EDI_Magic_Admin' ) ) {
  
      /**
       * Localisation
       **/
      load_plugin_textdomain( 'wc_edi_magic_admin', false, dirname( plugin_basename( __FILE__ ) ) . '/' );
  
      class WC_EDI_Magic_Admin {
         
         public function __construct() {
            
            // called only after woocommerce has finished loading
            add_action( 'woocommerce_init', array( &$this, 'woocommerce_loaded' ) );
            
            // called after all plugins have loaded
            add_action( 'plugins_loaded', array( &$this, 'plugins_loaded' ) );
            
            // called just before the woocommerce template functions are included
            add_action( 'init', array( &$this, 'include_template_functions' ), 20 );
            
            // indicates we are running the admin
            if ( is_admin() ) {
               // ...
               
            }
            
            // indicates we are being served over ssl
            if ( is_ssl() ) {
               // ...
            }
            
            // take care of anything else that needs to be done immediately upon plugin instantiation, here in the constructor
            
            
            
         }
  
  
         /**
          * Take care of anything that needs woocommerce to be loaded.
          * For instance, if you need access to the $woocommerce global
          */
         public function woocommerce_loaded() {
            global $woocommerce;
            $this->id = 'edi-magic-admin';
            $this->method_title = __( 'EDI Magic Admin');
            $this->method_description = __( 'EDI Magic Admin - manage your EDI files easily');
            // Load the settings.
            //$this->init_form_fields();
            $this->init_settings();
            // Define user set variables.
            $this->custom_name = $this->get_option( 'custom_name' );
            // Actions.
            add_action( 'woocommerce_update_options_integration_' .  $this->id, array( $this, 'process_admin_options' ) );
            
         }
         
         /**
          * Take care of anything that needs all plugins to be loaded
          */
         public function plugins_loaded() {
            // ...
            
         }
         
         /**
          * Override any of the template functions from woocommerce/woocommerce-template.php
          * with our own template functions file
          */
         public function include_template_functions() {
            include( 'woocommerce-template.php' );
            
            
         }
      }
      
      // finally instantiate our plugin class and add it to the set of globals
      $GLOBALS['wc_edi_magic_admin'] = new WC_EDI_Magic_Admin();
  
  }
  
  
}  
