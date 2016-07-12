<?php
/**
*Plugin Name: Irontek Agency Platform
*Plugin URI: http://www.irontekagency.com/
*Author: Timurtek Bizel
*Author URI: http://www.timurtek.com/
*Version: 0.0.1
*License: GPLv2
*/

function dwwp_remove_dashboard_widget(){
  remove_meta_box('dashboard_primary','dashboard','postbox-container-2');
}
add_action( 'wp_dashboard_setup', 'dwwp_remove_dashboard_widget' );
