<?php

require_once get_template_directory() . '/inc/custom_comment_walker.php';

function theme_support()
{
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'theme_support');

function menus()
{
    $locations = array(
        'primary' => "Desktop Primary Menu",
        'footer' => "Footer Menu Items"
    );

    register_nav_menus($locations);
}

add_action('init', 'menus');

function register_styles()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('portfolio-style', get_template_directory_uri() . "/style.css", array(), $version, 'all');
    wp_enqueue_style('portfolio-style-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css", array(), '4.7.0', 'all');
}

add_action('wp_enqueue_scripts', 'register_styles');

function register_scripts()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_script('dropdown-script', get_template_directory_uri() . "/assets/js/dropdown.js", array(), $version, 'all');
}

add_action('wp_enqueue_scripts', 'register_scripts');

function widget_areas()
{
    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => '',
            'name' => 'Footer Area',
            'id' => 'footer-1',
            'description' => 'Footer Widget Area'
        )
    );
}

add_action('widgets_init', 'widget_areas');

//Comment Field Order
add_filter('comment_form_fields', 'mo_comment_fields_custom_order');
function mo_comment_fields_custom_order($fields)
{
    $comment_field = $fields['comment'];
    $author_field = $fields['author'];
    $email_field = $fields['email'];
    $url_field = $fields['url'];
    $cookies_field = $fields['cookies'];
    unset($fields['comment']);
    unset($fields['author']);
    unset($fields['email']);
    unset($fields['url']);
    unset($fields['cookies']);
    // the order of fields is the order below, change it as needed:
    $fields['author'] = $author_field;
    $fields['email'] = $email_field;
    $fields['url'] = $url_field;
    $fields['comment'] = $comment_field;
    $fields['cookies'] = $cookies_field;
    // done ordering, now return the fields:
    return $fields;
}

function custom_comment_form_defaults($defaults)
{
    if (is_user_logged_in()) {
        $user = wp_get_current_user();
        $defaults['logged_in_as'] = '<p class="logged-in-as">' .
            sprintf(
                __('Olet kirjautunut sisään käyttäjänä %1$s. <a href="%2$s">Muokkaa profiilia</a>. <a href="%3$s" title="Kirjaudu ulos">Kirjaudu ulos?</a><br>Pakolliset kentät on merkitty *-merkillä.'),
                $user->display_name,
                admin_url('profile.php'),
                wp_logout_url(apply_filters('the_permalink', get_permalink()))
            ) . '</p>';
    }
    return $defaults;
}
add_filter('comment_form_defaults', 'custom_comment_form_defaults');
