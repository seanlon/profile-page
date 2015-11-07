<?php
function appointment_callout_customizer( $wp_customize ) {

	//Home call out

	$wp_customize->add_panel( 'appointment_homecallout_setting', array(
		'priority'       => 600,
		'capability'     => 'edit_theme_options',
		'title'      => __('Contact callout Settings', 'appointment'),
	) );
	
	$wp_customize->add_section(
        'callout_section_settings',
        array(
            'title' => __('Contact call-out Settings','appointment'),
			'panel'  => 'appointment_homecallout_setting',)
    );
	
	
	//Hide Home callout Section
	
	$wp_customize->add_setting(
    'appointment_options[home_call_out_area_enabled]',
    array(
        'default' => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[home_call_out_area_enabled]',
    array(
        'label' => __('Hide Home Call-out Section','appointment'),
        'section' => 'callout_section_settings',
        'type' => 'checkbox',
    )
	);
	
	// add section to manage callout
	$wp_customize->add_setting(
    'appointment_options[home_call_out_title]',
    array(
        'default' => __('Want to say Hey or find out more?','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'appointment_options[home_call_out_title]',array(
    'label'   => __('Callout title','appointment'),
    'section' => 'callout_section_settings',
	 'type' => 'text',)  );	
	 
	 
	 $wp_customize->add_setting(
    'appointment_options[home_call_out_description]',
    array(
        'default' => __('Reprehen derit in voluptate velit cillum dolore eu fugiat nulla pariaturs sint occaecat proidentse.','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control('appointment_options[home_call_out_description]',array(
    'label'   => __('Callout Description','appointment'),
    'section' => 'callout_section_settings',
	 'type' => 'text',)  );	
	 
	 
	//Callout Background image
	/* logo option */
    $wp_customize->add_setting( 'appointment_options[callout_background]', array(
      'sanitize_callback' => 'esc_url_raw',
	  'type' => 'option',
	  
    ) );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'appointment_options[callout_background]', array(
      'label'    => __( 'Choose Background Image', 'appointment' ),
      'section'  => 'callout_section_settings',
      'settings' => 'appointment_options[callout_background]',
    ) ) );
	 
	 
	 
	 //Purchase Now button
	 $wp_customize->add_section(
        'callout_purchase_now_settings',
        array(
            'title' => __('Button one','appointment'),
			'panel'  => 'appointment_homecallout_setting',)
    );
	 
	 $wp_customize ->add_setting (
	'appointment_options[home_call_out_btn1_text]',
	array( 
	'default' => __('Purshase Now!','appointment'),
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	) 
	);

	$wp_customize->add_control (
	'appointment_options[home_call_out_btn1_text]',
	array (  
	'label' => __('Purchase Now callout Button text','appointment'),
	'section' => 'callout_purchase_now_settings',
	'type' => 'text',
	) );
	
	$wp_customize->add_section(
        'callout_get_in_touch_settings',
        array(
            'title' => __('Button two','appointment'),
            'description' => '',
			'panel'  => 'appointment_homecallout_setting',)
    );
	$wp_customize ->add_setting (
	'appointment_options[home_call_out_btn1_link]',
	array( 
	'default' => __('#','appointment'),
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	) );

	$wp_customize->add_control (
	'appointment_options[home_call_out_btn1_link]',
	array (  
	'label' => __('purchase callout Button Link','appointment'),
	'section' => 'callout_purchase_now_settings',
	'type' => 'text',
	) );

	$wp_customize->add_setting(
		'appointment_options[home_call_out_btn1_link_target]',
		array('capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		));

	$wp_customize->add_control(
		'appointment_options[home_call_out_btn1_link_target]',
		array(
			'type' => 'checkbox',
			'label' => __('Open link new tab/window','appointment'),
			'section' => 'callout_purchase_now_settings',
		)
	);
	 
	// documentation area
	$wp_customize ->add_setting (
	'appointment_options[home_call_out_btn2_text]',
	array( 
	'default' => __('Get in Touch!','appointment'),
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	) 
	);

	$wp_customize->add_control (
	'appointment_options[home_call_out_btn2_text]',
	array (  
	'label' => __('Get in Touch Button text','appointment'),
	'section' => 'callout_get_in_touch_settings',
	'type' => 'text',
	) );

	$wp_customize ->add_setting (
	'appointment_options[home_call_out_btn2_link]',
	array( 
	'default' => __('#','appointment'),
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'type'=> 'option',
	) );

	$wp_customize->add_control (
	'appointment_options[home_call_out_btn2_link]',
	array (  
	'label' => __('Get in Touch Button Link','appointment'),
	'section' => 'callout_get_in_touch_settings',
	'type' => 'text',
	) );

	$wp_customize->add_setting(
		'appointment_options[home_call_out_btn2_link_target]',
		array('capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		));

	$wp_customize->add_control(
		'appointment_options[home_call_out_btn2_link_target]',
		array(
			'type' => 'checkbox',
			'label' => __('Open link new tab/window','appointment'),
			'section' => 'callout_get_in_touch_settings',
		)
	);
	}
	add_action( 'customize_register', 'appointment_callout_customizer' );
	?>