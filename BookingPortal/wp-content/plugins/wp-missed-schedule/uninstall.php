<?php 

	/**
	 * @package     WordPress Plugin
	 * @subpackage  WP Missed Schedule
	 * @description Uninstall Module
	 * @status      Stable
	 * @todolist    Code in Becoming!
	 * @license     GPLv2 or later
	 *
	 * @humans      //humanstxt.org/Standard.html
	 * @indentation //www.gnu.org/prep/standards/standards.html
	 * @license     //www.gnu.org/licenses/gpl-2.0.html
	 * @link        //wordpress.org/plugins/wp-missed-schedule/
	 *
	 * @build  2015-09-26
	 * @author sLa NGjI's @ slangji.wordpress.com
	 *
	 * @since  WordPress 2.7+
	 * @tested WordPress 4.4+
	 */

	defined ( 'ABSPATH' ) OR exit;

	defined ( 'WPINC' ) OR exit;

	defined ( 'WP_UNINSTALL_PLUGIN' ) OR exit;

	$option_names = array( 
			'byrev_fixshedule_next_verify',
			'missed_schedule',
			'scheduled_post_guardian_next_run',
			'simpul_missed_schedule',
			'wpt_scheduled_check',
			'wp_missed_schedule',
			'wp_scheduled_missed',
			'wp_scheduled_missed_options',
	);

	global $wp_version;

	if ( $wp_version >= 3.0 )
		{
			if ( ! is_multisite() )
				{
					foreach ( $option_names as $option_name )
						{
							delete_option( $option_name );
						}
				}

			if ( is_multisite() )
				{
					foreach ( $option_names as $option_name )
						{
							delete_option( $option_name );
						}

					global $wpdb;

					$blog_ids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );
					$original_blog_id = get_current_blog_id();

					foreach ( $blog_ids as $blog_id )
						{
							switch_to_blog( $blog_id );

							foreach ( $option_names as $option_name )
								{
									delete_site_option( $option_name );
								}
						}
					switch_to_blog( $original_blog_id );
				}
		}
?>