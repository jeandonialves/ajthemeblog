<?php

// CARREGANDO SCRIPTS E FOLHAS DE ESTILO
function load_scripts()
{
    wp_enqueue_script(
        'bootstrap-js',
        'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js',
        array('jquery'),
        '4.5.0',
        true // true para carregar o script no body TRUE PARA 
    );
    wp_enqueue_script(
        'slick',
        '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',
        array('jquery'),
        '1.8.1',
        false
    );

    wp_enqueue_style('font-roboto-condesed', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:700', array(), '1.0', 'all');
    wp_enqueue_style('slick-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1', 'all');
    wp_enqueue_style('slick-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css', array(), '1.8.1', 'all');
    wp_enqueue_script('ajthemeblog-global', get_theme_file_uri('/js/global.js'), array('jquery'), '09082020', true);
    wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css', array(), '4.5.0', 'all');
    wp_enqueue_style('fontawesome-css', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0', 'all');

    wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css', array(), '1.0', 'all');
}

add_action('wp_enqueue_scripts', 'load_scripts');

// Função de configuração de tema
function wpajthemeblog_config()
{
    // Habilitando suporte à tradução
    $textdomain = 'ajthemeblog';
    load_theme_textdomain($textdomain, get_stylesheet_directory() . '/languages/');
    load_theme_textdomain($textdomain, get_template_directory() . '/languages/');

    add_theme_support('post-thumbnails');
    add_theme_support('post-formats', array('video'));
}

add_action('after_setup_theme', 'wpajthemeblog_config', 0);

// function misha_my_load_more_scripts()
// {

//     global $wpquery_home;

//     // register our main script but do not enqueue it yet
//     wp_register_script('my_loadmore', get_stylesheet_directory_uri() . '/js/myloadmore.js', array('jquery'));

//     // now the most interesting part
//     // we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
//     // you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
//     wp_localize_script('my_loadmore', 'misha_loadmore_params', array(
//         'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
//         'posts' => json_encode($wpquery_home->query_vars), // everything about your loop is here
//         'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
//         'max_page' => $wpquery_home->max_num_pages
//     ));

//     wp_enqueue_script('my_loadmore');
// }

// add_action('wp_enqueue_scripts', 'misha_my_load_more_scripts');

function filter_category_home_function()
{
    $args = array(
        'orderby' => 'date',
        'order' => $_POST['date'],
        'post_type' => 'post',
        'post__not_in' => get_option('sticky_posts'),
        'posts_per_page' => 6
    );

    if (!empty($_POST['categoryfilter']))
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'category',
                'field' => 'id',
                'terms' => $_POST['categoryfilter']
            )
        );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
        echo get_template_part('template-parts/card/card', get_post_format());
        endwhile;
        wp_reset_postdata();
    else :
        echo 'No posts found';
    endif;

    die();
}




add_action('wp_ajax_myfilter', 'filter_category_home_function');
add_action('wp_ajax_nopriv_myfilter', 'filter_category_home_function');
