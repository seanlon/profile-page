<?php 
/*
Plugin Name: WP Missed Schedule
Plugin URI: //slangji.wordpress.com/wp-missed-schedule/
Description: WordPress Plugin WP <code>Missed Schedule</code> Fix Schedules <code>Failed Future Posts</code> Scheduled <code>Virtual Cron Job</code>: find only all that match this problem, re-publish correctly 10 items each session, every 10 minutes, the others on next sessions, for no waste resources, until no longer exist. The configuration of this plugin is Automatic! Cron link requires <a title="WP Crontrol plugin active is required for Cron Link" href="//wordpress.org/plugins/wp-crontrol/">WP Crontrol</a> activated and WP 2.7+ or later. <a title="Try New Stable Beta Version Branche 2015" href="//slangji.wordpress.com/wp-missed-schedule-beta/">Beta Branche 2015</a> - Free (UNIX STYLE) Stable Branche 2014 - Version 2014.1231 - Revision 2015 - Build 2015-09-26
Version: 2014.1231.2015
Requires at least: 2.1
KeyTag: 7f71ee70ea1ce6795c69c81df4ea13ac5cf230b4
Author: sLa NGjI's
Author URI: //slangji.wordpress.com/
Network: true
Text Domain: wp-missed-schedule
Domain Path: /languages
License: GPLv2 or later
License URI: //www.gnu.org/licenses/gpl-2.0.html
Indentation: GNU style coding standard
Indentation URI: //www.gnu.org/prep/standards/standards.html
Humans: We are the humans behind
Humans URI: //humanstxt.org/Standard.html
 *
 * ALPHA DEVELOPMENT Release is available only on [GitHub](//github.com/slangji)
 *
 * BETA Release: Version 2015 Build 0228 Revision 4
 *
 * REQUIREMENTS
 *
 * To run this plugin on your WordPress host just needs a couple of things:
 *
 *   PHP version 5.2+ or   later (recommended:   PHP 5.3+ or   later - best:   PHP 5.4+ or   later)
 * MySQL version 5.0+ or greater (recommended: MySQL 5.5+ or greater - best: MySQL 5.7+ or greater)
 *
 * We recommend Apache or Nginx as the most robust and featureful server for running WordPress,
 * but any server that supports PHP and MySQL will do.
 *
 * Work also with PHP 4+ or later and MySQL 4+ or greater (depending of hosting features and WordPress version)
 *
 * CONFIGURATION
 *
 * The configuration of this plugin is automatic: settings is only to modify default values on WP 2.7+ or later.
 *
 * LICENSING (license.txt)
 *
 * [WP Missed Schedule](//wordpress.org/plugins/wp-missed-schedule/)
 *
 * Fix Missed Schedule Schedules Failed Future Posts Scheduled Virtual Cron Job.
 *
 * This plugin patched an important big problem unfixed since WordPress 2.5+ to date.
 *
 * Copyright (C) 2007-2015 [sLaNGjIs](//slangji.wordpress.com/) (email: <slangjis [at] googlegmail [dot] com>))
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the [GNU General Public License](//wordpress.org/about/gpl/)
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * on an "AS IS", but WITHOUT ANY WARRANTY; without even the implied
 * warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, see [GNU General Public Licenses](//www.gnu.org/licenses/),
 * or write to the Free Software Foundation, Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301, USA.
 *
 * DISCLAIMER
 *
 * This program is distributed "AS IS" in the hope that it will be useful, but:
 * without any warranty of function, without any warranty of merchantability,
 * without any fitness for a particular or specific purpose, without any type
 * of future assistance from your own author or other authors.
 *
 * The license under which the WordPress software is released is the GPLv2 (or later) from the
 * Free Software Foundation. A copy of the license is included with every copy of WordPress.
 *
 * Part of this license outlines requirements for derivative works, such as plugins or themes.
 * Derivatives of WordPress code inherit the GPL license.
 *
 * There is some legal grey area regarding what is considered a derivative work, but we feel
 * strongly that plugins and themes are derivative work and thus inherit the GPL license.
 *
 * The license for this software can be found on [Free Software Foundation](//www.gnu.org/licenses/gpl-2.0.html)
 * and as license.txt into this plugin package.
 *
 * The author of plugin is available at any time, to make changes, or corrections, to respect specifications.
 *
 * THERMS
 *
 * This uses (or it parts) code derived from:
 *
 * wp-header-footer-login-log.php by slangjis <slangjis [at] googlemail [dot] com>
 * Copyright (C) 2007-2015 [sLaNGjIs](//slangji.wordpress.com/) (email: <slangjis [at] googlemail [dot] com>)
 *
 * according to the terms of the GNU General Public License version 2 (or later).
 *
 * This wp-header-footer-login-log.php uses (or it parts) code derived from:
 *
 * wp-login-log.php by slangjis <slangjis [at] googlemail [dot] com>
 * Copyright (C) 2009 [sLaNGjIs](//slangji.wordpress.com/) (email: <slangjis [at] googlemail [dot] com>)
 *
 * wp-header-log.php by slangjis <slangjis [at] googlemail [dot] com>
 * Copyright (C) 2008 [sLaNGjIs](//slangji.wordpress.com/) (email: <slangjis [at] googlemail [dot] com>)
 *
 * wp-footer-log.php by slangjis <slangjis [at] googlemail [dot] com>
 * Copyright (C) 2007 [sLaNGjIs](//slangji.wordpress.com/) (email: <slangjis [at] googlemail [dot] com>)
 *
 * according to the terms of the GNU General Public License version 2 (or later).
 *
 * According to the Terms of the GNU General Public License version 2 (or later) part of Copyright
 * belongs to your own author and part belongs to their respective others authors:
 *
 * Copyright (C) 2007-2009 [sLaNGjIs](//slangji.wordpress.com/) (email: <slangjis [at] googlemail [dot] com>)
 *
 * VIOLATIONS
 *
 * [Violations of the GNU Licenses](//www.gnu.org/licenses/gpl-violation.en.html)
 * The author of plugin is available at any time, to make changes, or corrections, to respect specifications.
 *
 * GUIDELINES
 *
 * This software meet [Detailed Plugin Guidelines](//wordpress.org/plugins/about/guidelines/)
 * paragraphs 1,4,10,12,13,16,17 quality requirements.
 * The author of plugin is available at any time, to make changes, or corrections, to respect specifications.
 *
 * CODING
 *
 * This software implement [GNU style](//www.gnu.org/prep/standards/standards.html) coding standard indentation.
 * The author of plugin is available at any time, to make changes, or corrections, to respect specifications.
 *
 * VALIDATION
 *
 * This readme.txt rocks. Seriously. Flying colors. It meet the specifications according to
 * WordPress [Readme Validator](//wordpress.org/plugins/about/validator/) directives.
 * The author of plugin is available at any time, to make changes, or corrections, to respect specifications.
 *
 * HUMANS (humans.txt)
 *
 * We are the Humans behind this project [humanstxt.org](//humanstxt.org/Standard.html)
 *
 * This software meet detailed humans rights belongs to your own author and to their respective other authors.
 * The author of plugin is available at any time, to make changes, or corrections, to respect specifications.
 *
 * THANKS
 *
 * [nicokaiser](//wordpress.org/support/topic/plugin-uses-post_date_gmt-which-is-not-indexed)
 * Jack Hayhurst <jhayhurst [at] liquidweb [dot] com> MySQL Queries with Server Load Optimization and Index Suggestion.
 * [Arkadiusz Rzadkowolski](//profiles.wordpress.org/fliespl/) HyperDB table_name from query broken in select query.
 * [milewis1](//profiles.wordpress.org/milewis1/) WordPress blog's timezone implementation instead of the MySQL time.
 *
 * CHANGELOG
 *
 * [to-do list and changelog](//wordpress.org/plugins/wp-missed-schedule/changelog/)
 */

	/**
	 * @package     WP Missed Schedule
	 * @subpackage  WordPress PlugIn
	 * @description Fix Missed Schedule Schedules Failed Future Posts Scheduled Virtual Cron Job
	 * @noted       This plugin patched an important big problem unfixed since WordPress 2.5+ to date
	 * @install     The configuration of this plugin is Automatic!
	 * @author      slangjis
	 * @status      STABLE
	 * @requires    2.1+
	 * @since       2.5+
	 * @tested      2.6+
	 * @branche     2014
	 * @revision    2015
	 * @release     2014.1231
	 * @version     2014.1231.2015
	 * @build       2015-09-26
	 * @license     GPLv2 or later
	 * @indentation GNU style coding standard
	 * @keybit      eLCQM540z78BbFMtmFXj3lC62b79H8651411574J4YQCb3g46FsK338kT29FPANa8
	 * @keysum      FBE04369B6316C2D32562B10398C60D7461AEC7B
	 * @keytag      7f71ee70ea1ce6795c69c81df4ea13ac5cf230b4
	 */

	defined( 'ABSPATH' ) OR exit;

	defined( 'WPINC' ) OR exit;

	if ( ! function_exists( 'add_action' ) )
		{
			header( 'HTTP/0.9 403 Forbidden' );
			header( 'HTTP/1.0 403 Forbidden' );
			header( 'HTTP/1.1 403 Forbidden' );
			header( 'Status: 403 Forbidden' );
			header( 'Connection: Close' );
				exit;
		}

	global $wp_version;

	if ( $wp_version < 2.1 )
		{
			if ( $wp_version >= 2.5 )
				{
					function wpms_psd()
						{
							deactivate_plugins( plugin_basename( __FILE__ ) );
						}
					add_action( 'admin_init', 'wpms_psd', 0 );
				}

			wp_die( __( 'WP Missed Schedule requires WordPress 2.1+ or greater Activation Stopped', 'wp-missed-schedule' ) );
				exit;
		}
	else
		{

	function wpms_activation()
		{
			if ( ! current_user_can( 'activate_plugins' ) )
				return;

			delete_option( 'byrev_fixshedule_next_verify' );
			delete_option( 'missed_schedule' );
			delete_option( 'scheduled_post_guardian_next_run' );
			delete_option( 'simpul_missed_schedule' );
			delete_option( 'wpt_scheduled_check' );
			delete_option( 'wp_missed_schedule' );
			delete_option( 'wp_scheduled_missed' );

			global $wp_version;

			if ( $wp_version >= 2.8 )
				{
					delete_transient( 'wp_scheduled_missed' );
					delete_transient( 'timeout_wp_scheduled_missed' );
				}

			wp_clear_scheduled_hook( 'missed_schedule_cron' );
			wp_clear_scheduled_hook( 'wp_missed_schedule' );
			wp_clear_scheduled_hook( 'wp_scheduled_missed' );
		}
	register_activation_hook( __FILE__, 'wpms_activation', 0 );

	function wpms_1st()
		{
			if ( ! current_user_can( 'activate_plugins' ) )
				return;

			$wp_path_to_this_file = preg_replace( '/(.*)plugins\/(.*)$/', WP_PLUGIN_DIR . "/$2", __FILE__ );
			$this_plugin          = plugin_basename( trim( $wp_path_to_this_file ) );
			$active_plugins       = get_option( 'active_plugins' );
			$this_plugin_key      = array_search( $this_plugin, $active_plugins );

			if ( $this_plugin_key )
				{
					array_splice( $active_plugins, $this_plugin_key, 1 );
					array_unshift( $active_plugins, $this_plugin );
					update_option( 'active_plugins', $active_plugins );
				}
		}
	add_action( 'activated_plugin', 'wpms_1st', 0 );

	function wpms_languages()
		{
			if ( ! current_user_can( 'activate_plugins' ) )
				return;

			load_plugin_textdomain( 'wp-missed-schedule', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
		}
	add_action( 'plugins_loaded', 'wpms_languages', 0 );

	define( 'WPMS_OPTION', 'wp_scheduled_missed' );

	function wpms_init()
		{
			global $wp_version;

			if ( $wp_version < 2.8 )
				{
					$wp_scheduled_missed = get_option( WPMS_OPTION, false );

					if ( ( $wp_scheduled_missed !== false ) && ( $wp_scheduled_missed > ( time() - ( 600 ) ) ) )
						return;
				}

			if ( $wp_version >= 2.8 )
				{
					$wp_scheduled_missed = get_option( WPMS_OPTION, false );

					get_transient( 'wp_scheduled_missed', $wp_scheduled_missed, 600 );

					if ( ( $wp_scheduled_missed !== false ) && ( $wp_scheduled_missed > ( time() - ( 600 ) ) ) )
						return;

					set_transient( 'wp_scheduled_missed', $wp_scheduled_missed, 600 );
				}

			update_option( WPMS_OPTION, time() );

			if ( $wp_version >= 2.3 )
				{
					global $wpdb;

					$qry = <<<SQL
 SELECT ID FROM {$wpdb->posts} WHERE ( ( post_date > 0 && post_date <= %s ) ) AND post_status = 'future' LIMIT 0,10 
SQL;

					$sql = $wpdb->prepare( $qry, current_time( 'mysql', 0 ) );

					$scheduledIDs = $wpdb->get_col( $sql );
				}

			if ( $wp_version < 2.3 )
				{
					global $wpdb;

					$scheduledIDs = $wpdb->get_col( "SELECT`ID`FROM `{$wpdb->posts}` " . " WHERE ( " . " ( ( `post_date` > 0 ) && ( `post_date` <= CURRENT_TIMESTAMP() ) ) OR " . " ( ( `post_date_gmt` > 0 ) && ( `post_date_gmt` <= UTC_TIMESTAMP() ) ) " . " ) AND `post_status` = 'future' LIMIT 0,10" );
				}

			if ( ! count( $scheduledIDs ) )
				return;

			foreach ( $scheduledIDs as $scheduledID )
				{
					if ( ! $scheduledID )
						continue;

					wp_publish_post( $scheduledID );
				}
		}
	add_action( 'init', 'wpms_init', 0 );

	if ( $wp_version < 2.8 )
		{
			function wpms_asal( $links, $file )
				{
					if ( $file == plugin_basename( __FILE__ ) )
						{
							global $wp_version;

							if ( $wp_version >= 2.7 )
								{
									$wpms_settings_action_links_1 = '<a title="'. __( 'View Your Missed Scheduled Failed Future Posts', 'wp-missed-schedule' ) .'" href="edit.php?post_status=future&post_type=post">'. __( 'Missed', 'wp-missed-schedule' ) .'</a>';
									$wpms_settings_action_links_2 = '<a title="'. __( 'Requires WP Crontrol Plugin Activated', 'wp-missed-schedule' ) .'" href="tools.php?page=crontrol_admin_manage_page">'. __( 'Cron', 'wp-missed-schedule' ) .'</a>';

									array_unshift( $links, $wpms_settings_action_links_1 );
									array_unshift( $links, $wpms_settings_action_links_2 );
								}

							if ( ( $wp_version >= 2.5 ) and ( $wp_version < 2.7 ) )
								{
									$wpms_settings_action_links_1 = '<a title="'. __( 'View Your Missed Scheduled Failed Future Posts', 'wp-missed-schedule' ) .'" href="edit.php?post_status=future&post_type=post">'. __( 'Missed', 'wp-missed-schedule' ) .'</a>';

									array_unshift( $links, $wpms_settings_action_links_1 );
								}
						}
					return $links;
				}
			add_filter( 'plugin_action_links', 'wpms_asal', null, 2 );
		}

	if ( $wp_version >= 2.8 )
		{
			function wpms_pral( $links )
				{
					$links[] = '<a title="'. __( 'Requires WP Crontrol Plugin Activated', 'wp-missed-schedule' ) .'" href="tools.php?page=crontrol_admin_manage_page">'. __( 'Cron', 'wp-missed-schedule' ) .'</a>';
					$links[] = '<a title="'. __( 'View Your Missed Scheduled Failed Future Posts', 'wp-missed-schedule' ) .'" href="edit.php?post_status=future&post_type=post">'. __( 'Miss', 'wp-missed-schedule' ) .'</a>';
						return $links;
				}

			global $wp_version;

			if ( $wp_version >= 3.0 )
				{
					if ( ! is_multisite() )
						{
							add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'wpms_pral', 10, 1 );
						}

					if ( is_multisite() )
						{
							add_filter( 'network_admin_plugin_action_links_' . plugin_basename(__FILE__) , 'wpms_pral', 10, 1 );
						}
				}

			if ( $wp_version < 3.0 )
				{
					add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'wpms_pral', 10, 1 );
				}

			function wpms_prml( $links, $file )
				{
					if ( ! is_admin() && ! current_user_can( 'administrator' ) )
						return;

					if ( $file == plugin_basename( __FILE__ ) )
						{
							$links[] = '<a title="'. __( 'Offer a Beer to sLa', 'wp-missed-schedule' ) .'" href="//slangji.wordpress.com/donate/">'. __( 'Donate', 'wp-missed-schedule' ) .'</a>';
							$links[] = '<a title="'. __( 'Bugfix and Suggestions', 'wp-missed-schedule' ) .'" href="//slangji.wordpress.com/contact/">'. __( 'Contact', 'wp-missed-schedule' ) .'</a>';
							$links[] = '<a title="'. __( 'Visit other author plugins', 'wp-missed-schedule' ) .'" href="//slangji.wordpress.com/plugins/">'. __( 'Other', 'wp-missed-schedule' ) .'</a>';
						}
					return $links;
				}
			add_filter( 'plugin_row_meta', 'wpms_prml', 10, 2 );
		}

	function wpms_shfl()
		{
			if ( ! is_home() && ! is_front_page() )
				return;

			echo "\r\n<!--Plugin WP Missed Schedule Active - Secured with Genuine Authenticity KeyTag-->\r\n";
			echo "\r\n<!-- This site is patched against a big problem not solved since WordPress 2.5 -->\r\n\r\n";
		}
	add_action( 'wp_head', 'wpms_shfl', 100 );
	add_action( 'wp_footer', 'wpms_shfl', 100 );

	function wpms_shfl_authag()
		{
			if ( ! is_admin() && ! current_user_can( 'administrator' ) )
				return;

			echo "\r\n<!--Secured AuthTag - ".sha1(sha1("eLCQM540z78BbFMtmFXj3lC62b79H8651411574J4YQCb3g46FsK338kT29FPANa8"."FBE04369B6316C2D32562B10398C60D7461AEC7B"))."-->\r\n";
			echo "\r\n<!--Verified KeyTag - 7f71ee70ea1ce6795c69c81df4ea13ac5cf230b4-->\r\n";

			if ( sha1(sha1("eLCQM540z78BbFMtmFXj3lC62b79H8651411574J4YQCb3g46FsK338kT29FPANa8"."FBE04369B6316C2D32562B10398C60D7461AEC7B")) == '7f71ee70ea1ce6795c69c81df4ea13ac5cf230b4' )
				{
					echo "\r\n<!-- Your copy of Plugin WP Missed Schedule (free) is Genuine -->\r\n\r\n";
				}
			else
				{
					echo "\r\n<!-- Your copy of Plugin WP Missed Schedule (free) NO Genuine -->\r\n\r\n";
				}
		}
	add_action( 'admin_head', 'wpms_shfl_authag', 100 );
	add_action( 'admin_footer', 'wpms_shfl_authag', 100 );

	function wpms_deactivation()
		{
			if ( ! current_user_can( 'activate_plugins' ) )
				return;

			delete_option( 'byrev_fixshedule_next_verify' );
			delete_option( 'missed_schedule' );
			delete_option( 'scheduled_post_guardian_next_run' );
			delete_option( 'simpul_missed_schedule' );
			delete_option( 'wpt_scheduled_check' );
			delete_option( 'wp_missed_schedule' );
			delete_option( 'wp_scheduled_missed' );

			global $wp_version;

			if ( $wp_version >= 2.8 )
				{
					delete_transient( 'wp_scheduled_missed' );
					delete_transient( 'timeout_wp_scheduled_missed' );
				}

			wp_clear_scheduled_hook( 'missed_schedule_cron' );
			wp_clear_scheduled_hook( 'wp_missed_schedule' );
			wp_clear_scheduled_hook( 'wp_scheduled_missed' );
		}
	register_deactivation_hook( __FILE__, 'wpms_deactivation', 0 );

	if ( $wp_version >= 2.7 )
		{
			function wpms_uninstall()
				{
					if ( ! current_user_can( 'activate_plugins' ) )
						return;

					global $wp_version;

					if ( $wp_version < 3.0 )
						{
							delete_option( 'byrev_fixshedule_next_verify' );
							delete_option( 'missed_schedule' );
							delete_option( 'scheduled_post_guardian_next_run' );
							delete_option( 'simpul_missed_schedule' );
							delete_option( 'wpt_scheduled_check' );
							delete_option( 'wp_missed_schedule' );
							delete_option( 'wp_scheduled_missed' );
						}

					if ( ( $wp_version >= 2.6 ) and ( $wp_version < 3.0 ) )
						{
							delete_option( 'wp_scheduled_missed_options' );
						}

					if ( $wp_version >= 3.0 )
						{
							if ( ! is_multisite() )
								{
									delete_option( 'byrev_fixshedule_next_verify' );
									delete_option( 'missed_schedule' );
									delete_option( 'scheduled_post_guardian_next_run' );
									delete_option( 'simpul_missed_schedule' );
									delete_option( 'wpt_scheduled_check' );
									delete_option( 'wp_missed_schedule' );
									delete_option( 'wp_scheduled_missed' );
									delete_option( 'wp_scheduled_missed_options' );
								}

							if ( is_multisite() )
								{
									delete_option( 'byrev_fixshedule_next_verify' );
									delete_option( 'missed_schedule' );
									delete_option( 'scheduled_post_guardian_next_run' );
									delete_option( 'simpul_missed_schedule' );
									delete_option( 'wpt_scheduled_check' );
									delete_option( 'wp_missed_schedule' );
									delete_option( 'wp_scheduled_missed' );
									delete_option( 'wp_scheduled_missed_options' );

									global $wpdb;

									$blog_ids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );
									$original_blog_id = get_current_blog_id();

									foreach ( $blog_ids as $blog_id )
										{
											switch_to_blog( $blog_id );

											delete_site_option( 'byrev_fixshedule_next_verify' );
											delete_site_option( 'missed_schedule' );
											delete_site_option( 'scheduled_post_guardian_next_run' );
											delete_site_option( 'simpul_missed_schedule' );
											delete_site_option( 'wpt_scheduled_check' );
											delete_site_option( 'wp_missed_schedule' );
											delete_site_option( 'wp_scheduled_missed' );
											delete_site_option( 'wp_scheduled_missed_options' );
										}
									switch_to_blog( $original_blog_id );
								}
						}

					if ( $wp_version >= 2.8 )
						{
							delete_transient( 'wp_scheduled_missed' );
							delete_transient( 'timeout_wp_scheduled_missed' );
						}

						wp_clear_scheduled_hook( 'missed_schedule_cron' );
						wp_clear_scheduled_hook( 'wp_missed_schedule' );
						wp_clear_scheduled_hook( 'wp_scheduled_missed' );
				}
			register_uninstall_hook( __FILE__, 'wpms_uninstall', 0 );
		}
	}
?>