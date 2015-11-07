<?php

birch_ns( 'birchpress.view', function( $ns ) {

		$ns->init = function() use ( $ns ) {
			add_action( 'init', array( $ns, 'wp_init' ) );
			add_action( 'admin_init', array( $ns, 'wp_admin_init' ) );
		};

		$ns->wp_init = function() use ( $ns ) {
		};

		$ns->wp_admin_init = function() use ( $ns ) {
		};

		$ns->register_3rd_scripts = function() use ( $ns ) {
			global $birchpress;

			wp_register_script( 'underscore.string',
				$birchpress->get_framework_url() . '/lib/assets/js/underscore.string/underscore.string.js',
				array( 'underscore' ), '2.3.0' );
			wp_register_script( 'react-with-addons',
				$birchpress->get_framework_url() . '/lib/assets/js/react/react-with-addons.js',
				array(), '0.13.3' );
			wp_register_script( 'react',
				$birchpress->get_framework_url() . '/lib/assets/js/react/react.js',
				array(), '0.13.3' );
			wp_register_script( 'immutable',
				$birchpress->get_framework_url() . '/lib/assets/js/immutable/immutable.js',
				array(), '3.7.4' );
			wp_register_script( 'jquery.datatables',
				$birchpress->get_framework_url() . '/lib/assets/js/datatables/media/js/jquery.dataTables.js',
				array( 'jquery' ), '1.10.8' );
		};

		$ns->register_3rd_styles = function() use ( $ns ) {
			global $birchpress;
			
			wp_register_style( 'jquery.datatables',
				$birchpress->get_framework_url() . '/lib/assets/js/datatables/media/css/jquery.dataTables.css',
				array(), '1.10.8' );
		};

		$ns->register_core_scripts = function() use ( $ns ) {
			global $birchpress;

			$version = $birchpress->get_version();
			wp_register_script( 'birchpress',
				$birchpress->get_framework_url() . '/assets/js/birchpress/index.bundle.js',
				array( 'underscore', 'underscore.string', 'jquery', 'react-with-addons', 'immutable' ), "$version" );
		};

	} );
