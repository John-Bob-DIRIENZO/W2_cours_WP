<?php
/**
 * Plugin Name: Mon super plugin de merde
 * Description: Coucou les enfants
 * Version: 1.0.0
 * Plugin URI: https://www.google.fr
 * Author: John Bob
 * Author URI: https://www.google.fr
 */

if (!defined('ABSPATH')) {
    die('vous n\'avez rien à faire ici');
}


function cptui_register_my_cpts_event()
{
    $labels = [
        "name" => __("Events", "custom-post-type-ui"),
        "singular_name" => __("Event", "custom-post-type-ui"),
    ];

    $args = [
        "label" => __("Events", "custom-post-type-ui"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "show_in_rest" => true,
        "has_archive" => true,
        "delete_with_user" => false,
//        "capability_type" => "post",
        "capabilities" => [
            'read_post' => 'manage_events',
            'delete_post' => 'manage_events',
            'edit_post' => 'manage_events'
        ],
//        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => ["slug" => "event", "with_front" => true],
        "query_var" => true,
        "supports" => ["title", "thumbnail", "custom-fields"],
        "show_in_graphql" => false,
    ];

    register_post_type("event", $args);

    $labelsTaxo = [
        'name' => 'Styles',
        'singular_name' => 'Style'
    ];

    $argsTaxo = [
        'labels' => $labelsTaxo,
        'public' => true,
        'hierarchical' => true,
        'show_in_rest' => true,
        'show_admin_column' => true
    ];

    register_taxonomy('style', ['post'], $argsTaxo);
}

add_action('init', 'cptui_register_my_cpts_event');


register_activation_hook(__FILE__, function () {
    $admin = get_role('administrator');
    $admin->add_cap('manage_events');

    add_role('event_manager', 'Event Manager', [
        'read' => true,
        'manage_events' => true
    ]);
});

register_deactivation_hook(__FILE__, function () {
    $admin = get_role('administrator');
    $admin->remove_cap('manage_events');

    remove_role('event_manager');
});


add_shortcode('query-custom', 'trucAShortCode');
function trucAShortCode()
{
    $query = new WP_Query([
        'post_type' => 'event',
        'posts_per_page' => $_GET['nb'] ?? -1,
        'meta_key' => 'prix',
        'meta_type' => 'NUMERIC',
        'orderby' => ['meta_value' => 'ASC'],
        'meta_query' => [
            [
                'key' => 'prix',
                'value' => 20,
                'compare' => '<'

            ]
        ]
    ]);

    ob_start();

    if ($query->have_posts()) {
        ?>
        <div class="card-group"> <?php
            while ($query->have_posts()) {
                $query->the_post(); ?>

                <div class="card">
                    <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="...">
                    <div class="card-body">

                        <?php if (get_post_meta(get_the_ID(), 'wpheticSponso', true)) : ?>
                            <div class="alert alert-primary" role="alert">
                                Contenu Soponso
                            </div>
                        <?php endif; ?>

                        <h5 class="card-title"><?php the_title(); ?></h5>

                        <p><small> Prix: <?= get_post_meta(get_the_ID(), 'prix', true); ?></small></p>

                        <p class="card-text"><?php the_content(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Lire plus</a>
                    </div>
                </div>


                <?php
            }
            ?> </div> <?php
    }

    wp_reset_postdata();

    return ob_get_clean();

}

