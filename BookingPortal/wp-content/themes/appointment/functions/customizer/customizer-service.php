<?php
function appointment_service_customizer( $wp_customize ) {
 
//Service section panel
$wp_customize->add_panel( 'appointment_service_options', array(
		'priority'       => 500,
		'capability'     => 'edit_theme_options',
		'title'      => __('Service Settings', 'appointment'),
	) );

	
	$wp_customize->add_section( 'service_section_head' , array(
		'title'      => __('Service Heading ', 'appointment'),
		'panel'  => 'appointment_service_options',
		'priority'   => 50,
   	) );
	
	
	//Hide Index Service Section
	
	$wp_customize->add_setting(
    'appointment_options[service_section_enabled]',
    array(
        'default' => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'appointment_options[service_section_enabled]',
    array(
        'label' => __('Hide Home Service Section','appointment'),
        'section' => 'service_section_head',
        'type' => 'checkbox',
    )
	);
	
	$wp_customize->add_setting(
    'appointment_options[service_title]',
    array(
        'default' => __('Our Services','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'appointment_options[service_title]',
    array(
        'label' => __('Service Title','appointment'),
        'section' => 'service_section_head',
        'type' => 'text',
    )
	);
	
	$wp_customize->add_setting(
    'appointment_options[service_description]',
    array(
        'default' => __('Duis aute irure dolor in reprehenderit in voluptate velit cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupid non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','appointment'),
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'appointment_options[service_description]',
    array(
        'label' => __('Service Description','appointment'),
        'section' => 'service_section_head',
        'type' => 'text',
		'sanitize_callback' => 'sanitize_text_field',
    )
	);	
	
//service section one
	$wp_customize->add_section( 'service_section_one' , array(
		'title'      => __('Service Section one', 'appointment'),
		'panel'  => 'appointment_service_options',
		'priority'   => 100,
		'sanitize_callback' => 'sanitize_text_field',
   	) );
	$wp_customize->add_setting(
		'appointment_options[service_one_icon]', array(
		 'sanitize_callback' => 'sanitize_text_field',
        'default'        => 'fa-mobile',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	
	$wp_customize->add_control( 'appointment_options[service_one_icon]', array(
        'label'   => __('Service icon', 'appointment'),
		'style' => 'background-color: red',
        'section' => 'service_section_one',
        'type'    => 'text',
    ));		
		
	$wp_customize->add_setting(
    'appointment_options[service_one_title]',
    array(
        'default' => __('Easy to Use','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'appointment_options[service_one_title]',
    array(
        'label' => __('Title one','appointment'),
        'section' => 'service_section_one',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
    'appointment_options[service_one_description]',
    array(
        'default' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.','appointment'),
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'sanitize_text_field',
		 'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'appointment_options[service_one_description]',
    array(
        'label' => __('Description One','appointment'),
        'section' => 'service_section_one',
        'type' => 'text',	
    )
);
//Second service

$wp_customize->add_section( 'service_section_two' , array(
		'title'      => __('Service Section Two', 'appointment'),
		'panel'  => 'appointment_service_options',
		'priority'   => 200,
   	) );


$wp_customize->add_setting(
    'appointment_options[service_two_icon]',
    array(
        'type' =>'option',
		'default' => 'fa-bell',
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'sanitize_text_field',
		 
    )	
);
$wp_customize->add_control(
    'appointment_options[service_two_icon]',
    array(
        'label' => __('Icon Two Like: fa-group','appointment'),
        'section' => 'service_section_two',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'appointment_options[service_two_title]',
    array(
        'default' => __('Easy to Use','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
);
$wp_customize->add_control(
    'appointment_options[service_two_title]',
    array(
        'label' => __('Title two' ,'appointment'),
        'section' => 'service_section_two',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'appointment_options[service_two_description]',
    array(
        'default' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.','appointment'),
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'sanitize_text_field',
		 'type' => 'option',
    )	
);
$wp_customize->add_control(
		'appointment_options[service_two_description]',
		array(
        'label' => __('Description two','appointment'),
        'section' => 'service_section_two',
        'type' => 'text',
    )
);
//Third Service section
$wp_customize->add_section( 'service_section_three' , array(
		'title'      => __('Service Section Three', 'appointment'),
		'panel'  => 'appointment_service_options',
		'priority'   => 300,
   	) );


$wp_customize->add_setting(
    'appointment_options[service_three_icon]',
    array(
        'default' => 'fa-laptop',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		
    )	
);
$wp_customize->add_control(
'appointment_options[service_three_icon]',
    array(
        'label' => __('Icon three  Like: fa-group','appointment'),
        'section' => 'service_section_three',
        'type' => 'text',
		
    )
);

$wp_customize->add_setting(
    'appointment_options[service_three_title]',
    array(
        'default' => __('Easy to Use','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' =>'option',
    )	
);
$wp_customize->add_control(
    'appointment_options[service_three_title]',
    array(
        'label' => __('Title three','appointment'),
        'section' => 'service_section_three',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'appointment_options[service_three_description]',
    array(
        'default' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' =>'option',
    )	
);
$wp_customize->add_control(
    'appointment_options[service_three_description]',
    array(
        'label' => __('Description three','appointment'),
        'section' => 'service_section_three',
        'type' => 'text',
    )
);
//Four Service section

$wp_customize->add_section( 'service_section_four' , array(
		'title'      => __('Service Section Four', 'appointment'),
		'panel'  => 'appointment_service_options',
		'priority'   => 400,
   	) );

$wp_customize->add_setting(
    'appointment_options[service_four_icon]',
    array(
        'default' => 'fa-support',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' =>'option',
    )	
);
$wp_customize->add_control(
    'appointment_options[service_four_icon]',
    array(
        'label' => __('Icon Four  Like: fa-group','appointment'),
        'section' => 'service_section_four',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'appointment_options[service_four_title]',
    array(
        'default' => __('Easy to Use','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
);
$wp_customize->add_control(
    'appointment_options[service_four_title]',
    array(
        'label' => __('Title four','appointment'),
        'section' => 'service_section_four',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
   'appointment_options[service_four_description]',
    array(
        'default' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
);
$wp_customize->add_control(
    'appointment_options[service_four_description]',
    array(
        'label' => __('Description four','appointment'),
        'section' => 'service_section_four',
        'type' => 'text',
		'sanitize_callback' => 'sanitize_text_field',
    )
);
//Five service section
$wp_customize->add_section( 'service_section_five' , array(
		'title'      => __('Service Section Five', 'appointment'),
		'panel'  => 'appointment_service_options',
		'priority'   => 500,
   	) );


$wp_customize->add_setting(
    'appointment_options[service_five_icon]',
    array(
        'default' => 'fa-code',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
);
$wp_customize->add_control(
    'appointment_options[service_five_icon]',
    array(
        'label' => __('Icon five Like: fa-group','appointment'),
        'section' => 'service_section_five',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'appointment_options[service_five_title]',
    array(
        'default' => __('Easy to Use','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
);
$wp_customize->add_control(
    'appointment_options[service_five_title]',
    array(
        'label' => __('Title five','appointment'),
        'section' => 'service_section_five',
        'type' => 'text',
		
    )
);

$wp_customize->add_setting(
    'appointment_options[service_five_description]',
    array(
        'default' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
);
$wp_customize->add_control(
    'appointment_options[service_five_description]',
    array(
        'label' => __('Description five','appointment'),
        'section' => 'service_section_five',
        'type' => 'text',
    )
);
//Six service section
$wp_customize->add_section( 'service_section_six' , array(
		'title'      => __('Service Section Six', 'appointment'),
		'panel'  => 'appointment_service_options',
		'priority'   => 600,
		
   	) );

	
$wp_customize->add_setting(
    'appointment_options[service_six_icon]',
    array(
        'default' => 'fa-cog',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
);
$wp_customize->add_control(
    'appointment_options[service_six_icon]',
    array(
        'label' => __('Icon six Like: fa-group','appointment'),
        'section' => 'service_section_six',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'appointment_options[service_six_title]',
    array(
        'default' => __('Easy to Use','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
);
$wp_customize->add_control(
    'appointment_options[service_six_title]',
    array(
        'label' => __('Title six','appointment'),
        'section' => 'service_section_six',
        'type' => 'text',
		
    )
);

$wp_customize->add_setting(
    'appointment_options[service_six_description]',
    array(
        'default' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
);
$wp_customize->add_control(
    'appointment_options[service_six_description]',
    array(
        'label' => __('Description six','appointment'),
        'section' => 'service_section_six',
        'type' => 'text',
    )
);
class WP_service_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
      <div class="pro-box">
		<a href="<?php echo esc_url( __('http://webriti.com/appointment/', 'appointment'));?>" target="_blank" class="button button-primary" id="review_pro"><?php _e( 'Add more service get the Pro','appointment' ); ?></a>
	 
	<div>
    <?php
    }
}
//Pro service section
$wp_customize->add_section( 'service_section_pro' , array(
		'title'      => __('Add More service', 'appointment'),
		'panel'  => 'appointment_service_options',
		'priority'   => 700,
   	) );


$wp_customize->add_setting(
     'appointment_options[service_pro]',
    array(
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
);
$wp_customize->add_control( new WP_service_Customize_Control( $wp_customize, 'appointment_options[service_pro]', array(	
		'label' => __('Discover Appointment Pro','appointment'),
        'section' => 'service_section_pro',
		'setting' => 'appointment_options[service_pro]',
    ))
);

}
add_action( 'customize_register', 'appointment_service_customizer' );
?>