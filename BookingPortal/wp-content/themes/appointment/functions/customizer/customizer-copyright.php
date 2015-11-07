<?php
// Footer copyright section 
	function appointment_copyright_customizer( $wp_customize ) {
	$wp_customize->add_panel( 'appointment_copyright_setting', array(
		'priority'       => 700,
		'capability'     => 'edit_theme_options',
		'title'      => __('Footer Copyright Settings', 'appointment'),
	) );
	
	$wp_customize->add_section(
        'copyright_section_one',
        array(
            'title' => __('Footer Copyright Settings','appointment'),
            'description' => __('This is a Footer section.','appointment'),
            'priority' => 35,
			'panel' => 'appointment_copyright_setting',
        )
    );
	
	
	$wp_customize->add_setting(
    'appointment_options[footer_copyright_text]',
    array(
        'default' => __('No copyright information has been saved yet.','appointment'),
		'sanitize_callback' => 'sanitize_text_field',
		'type' =>'option'
    )
	
);
$wp_customize->add_control(
    'appointment_options[footer_copyright_text]',
    array(
        'label' => __('Copyright text','appointment'),
        'section' => 'copyright_section_one',
        'type' => 'text',
    )
);
$wp_customize->add_setting(
    'appointment_options[footer_menu_bar_enabled]',array(
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option'
));

$wp_customize->add_control(
    'appointment_options[footer_menu_bar_enabled]',
    array(
        'type' => 'checkbox',
        'label' => __('Hide copyright text','appointment'),
        'section' => 'copyright_section_one',
    )
);

	//Footer social link 
	$wp_customize->add_section(
        'copyright_social_icon',
        array(
            'title' => __('Social Link ','appointment'),
           'priority' => 45,
			'panel' => 'appointment_copyright_setting',
        )
    );
	
	
	//Hide Index Service Section
	
	$wp_customize->add_setting(
    'appointment_options[footer_social_media_enabled]',
    array(
        'default' => 0,
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'appointment_options[footer_social_media_enabled]',
    array(
        'label' => __('Hide Footer Social Icons','appointment'),
        'section' => 'copyright_social_icon',
        'type' => 'checkbox',
    )
	);

	// Facebook link
	$wp_customize->add_setting(
    'appointment_options[footer_social_media_facebook_link]',
    array(
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'appointment_options[footer_social_media_facebook_link]',
    array(
        'label' => __('Facebook URL','appointment'),
        'section' => 'copyright_social_icon',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
    'appointment_options[footer_facebook_media_enabled]',array(
	'default' => 1,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option'
	));

	$wp_customize->add_control(
    'appointment_options[footer_facebook_media_enabled]',
    array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','appointment'),
        'section' => 'copyright_social_icon',
    )
);

	//twitter link
	
	$wp_customize->add_setting(
    'appointment_options[footer_social_media_twitter_link]',
    array(
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )
	
	);
	$wp_customize->add_control(
    'appointment_options[footer_social_media_twitter_link]',
    array(
        'label' => __('Twitter URL','appointment'),
        'section' => 'copyright_social_icon',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
    'appointment_options[footer_twitter_media_enabled]',array(
	'sanitize_callback' => 'sanitize_text_field',
	'default' => 1,
	'type'=> 'option'
	));

	$wp_customize->add_control(
    'appointment_options[footer_twitter_media_enabled]',
    array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','appointment'),
        'section' => 'copyright_social_icon',
    )
);
	//Linkdin link
	
	$wp_customize->add_setting(
    'appointment_options[footer_social_media_linkedin_link]',
    array(
		'type' => 'option',
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
    )
	
	);
	$wp_customize->add_control(
    'appointment_options[footer_social_media_linkedin_link]',
    array(
        'label' => __('Linkdin URL','appointment'),
        'section' => 'copyright_social_icon',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
    'appointment_options[footer_linkedin_media_enabled]',array(
	'default' => 1,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    'appointment_options[footer_linkedin_media_enabled]',
    array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','appointment'),
        'section' => 'copyright_social_icon',
    )
);

	//Google-plus link
	
	$wp_customize->add_setting(
    'appointment_options[footer_social_media_googleplus_link]',
    array(
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'appointment_options[footer_social_media_googleplus_link]',
    array(
        'label' => __('Google-plus URL','appointment'),
        'section' => 'copyright_social_icon',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
    'appointment_options[footer_googleplus_media_enabled]',array(
	'default' => 1,
	'sanitize_callback' => 'sanitize_text_field',
	'type'=> 'option',
	));

	$wp_customize->add_control(
    'appointment_options[footer_googleplus_media_enabled]',
    array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','appointment'),
        'section' => 'copyright_social_icon',
    )
);

	//Skype link
	
	$wp_customize->add_setting(
    'appointment_options[footer_social_media_skype_link]',
    array(
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option',
    )
	
	);
	$wp_customize->add_control(
   'appointment_options[footer_social_media_skype_link]',
    array(
        'label' => __('Skype URL','appointment'),
        'section' => 'copyright_social_icon',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
    'appointment_options[footer_skype_media_enabled]',array(
	'default' => 1,
	'sanitize_callback' => 'sanitize_text_field',
	'type'=>'option',
	));

	$wp_customize->add_control(
    'appointment_options[footer_skype_media_enabled]',
    array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','appointment'),
        'section' => 'copyright_social_icon',
    )
);
}
add_action( 'customize_register', 'appointment_copyright_customizer' );
?>