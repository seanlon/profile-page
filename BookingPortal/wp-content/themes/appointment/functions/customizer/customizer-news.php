<?php
function appointment_news_customizer( $wp_customize ) {

//Index-news Section
	$wp_customize->add_panel( 'appointment_news_setting', array(
		'priority'       => 600,
		'capability'     => 'edit_theme_options',
		'title'      => __('Latest News Settings', 'appointment'),
	) );
	
	$wp_customize->add_section(
        'news_section_settings',
        array(
            'title' => __('Home Latest News Settings','appointment'),
            'description' => '',
			'panel'  => 'appointment_news_setting',)
    );
	
	
	//Hide Index Service Section
	
	$wp_customize->add_setting(
    'appointment_options[home_blog_enabled]',
    array(
        'default' => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'appointment_options[home_blog_enabled]',
    array(
        'label' => __('Hide Home Index News Section','appointment'),
        'section' => 'news_section_settings',
        'type' => 'checkbox',
    )
	);
	
	// hide meta content
	$wp_customize->add_setting(
    'appointment_options[home_meta_section_settings]',
    array(
        'default' => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[home_meta_section_settings]',
    array(
        'label' => __('Hide Blog Meta From News','appointment'),
        'section' => 'news_section_settings',
        'type' => 'checkbox',
    )
	);
	
	// add section to manage News
	$wp_customize->add_setting(
    'appointment_options[blog_heading]',
    array(
        'default' => __('Latest News','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'appointment_options[blog_heading]',array(
    'label'   => __('Latest News title','appointment'),
    'section' => 'news_section_settings',
	 'type' => 'text',)  );	
	 
	 
	 $wp_customize->add_setting(
    'appointment_options[blog_description]',
    array(
        'default' => __('Duis aute irure dolor in reprehenderit in voluptate velit cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupid non proident, sunt in culpa qui official deserunt mollit anim id est laborum.','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'appointment_options[blog_description]',array(
    'label'   => __('Latest News Description','appointment'),
    'section' => 'news_section_settings',
	 'type' => 'text',)  );	
	 
	 
	 // add section to manage featured Latest news on category basis	
	$wp_customize->add_setting(
    'appointment_options[blog_selected_category_id]',
    array(
		'capability' => 'edit_theme_options',
		'default' => 1,
		 'sanitize_callback' => 'appointment_prefix_sanitize_layout',
		 'type' => 'option',
		
		)
	);	
	$wp_customize->add_control( new Category_Dropdown_Custom_Control( $wp_customize, 'appointment_options[blog_selected_category_id]', array(
    'label'   => __('Select Category for Latest News','appointment'),
    'section' => 'news_section_settings',
    'settings'   => 'appointment_options[blog_selected_category_id]',
	) ) );
	
	//Select number of latest news on front page
	
	$wp_customize->add_setting(
    'appointment_options[post_display_count]',
    array(
		'type' => 'option',
        'default' => __('4','appointment'),
		'sanitize_callback' => 'sanitize_text_field',
    )
	);

	$wp_customize->add_control(
    'appointment_options[post_display_count]',
    array(
        'type' => 'select',
        'label' => __('Select Number of Post','appointment'),
        'section' => 'news_section_settings',
		 'choices' => array('2'=>__('2', 'appointment'), '4'=>__('4', 'appointment'), '6' => __('6','appointment'), '8' => __('8','appointment'),'10'=> __('10','appointment'), '12'=> __('12','appointment'),'14'=> __('14','appointment'), '16' =>__('16','appointment')),
		));
		}
	add_action( 'customize_register', 'appointment_news_customizer' );
	
	function appointment_prefix_sanitize_layout( $news ) {
    if ( ! in_array( $news, array( 1,'category_news' ) ) )    
    return $news;
}
	?>