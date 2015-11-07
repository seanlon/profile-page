<?php

/*
  Plugin Name: BirchPress Scheduler
  Plugin URI: http://www.birchpress.com
  Description: An appointment booking and online scheduling plugin that allows service businesses to take online bookings.
  Version: 1.10.5
  Author: BirchPress
  Author URI: http://www.birchpress.com
  License: GPLv2
 */

if ( defined( 'ABSPATH' ) && ! defined( 'BIRCHSCHEDULE' ) ) {

	define( 'BIRCHSCHEDULE', true );

	require_once 'lib/vendor/autoload.php';

	if ( is_file( dirname( __DIR__ ) . '/birchpress/birchpress.php' ) ) {
		require_once dirname( __DIR__ ) . '/birchpress/birchpress.php';
		birchpress_load_common_framework();
	} else {
		require_once 'framework/includes/birchpress.inc.php';
		global $birchpress;
		$birchpress->set_framework_url( plugins_url() . '/' . basename( __FILE__, '.php' ) . '/framework' );
	}

	require_once 'includes/legacy_hooks.php';

	require_once 'includes/package.php';

	global $birchschedule;

	$birchschedule->set_plugin_file_path( __FILE__ );
	$birchschedule->set_product_version( '1.10.5' );
	$birchschedule->set_product_name( 'BirchPress Scheduler' );
	$birchschedule->set_product_code( 'birchschedule' );

	$birchschedule->run();

}
