<?php
// Paramètres du logo par défaut
$header_args = array(
    'width' => 206,
    'height' => 150,
    'flex-width' => true,
    'flex-height' => true,
    'default-image' => get_template_directory_uri() . '/images/logo-Tournesol.png'
);
add_theme_support('custom-header', $header_args);
add_theme_support('title-tag');

// Mise en file d'attente des différents scripts et link du header
function florilege_scripts()
{
    // Feuille de style
    wp_enqueue_style('florilege-style', get_stylesheet_uri());

    // FontAwesome
    wp_register_script('font-awesome', "https://kit.fontawesome.com/b2ad56b449.js");
    wp_enqueue_script('font-awesome');

    // BXSlider
    if (is_front_page() || is_home()) {
        wp_enqueue_script('BXslider', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js', array('jquery'));
        wp_enqueue_style('BXstyle', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css');
        wp_enqueue_script('BXscript', get_theme_file_uri('js/bxSlider.js'), array('jquery'));
    }

    
    //NAV-MENU
    wp_enqueue_script('menu', get_theme_file_uri('js/menu.js'), array('jquery'));

    //Slider Accueil
    wp_enqueue_script('sliderAccueil', get_theme_file_uri('js/sliderAccueil.js'), array('jquery'));

    //MAP
    $api = get_theme_mod('gmapApi', '');
    if (!empty($api) && is_page_template('page-contact.php')) {
        wp_enqueue_script('googlemaps', 'https://maps.googleapis.com/maps/api/js?&key=' . $api . '&callback=gmap', array(), '', true);
    }
}
add_action('wp_enqueue_scripts', 'florilege_scripts');

// CUSTOMIZE
require_once 'inc/customize.php';
add_action('customize_register', 'florilege_customize_register');

/* Function.php */ 
add_action('wp_ajax_nopriv_submit_contact_form', 'submit_contact_form'); 
// Send information from the contact form
function submit_contact_form(){

    // If there is a $_POST['email']...
    if( isset($_POST['email']) && ($_POST['validation'] == true ) ) {
        $email    = $_POST['email'];       
        $fullname = $_POST['fullname'];
		$headers  = 'From: '. $fullname .' <'. $email .'>' . "\r\n";
		$attachement  = array();
        $emailR = get_theme_mod("email"); 
        
        $email_subject = "example intro: $email";
        $message  = (isset($_POST['name'])) 		? $_POST['name'] . "\r\n" 			: ''; 
        $message .= (isset($_POST['surname'])) 	? $_POST['surname'] . "\r\n" 		: ''; 
        $message .= (isset($_POST['phone']))	? $_POST['phone'] . "\r\n" 			: ''; 
        $message .= (isset($_POST['text']))		? nl2br($_POST['text']) . "\r\n" 	: ''; 
        
		wp_mail($emailR, $email_subject, nl2br($message), $headers, $attachement);
		
    }
}


add_theme_support('post-thumbnails');


function florilege_sidebars_registration()
{

    // Slider accueil
    register_sidebar(
        array(
            'name'          => __('Slider Accueil', 'Florilège'),
            'id'            => 'sidebar1',
            'description'   => __('Création d\'un slider avec les derniers articles', 'Florilège')
        )
    );
}
add_action('widget_init', 'florilege_sidebars_registration');

if (function_exists('register_nav_menus')) {
    register_nav_menus(array(
        'principal' => 'Menu principal',
        'footer' => 'Menu footer'
    ));
}


/* *************************SANITIZE*************************** */
function themeslug_sanitize_url($url)
{
    return esc_url_raw($url);
}
function validateUrl($validity, $value)
{
    if (!wp_http_validate_url($value)) {
        $validity->add('not_url', 'Adresse non valide');
    }
    return $validity;
}
function themeslug_sanitize_checkbox($checked)
{
    // Boolean check.
    return ((isset($checked) && true == $checked) ? true : false);
}
/* **************************************************** */