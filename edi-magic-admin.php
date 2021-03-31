

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}





/**
 * Check if WooCommerce is active
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    // Put your plugin code here
}


class WC_Acme {

      public function __construct() {
        // called just before the woocommerce template functions are included
        add_action( 'init', array( $this, 'include_template_functions' ), 20 );

        // called only after woocommerce has finished loading
        add_action( 'woocommerce_init', array( $this, 'woocommerce_loaded' ) );

        // called after all plugins have loaded
        add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ) );

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
       * Override any of the template functions from woocommerce/woocommerce-template.php
       * with our own template functions file
       */
      public function include_template_functions() {
        include( 'woocommerce-template.php' );
      }

      /**
       * Take care of anything that needs woocommerce to be loaded.
       * For instance, if you need access to the $woocommerce global
       */
      public function woocommerce_loaded() {
        // ...
      }

      /**
       * Take care of anything that needs all plugins to be loaded
       */
      public function plugins_loaded() {
        // ...
      }
  }

    // finally instantiate our plugin class and add it to the set of globals

    $GLOBALS['wc_acme'] = new WC_Acme();
    
    
    
    