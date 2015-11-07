<?php
function appointment_slider_customizer( $wp_customize ) {
class appointment_Customize_slider_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
        <h3><?php _e('Want different varition of slides just like our premium version than','appointment'); ?><a href="<?php echo esc_url( 'http://www.webriti.com/appointment' ); ?>" target="_blank"><?php _e(' Upgrade To Pro','appointment'); ?> </a>  
		<?php
		}
	}

	//slider Section 
	$wp_customize->add_panel( 'appointment_slider_setting', array(
		'priority'       => 500,
		'capability'     => 'edit_theme_options',
		'title'      => __('Slider  Settings', 'appointment'),
	) );
	
	$wp_customize->add_section(
        'slider_section_settings',
        array(
            'title' => __('Featured Slider Settings','appointment'),
            'description' => '',
			'panel'  => 'appointment_slider_setting',)
    );
	
	//Hide slider
	
	$wp_customize->add_setting(
    'appointment_options[home_banner_enabled]',
    array(
        'default' => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[home_banner_enabled]',
    array(
        'label' => __('Hide Home slider','appointment'),
        'section' => 'slider_section_settings',
        'type' => 'checkbox',
    )
	);
	 
	 
	//slider type
	$wp_customize->add_setting(
    'appointment_options[slider_radio]',
    array(
        'default' => 'demo',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    )
	);
 
$wp_customize->add_control(
    'appointment_options[slider_radio]',
    array(
        'type' => 'radio',
        'label' => __('Select Slider type','appointment'),
        'section' => 'slider_section_settings',
        'choices' => array(
            'demo' => __('Demo Slider','appointment'),
            'category' => __('Category Slider','appointment'),
        ),
    )
);	
	 
	 
	 
	// add section to manage featured slider on category basis	
	$wp_customize->add_setting(
    'appointment_options[slider_select_category]',
    array(
        'default' => __('Uncategorized','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_slider_sanitize_layout',
		'type'=>'option',
		)
	);	
	$wp_customize->add_control( new Category_Dropdown_Custom_Control( $wp_customize, 'appointment_options[slider_select_category]', array(
    'label'   => __('Select Category for Slider','appointment'),
    'section' => 'slider_section_settings',
    'settings'   =>  'appointment_options[slider_select_category]',
	) ) );	
	 
	 
	 //Slider animation
	
	$wp_customize->add_setting(
    'appointment_options[slider_options]',
    array(
        'default' => __('slide','appointment'),
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		
    )
	);

	$wp_customize->add_control(
    'appointment_options[slider_options]',
    array(
        'type' => 'select',
        'label' => __('Select slider Animation','appointment'),
        'section' => 'slider_section_settings',
		 'choices' => array('slide'=>__('slide', 'appointment'), 'carousel-fade'=>__('Fade', 'appointment')),
		));
		
	
	//Slider Animation duration

	$wp_customize->add_setting(
    'appointment_options[slider_transition_delay]',
    array(
        'default' => __('2000','appointment'),
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));

	$wp_customize->add_control(
    'appointment_options[slider_transition_delay]',
    array(
        'type' => 'text',
        'label' => __('Input slide Duration','appointment'),
        'section' => 'slider_section_settings',
		
		));
	
	 //Number of slides
	$wp_customize->add_setting(
    'appointment_options[featured_slider_post]',
    array(
        'default' => __('','appointment'),
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	);

	$wp_customize->add_control(
    'appointment_options[featured_slider_post]',
    array(
        'type' => 'text',
        'label' => __('Input Number of slides','appointment'),
        'section' => 'slider_section_settings',)
		);
	
	$wp_customize->add_setting( 'appointment_options[slider_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new appointment_Customize_slider_upgrade(
		$wp_customize,
		'appointment_options[slider_upgrade]',
			array(
				'label'					=> __('Appointment Upgrade','appointment'),
				'section'				=> 'slider_section_settings',
				'settings'				=> 'appointment_options[slider_upgrade]',
			)
		)
	);	
	
		}
	add_action( 'customize_register', 'appointment_slider_customizer' );
	
	function appointment_slider_sanitize_layout( $value ) {
    if ( ! in_array( $value, array( 'Uncategorized','category_slider' ) ) )    
    return $value;
	}
	?>