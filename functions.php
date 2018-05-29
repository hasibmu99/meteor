<?php
if(! function_exists('meteor_scripts')){
    add_action('wp_enqueue_scripts', 'meteor_scripts');
    function meteor_scripts(){
        wp_enqueue_style('meteor_bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', array(), null, 'all');
        wp_enqueue_style('meteor_bootstrap_theme', get_template_directory_uri().'/css/bootstrap-theme.min.css', array(), null, 'all');
        wp_enqueue_style('meteor_fontawesome', get_template_directory_uri().'/css/fontAwesome.css', array(), null, 'all');
        wp_enqueue_style('meteor_hero_slider', get_template_directory_uri().'/css/hero-slider.css', array(), null, 'all');
        wp_enqueue_style('meteor_toolplate', get_template_directory_uri().'/css/tooplate-style.css', array(), null, 'all');
        wp_enqueue_style('meteor_toolplate', '//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800', array(), null, 'all') ;
        
        

        wp_enqueue_script('jquery');
        wp_enqueue_script('meteor_modernizr', get_template_directory_uri().'/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js', array('jquery'), null, true);
        wp_enqueue_script('meteor_bootstrap_js', get_template_directory_uri().'/js/vendor/bootstrap.min.js', array('jquery'), null, true);
        wp_enqueue_script('meteor_plugin', get_template_directory_uri().'/js/plugins.js', array('jquery'), null, true);
        wp_enqueue_script('meteor_main', get_template_directory_uri().'/js/main.js', array('jquery'), null, true);
        wp_enqueue_script('meteor_Vendor', get_template_directory_uri().'/js/vendor/jquery-1.11.2.min.js', array('jquery'), null, true);
        wp_enqueue_script('meteor_extra', get_template_directory_uri().'/js/extra.js', array('jquery'), null, true);

    }
    add_action('after_setup_theme', 'meteor_menus');
    add_theme_support('post-thumbnails');
    function meteor_menus(){
        register_nav_menus(array(
            'Primary' => 'Header-Menu'
        ));
    }

    function meteor_fallback(){
        echo '<ul class ="nav navbar-nav">';
        if('page' != get_option('show_on_front')){
            echo '<li><a href = "'.site_url().'">Home</a></li>';
        }
        wp_list_pages('title_li');
        echo '</ul>';
    }
    add_action('init', 'meteor_custom_slider');
    function meteor_custom_slider(){
        $args = array(
            'post_type' => 'meteor_slider',
            'label'     => 'Slider',
            'labels'        => array(
                'add_new_item'  => 'Add New Slider',
            ),
            'public'    => true,
            'supports'      => array(
                'title',
                'editor',
                'thumbnail',
                'custom-fields',

            ),
        );
        register_post_type('meteor_slider', $args);
    }

    // add_shortcode('greetings','meteor_shortcode');
    // function meteor_shortcode($atts){
    //     $message = ((empty($atts))? 'Morning' : $atts['message']);
    //     return '<h1>Good '.$message.'</h1>';
    // }
    function meteor_service($atts){

        extract(shortcode_atts(array(
            'title' => '',
            'icon'  => '',
            'description' => '',
        ), $atts));

    //    $markup = '
       
       
    //    <div class="col-md-3 col-sm-6 col-xs-12">
    //         <div class="service-item first-service">
    //             <div class="icon"></div>
    //             <h4>'.$data["title"].'</h4>
    //             <p>Meteor is free HTML website template by Tooplate. Feel free to use this layout for your project.</p>
    //         </div>
    //     </div>
       
    //    ';
    //    return $markup;
    ?>
    <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="service-item first-service">
                <i class="fa fa-<?=$icon;?>"></i>
                <h4><?= $title?></h4>
                <p><?= $description ;?></p>
            </div>
    </div>

    <?php }
    add_shortcode('service', 'meteor_service');



    function meteor_story($atts){
        
        extract(shortcode_atts(array(
            'button_text' => '',
            'button_link'   => '',
            
        ), $atts))?>
    
                <div class="white-button">
                    <a href="<?=$button_link ;?>" class="scroll-link" data-id="portfolio"><?=$button_text?></a>
                </div>

                <div class="primary-button">
                    <a href="<?=$button_link; ?>"><?= $button_text;?></a>
                </div>
        


    <?php } 
    add_shortcode('buttons', 'meteor_story');

}

function meteor_blog($atts){
    $data = shortcode_atts(array(
        'src' => '',
        'title' => '',
        'blinfo'  => ''
    ), $atts);
    var_dump($data);
    ?>

    <div class="col-md-6">
        <div class="blog-item b1">
            <div class="thumb">
                <img src="<?php echo $data['src']; ?>" alt="">
                <div class="text-content">
                    <h4><?php echo $data['title']; ?></h4>
                    <span><?php echo $data['blinfo'];?></span>
                </div>
            </div>
        </div>
    </div>

<?php }
add_shortcode('blog', 'meteor_blog');



require_once(get_template_directory().'/libs/cs-framework/cs-framework.php');
require_once(get_template_directory().'/inc/meteor_theme_option.php');
require_once(get_template_directory().'/inc/meteor_framework_shortcode.php');

