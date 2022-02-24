<?php

add_action('after_setup_theme', 'wpheticSetupTheme');
function wpheticSetupTheme()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'Le menu du header mec');
}


add_action('wp_enqueue_scripts', 'wpheticBootstrap');
function wpheticBootstrap()
{
    wp_enqueue_style('bootstrap_css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');
    wp_enqueue_script("bootstrap_js", "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js", [], false, true);
}

add_filter('nav_menu_css_class', function ($classes) {
    $classes[] = "nav-item";
    return $classes;
});

add_filter('nav_menu_link_attributes', function ($attr) {
    $attr['class'] = 'nav-link';
    return $attr;
});


function wpheticPaginate()
{
    $pages = paginate_links(['type' => 'array']);
    if (!$pages) {
        return null;
    }

    ob_start();
    echo '<nav aria-label="Page navigation example">';
    echo '<ul class="pagination">';

    foreach ($pages as $page) {
        $active = strpos($page, 'current');
        $liClass = $active ? 'page-item active' : 'page-item';
        $page = str_replace('page-numbers', 'page-link', $page);

        echo sprintf('<li class="%s">%s</li>', $liClass, $page);
    }
    echo '</ul></nav>';

    return ob_get_clean();
}

require 'Classes/SponsoCheckbox.php';
$checkbox = new SponsoCheckbox('wpheticSponso');


//function cptui_register_my_cpts_event()
//{
//    $labels = [
//        "name" => __("Events", "custom-post-type-ui"),
//        "singular_name" => __("Event", "custom-post-type-ui"),
//    ];
//
//    $args = [
//        "label" => __("Events", "custom-post-type-ui"),
//        "labels" => $labels,
//        "description" => "",
//        "public" => true,
//        "show_in_rest" => true,
//        "has_archive" => true,
//        "delete_with_user" => false,
////        "capability_type" => "post",
//        "capabilities" => [
//            'read_post' => 'manage_events',
//            'delete_post' => 'manage_events',
//            'edit_post' => 'manage_events'
//        ],
////        "map_meta_cap" => true,
//        "hierarchical" => false,
//        "rewrite" => ["slug" => "event", "with_front" => true],
//        "query_var" => true,
//        "supports" => ["title", "thumbnail", "custom-fields"],
//        "show_in_graphql" => false,
//    ];
//
//    register_post_type("event", $args);
//
//    $labelsTaxo = [
//        'name' => 'Styles',
//        'singular_name' => 'Style'
//    ];
//
//    $argsTaxo = [
//        'labels' => $labelsTaxo,
//        'public' => true,
//        'hierarchical' => true,
//        'show_in_rest' => true,
//        'show_admin_column' => true
//    ];
//
//    register_taxonomy('style', ['post'], $argsTaxo);
//}
//
//add_action('init', 'cptui_register_my_cpts_event');
//
//
//add_action('after_switch_theme', function () {
//    $admin = get_role('administrator');
//    $admin->add_cap('manage_events');
//
//    add_role('event_manager', 'Event Manager', [
//        'read' => true,
//        'manage_events' => true
//    ]);
//
//});
//
//add_action('switch_theme', function () {
//    $admin = get_role('administrator');
//    $admin->remove_cap('manage_events');
//
//    remove_role('event_manager');
//});
