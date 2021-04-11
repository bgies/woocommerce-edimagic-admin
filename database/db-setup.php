<?php

namespace Bgies\WooCommerce\EDIAdmin;


CREATE TABLE wp_sb_teams(
 team_id INTEGER NOT NULL AUTO_INCREMENT,
 team_name TEXT NOT NULL,
 team_city TEXT NOT NULL,
 team_state TEXT NOT NULL,
 team_stadium TEXT NOT NULL,
 PRIMARY KEY (team_id))

 
 defined( 'ABSPATH' ) or exit;
 
 /**
  * Admin handler.
  *
  * @since 1.10.0
  */
 class DatabaseSetup {
    
 
function sports_bench_create_db() {
   global $wpdb;
   $charset_collate = $wpdb->get_charset_collate();
   require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

 //* Create the teams table
 $table_name = $wpdb->prefix . 'sb_teams';
 $sql = "CREATE TABLE $table_name (
 team_id INTEGER NOT NULL AUTO_INCREMENT,
 team_name TEXT NOT NULL,
 team_city TEXT NOT NULL,
 team_state TEXT NOT NULL,
 team_stadium TEXT NOT NULL,
 PRIMARY KEY (team_id)
 ) $charset_collate;";
 dbDelta( $sql );
}
register_activation_hook( __FILE__, 'sports_bench_create_db' );