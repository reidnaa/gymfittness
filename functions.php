 <?php

 // create the menus

 function gymfitness_menu() {
     // wordperss function 
     register_nav_menus(
         array(
             'main-menu' => 'Main Menu'
         )
         );
 }

 add_action('init', 'gymfitness_menu');


// link to the queries file   
require get_template_directory( ) . '/inc/queries.php';


 // adds stylesheets and js files    

 function gymfitness_scripts() {

    // normailize css   
    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1');

   //google fonts   
    wp_enqueue_style('google-font', 'https://fonts.googleapis.com/css?family=Open+Sans|Raleway:400,700,900|Staatliches&display=swap', array(), '1.0.0');

    // main stylesheet    
    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize','google-font'), '1.0.0');

    /// sclicknav css   
    wp_enqueue_style('slicknavcss', get_template_directory_uri() . '/css/slicknav.min.css', array(), '1.0.10');
    
    // Lightbox css
    if (basename(get_page_template()) === 'gallery.php') {
        wp_enqueue_style('lightboxcss', get_template_directory_uri() . '/css/lightbox.min.css', array(), '2.1.11');
    }

    wp_enqueue_script('jquery');
    
    //lightbox js
    if (basename(get_page_template()) === 'gallery.php') {
        wp_enqueue_script('lightboxjs', get_template_directory_uri() . '/js/lightbox.min.js', array('jquery'), '1.0.10', true);
    }
    //slicknav js   
    wp_enqueue_script('slicknavjs', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery'), '1.0.10', true);

    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0' ,true);

    // BX slider    
    if (is_front_page()) :
        wp_enqueue_script('bxsliderjs', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js', array('jquery'), '4.2.12', true);
        wp_enqueue_style('bxslidercss', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css', array(), '4.2.12');

    endif;
 }

 add_action('wp_enqueue_scripts','gymfitness_scripts');

// enable feature image    

function gymfitness_setup(){

    //register new Image sizes   
    add_image_size('square', '350px', '350px', true);
    add_image_size('portrait', 350, 724, true);
    add_image_size('box', 400, 375, true);
    add_image_size('mediumSize', 700, 400, true);
    add_image_size('blog', 966, 644, true);

    // add featured Images   
    add_theme_support('post-thumbnails');

    //seo titles    

    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'gymfitness_setup');

// create a widget zonne      

function gymfitness_widgets(){
    register_sidebar(
        array(
            'name' => 'Sidebar',
            'id' => 'sidebar',
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="text-primary">',
            'after_title' => '</h3>'
        )
    );

}

add_action('widgets_init', 'gymfitness_widgets');


// displays hero image on background for hero on font-page    


function gymfitness_hero_image(){

    $front_page_id = get_option('page_on_front');
    $image_id = get_field('hero_image', $front_page_id);

    $image = $image_id['url'];

    // create a false stylesheet    
    wp_register_style('custom', false);

    wp_enqueue_style('custom');

    $featured_image_css = "
        body.home .site-header {
            background-image: linear-gradient(rgba(0,0,0,.75),rgba(0,0,0,.75)),url($image);
        }
    ";

    wp_add_inline_style('custom', $featured_image_css);
}

add_action('init', 'gymfitness_hero_image');