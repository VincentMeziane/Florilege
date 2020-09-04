<?php
function florilege_customize_register($wp_customize){
/***************************************** *************************VINCENT*************************** */
/* *************************SECTIONS*************************** */
$wp_customize->add_section('slideshow', array(
	'title' => 'Slideshow Page d\'accueil',
	'priority' => '35'
));
/* *************************SETTINGS*************************** */
for ($i=1; $i < 8; $i++) { 
	$wp_customize->add_setting('slideshow'.$i, array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'transport' => 'refresh'
	));
}
$wp_customize->add_setting('displaySlideshow', array(
	'default' => 'true',
	'capability' => 'edit_theme_options',
	'transport' => 'refresh'
));

/* *************************CONTROLS*************************** */
$wp_customize->add_control('displaySlideshow', array(
		'label' => 'Afficher le slideshow',
		'section' => 'slideshow',
		'settings' => 'displaySlideshow',
		'type' => 'checkbox'
));


/* *************************EDIT PENS*************************** */










/* ********************************************************************ALEX*************************************************** */

if( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'blogname', array('selector' => 'header h1')
	);
	$wp_customize->selective_refresh->add_partial(
		'blogdescription', array('selector' => 'header h2')
	);
	$wp_customize->selective_refresh->add_partial(
		'header_image', array('selector' => '#logo')
	);
	$wp_customize->selective_refresh->add_partial(
		'copyright', array('selector' => '#copyright')
	);
	$wp_customize->selective_refresh->add_partial(
		'facebook', array('selector' => '#lien')
	);
	$wp_customize->selective_refresh->add_partial(
		'Sise', array('selector' => '#colonneDroite')
	);
	$wp_customize->selective_refresh->add_partial(
		'carousel', array('selector' => '.bxslider')
	);
}

/*-----------------SECTION ------------------------*/
$wp_customize-> add_section('my_footer', array(
	'title' => 'Footer',
	'priority' => 120
));

$wp_customize-> add_section('carousel', array(
	'title' => 'Carousel page d\'accueil',
	'priority' => 80
));
$wp_customize-> add_section('contact', array(
	'title' => 'Page Contact',
	'priority' => 100
));



//Gestion des titres
 $wp_customize->add_section('styles',array(
	'title'=>'Styles titre',
	'priority'=>130
));
$wp_customize->add_setting('decoTitle', array(
	'default'        => 'oui',
	'capability'     => 'edit_theme_options'
));
$wp_customize -> add_control('decoTitle',array(
	'settings'=>'decoTitle',
	'label'=>'Décoration des titres',
	'section'=>'styles',
	'type'=>'radio',
	'choices'=>array(
		'oui'=>'Oui',
		'non'=>'Non'
	)
 ));
 $wp_customize->add_setting('decoTitleFond', array(
	'default'        => get_template_directory_uri( ).'/sources/feuilles.png',
	'capability'     => 'edit_theme_options'
));
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'decoTitleFond',array(
	'label'=>'Ajouter une image de fond',
	'settings'=>'decoTitleFond',
	'section'=>'styles',
	'flex_width' => false,
	'flex_height' => false,
	'width'=>150,
	'height'=>120
)));
$wp_customize->add_setting('decoTitleFront', array(
	'default'        => get_template_directory_uri( ).'/sources/fleur.png',
	'capability'     => 'edit_theme_options'
));
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'decoTitleFront',array(
	'label'=>'Ajouter une image de au premier plan',
	'settings'=>'decoTitleFront',
	'section'=>'styles',
	'flex_width' => false,
	'flex_height' => false,
	'width'=>150,
	'height'=>120
)));
/*::::::::::::::page accueil:::::::::::::::*/
/*--------------------carousel-------------*/
$wp_customize-> add_section('carousel', array(
	'title' => 'Carousel page d\'accueil',
	'priority' => 80
));

for ($i=1; $i <= 8; $i++) { 
	$wp_customize -> add_setting('carousel-image-'.$i.'', array(
	'transport' => 'refresh'   
));
$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'carousel-image-'.$i.'', array(
	'section' => 'carousel',
	'label' => __( 'Image '.$i, 'text-domain' ),
	'settings' => 'carousel-image-'.$i,
	'flex_width' => false,
	'flex_height' => false,
	'width' => 1280,
	'height' => 400,
)));
}

/*::::::::::::::footer:::::::::::::::*/
$wp_customize -> add_setting('nom', array( 
	'default' => '',   
));
$wp_customize->add_control('nom', array(
	'label' => __('Votre Nom Prénom :'),
	'section' => 'my_footer',
	'type' => 'text',
));

$wp_customize -> add_setting('soustitre', array( 
	'default' => '',   
));
$wp_customize->add_control('soustitre', array(
	'label' => __('Sous-titre:'),
	'section' => 'my_footer',
	'type' => 'text',
));

$wp_customize -> add_setting('phone', array( 
	'default' => '',   
));
$wp_customize->add_control('phone', array(
	'label' => __('Votre numéro :'),
	'section' => 'my_footer',
	'type' => 'text',
));

$wp_customize -> add_setting('email', array( 
	'default' => '',   
));
$wp_customize->add_control('email', array(
	'label' => __('Votre email:'),
	'section' => 'my_footer',
	'type' => 'text',
));

$wp_customize -> add_setting('post', array( 
	'default' => '',   
));
$wp_customize->add_control('post', array(
	'label' => __('Votre adresse postal :'),
	'section' => 'my_footer',
	'type' => 'text',
));
/*::::::::::::::::réseau:::::::::::::::::::::::::::*/
$wp_customize -> add_setting('twitter', array( 
	'default' => '',   
));
$wp_customize->add_control('twitter', array(
	'label' => __('Twitter :'),
	'section' => 'my_footer',
	'type' => 'url',
	'input_attrs' => array(
		'placeholder' => 'https://',
	)
));
$wp_customize -> add_setting('facebook', array( 
	'default' => '',
));
$wp_customize->add_control('facebook', array(
	'label' => __('Facebook :'),
	'section' => 'my_footer',
	'type' => 'url',
	'input_attrs' => array(
		'placeholder' => 'https://',
	)
));
/*:::::::::::::::page contact::::::::::::::::*/
$wp_customize -> add_setting('titretop', array( 
'default' => '',

));
$wp_customize->add_control('titretop', array(
	'label' => __('Titre partie contact :'),
	'section' => 'contact',
	'type' => 'text',
));


/*------------Email de réception-----------------*/
$wp_customize -> add_setting('email', array( 
	'default' => '',
));
$wp_customize->add_control('email', array(
	'label' => __('Email de réception du formulaire :'),
	'section' => 'contact',
	'type' => 'email',
));
/*:::::::::::::horaires d'ouverture:::::::::::::::*/
$wp_customize -> add_setting('jour', array( 
	'default' => '',
	
));
$wp_customize->add_control('jour', array(
	'label' => __('Du :'),
	'section' => 'contact',
	'type' => 'text',
));
$wp_customize -> add_setting('heur', array( 
	'default' => '',
));
$wp_customize->add_control('heur', array(
	'label' => __('De :'),
	'section' => 'contact',
	'type' => 'text',
));
$wp_customize -> add_setting('dimanche', array( 
	'default' => '',
));
$wp_customize->add_control('dimanche', array(
	'label' => __('Et :'),
	'section' => 'contact',
	'type' => 'text',
));

$wp_customize->add_setting('display_horaire', array(
	'default' => '1',
	'sanitize_callback' => 'esc_attr'
));
$wp_customize->add_control('display_horaire', array(
	'settings' => 'display_horaire',
	'label' => "Afficher les horaire",
	'description' => '(Les horaires du magasin)',
	'section' => 'contact',
	'type' => 'checkbox'
));


/* *************************GABRIEL*************************** */
$wp_customize->add_setting('gmapshow', array(
	'capability'=>'edit_theme_options',
	'sanitize_callback' => 'themeslug_sanitize_checkbox',
	'transport'=>'refresh'
));
$wp_customize -> add_control('gmapshow',array(
	'settings'=>'gmapshow',
	'label'=>'Souhaitez-vous afficher la google map ?',
	'section'=>'contact',
	'type'=>'checkbox'
 ));
 $wp_customize->add_setting('gmapApi', array(
	'capability'=>'edit_theme_options',
	'sanitize_callback' => 'esc_attr',
	'transport'=>'refresh'
));
$wp_customize -> add_control('gmapApi',array(
	'settings'=>'gmapApi',
	'label'=>'Clef API',
	'section'=>'contact',
	'input_attrs' => array('placeholder'=>'Clef API Google map')
 ));
 $wp_customize->add_setting('gmapLat', array(
	'capability'=>'edit_theme_options',
	'sanitize_callback' => 'esc_attr',
	'transport'=>'refresh'
));
$wp_customize -> add_control('gmapLat',array(
	'settings'=>'gmapLat',
	'label'=>'Latitude',
	'section'=>'contact',
	'input_attrs' => array('placeholder'=>'Latitude de la position')
 ));
 $wp_customize->add_setting('gmapLong', array(
	'capability'=>'edit_theme_options',
	'sanitize_callback' => 'esc_attr',
	'transport'=>'refresh'
));
$wp_customize -> add_control('gmapLong',array(
	'settings'=>'gmapLong',
	'label'=>'Longitude',
	'section'=>'contact',
	'input_attrs' => array('placeholder'=>'Longitude de la position')
 ));
 $wp_customize->add_setting('zoom', array(
	'default'        => '15',
	'sanitize_callback' => 'esc_attr'
));
$wp_customize->add_control('zoom', array(
	'label'      => 'Zoom',
	'section'    => 'contact',
	'settings'   => 'zoom',
	'type' => 'range',
	'input_attrs' => array(
		'min'=>'1',
		'max'=>'30',
		'step'=>'1')
));

















}