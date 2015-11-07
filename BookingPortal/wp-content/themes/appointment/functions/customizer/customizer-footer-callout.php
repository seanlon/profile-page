<?php
function appointment_footer_callout_customizer( $wp_customize ) {
class appointment_Customize_callout_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
        <h3><?php _e('Want to add Footer Callout Content than','appointment'); ?><a href="<?php echo esc_url( 'http://www.webriti.com/appointment' ); ?>" target="_blank"><?php _e(' Upgrade To Pro','appointment'); ?> </a>  
		<?php
		}
	}

	//Home call out

	$wp_customize->add_panel( 'appointment_footer_callout_setting', array(
		'priority'       => 820,
		'capability'     => 'edit_theme_options',
		'title'      => __('Footer CallOut Settings', 'appointment'),
	) );
	
	//Contact Information Setting
	$wp_customize->add_section(
        'footer_callout_settings',
        array(
            'title' => __('Footer Callout Settings','appointment'),
			'panel'  => 'appointment_footer_callout_setting',)
    );
	
	$wp_customize->add_setting( 'appointment_options[callout_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new appointment_Customize_callout_upgrade(
		$wp_customize,
		'appointment_options[callout_upgrade]',
			array(
				'label'					=> __('Appointment Upgrade','appointment'),
				'section'				=> 'footer_callout_settings',
				'settings'				=> 'appointment_options[callout_upgrade]',
			)
		)
	);
	
	
	//Form title
	$wp_customize->add_setting(
    'appointment_options[front_contact_title]',
    array(
        'default' => __('Footer callout Info','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'appointment_options[front_contact_title]',array(
    'label'   => __('Footer Callout Title','appointment'),
    'section' => 'footer_callout_settings',
	 'type' => 'text',
	  'input_attrs' => array('disabled' => 'disabled')
	 )  );
	 
	 //Footer callout Call-us
	 $wp_customize->add_setting(
		'appointment_options[contact_one_icon]', array(
        'default'        => 'fa-phone',
        'capability'     => 'edit_theme_options',
		'type' =>'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	
	$wp_customize->add_control('appointment_options[contact_one_icon]', array(
        'label'   => __('Footer Callout Call Icon', 'appointment'),
        'section' => 'footer_callout_settings',
        'type'    => 'text',
		 'input_attrs' => array('disabled' => 'disabled')
    ));		
		
	$wp_customize->add_setting(
    'appointment_options[front_contact1_title]',
    array(
        'default' => __('Have a question? Call us now','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[front_contact1_title]',
    array(
        'label' => __('Footer Callout call Title','appointment'),
        'section' => 'footer_callout_settings',
        'type' => 'text',
		 'input_attrs' => array('disabled' => 'disabled')
    )
	);

	$wp_customize->add_setting(
    'appointment_options[front_contact1_val]',
    array(
        'default' => __('+82 334 843 52','appointment'),
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'sanitize_text_field',
		 'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[front_contact1_val]',
    array(
        'label' => __('Footer Callout Description','appointment'),
        'section' => 'footer_callout_settings',
        'type' => 'text',
		'input_attrs' => array('disabled' => 'disabled')		
    )
);


//callout Time
	 $wp_customize->add_setting(
		'appointment_options[contact_two_icon]', array(
        'default'        => 'fa-clock-o',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	
	$wp_customize->add_control( 'appointment_options[contact_two_icon]', array(
        'label'   => __('Footer Callout Time icon', 'appointment'),
        'section' => 'footer_callout_settings',
        'type'    => 'text',
		 'input_attrs' => array('disabled' => 'disabled')
    ));		
		
	$wp_customize->add_setting(
    'appointment_options[front_contact2_title]',
    array(
        'default' => __('We are open Mon-Fri','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		 'input_attrs' => array('disabled' => 'disabled')
    )	
	);
	$wp_customize->add_control(
    'appointment_options[front_contact2_title]',
    array(
        'label' => __('Footer Callout Time Title','appointment'),
        'section' => 'footer_callout_settings',
        'type' => 'text',
		 'input_attrs' => array('disabled' => 'disabled')
    )
	);

	$wp_customize->add_setting(
    'appointment_options[front_contact2_val]',
    array(
        'default' => __('Mon - Fri 08.00 - 18.00','appointment'),
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'sanitize_text_field',
		 'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[front_contact2_val]',
    array(
        'label' => __('Footer Callout Time Description','appointment'),
        'section' => 'footer_callout_settings',
        'type' => 'text',	
		 'input_attrs' => array('disabled' => 'disabled')
    )
);

	//Contact Email Setting 
	
	$wp_customize->add_setting(
		'appointment_options[contact_three_icon]', array(
        'default'        => 'fa-envelope',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	
	$wp_customize->add_control( 'appointment_options[contact_three_icon]', array(
        'label'   => __('Footer Callout E-Mail icon', 'appointment'),
        'section' => 'footer_callout_settings',
        'type'    => 'text',
		 'input_attrs' => array('disabled' => 'disabled')
    ));		
		
	$wp_customize->add_setting(
    'appointment_options[front_contact3_title]',
    array(
        'default' => __('Drop us an mail','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[front_contact3_title]',
    array(
        'label' => __('Footer Callout E-Mail Title','appointment'),
        'section' => 'footer_callout_settings',
        'type' => 'text',
		 'input_attrs' => array('disabled' => 'disabled')
    )
	);

	$wp_customize->add_setting(
    'appointment_options[front_contact3_val]',
    array(
        'default' => __('info@yoursupport.com','appointment'),
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'sanitize_text_field',
		 'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[front_contact3_val]',
    array(
        'label' => __('Footer Callout E-Mail Description','appointment'),
        'section' => 'footer_callout_settings',
        'type' => 'text',	
		 'input_attrs' => array('disabled' => 'disabled')
    )
);
	
	}
	add_action( 'customize_register', 'appointment_footer_callout_customizer' );
	?>