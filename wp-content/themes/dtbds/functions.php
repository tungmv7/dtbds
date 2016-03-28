<?php

require_once('wp_bootstrap_navwalker.php');

function dtbds_setup() {
//    /*
//     * Make theme available for translation.
//     * Translations can be filed in the /languages/ directory.
//     * If you're building a theme based on Twenty Sixteen, use a find and replace
//     * to change 'twentysixteen' to the name of your theme in all the template files
//     */
//    load_theme_textdomain( 'dtbds', get_template_directory() . '/languages' );
//
//    // Add default posts and comments RSS feed links to head.
//    add_theme_support( 'automatic-feed-links' );
//
//    /*
//     * Let WordPress manage the document title.
//     * By adding theme support, we declare that this theme does not use a
//     * hard-coded <title> tag in the document head, and expect WordPress to
//     * provide it for us.
//     */
//    add_theme_support( 'title-tag' );
//
//    /*
//     * Enable support for Post Thumbnails on posts and pages.
//     *
//     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
//     */
//    add_theme_support( 'post-thumbnails' );
//    set_post_thumbnail_size( 1200, 9999 );

    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus( array(
        'top_menu' => __( 'Primary Menu', 'dtbds' ),
    ) );

//    /*
//     * Switch default core markup for search form, comment form, and comments
//     * to output valid HTML5.
//     */
//    add_theme_support( 'html5', array(
//        'search-form',
//        'comment-form',
//        'comment-list',
//        'gallery',
//        'caption',
//    ) );

}
add_action( 'after_setup_theme', 'dtbds_setup' );

function getAgencies($postPerPage = 9, $currentPage = 1, $args = [], $type = 'agency') {
    $defaults = [
        'post_type' => $type,
        'post_status' => 'publish',
        'posts_per_page' => $postPerPage,
        'paged' => $currentPage,
        'tax_query' => []
    ];
    $args = wp_parse_args($args, $defaults);

    $my_query = new WP_Query($args);
    if ($my_query->have_posts()) {
        return $my_query;
    } else {
        return [];
    }
}

function getNews($postPerPage = 9, $currentPage = 1, $args = [], $type = 'post') {
    $defaults = [
        'post_type' => $type,
        'post_status' => 'publish',
        'posts_per_page' => $postPerPage,
        'paged' => $currentPage,
        'tax_query' => []
    ];
    $args = wp_parse_args($args, $defaults);

    $my_query = new WP_Query($args);
    if ($my_query->have_posts()) {
        return $my_query;
    } else {
        return [];
    }
}

function getCurrentProjectType() {
    $args = [];
    $baseTerms = ['mua-ban', 'cho-thue', 'for-sale', 'for-rent'];
    $baseUri = basename(get_page_link());
    foreach ($baseTerms as $base) {
        if (strpos($baseUri, $base) === 0) {

            $args['tax_query'][] = [
                'taxonomy' => 'project-status',
                'field' => 'slug',
                'terms' => $base
            ];

            if (strlen($base) !== strlen($baseUri)) {
                $projectType = str_replace($base . "-", "", $baseUri);
                $args['tax_query'][] = [
                    'taxonomy' => 'project-type',
                    'field' => 'slug',
                    'terms' => $projectType
                ];
            }

            break;
        }
    }
    return $args;
}

function getCurrentProjectLocation() {
    $args = [];
    $baseTerms = ['dau-tu', 'investment'];
    $baseUri = basename(get_page_link());
    foreach ($baseTerms as $base) {
        if (strpos($baseUri, $base) === 0) {

            if (strlen($base) !== strlen($baseUri)) {
                $projectType = str_replace($base . "-", "", $baseUri);
                $args['tax_query'][] = [
                    'taxonomy' => 'project-area',
                    'field' => 'slug',
                    'terms' => $projectType
                ];
            }

            break;
        }
    }
    return $args;
}

function getProjects($postPerPage = 9, $currentPage = 1, $args = [], $type = 'du-an') {
    $defaults = [
        'post_type' => $type,
        'post_status' => 'publish',
        'posts_per_page' => $postPerPage,
        'paged' => $currentPage,
        'tax_query' => []
    ];
    $args = wp_parse_args($args, $defaults);

    $my_query = new WP_Query($args);
    if ($my_query->have_posts()) {
        return $my_query;
    } else {
        return [];
    }
}

function getProjectData($post) {
    $thumbnail = isset(get_field("project_gallery", $post->ID)[0]['sizes']['thumbnail']) ?
        get_field("project_gallery", $post->ID)[0]['sizes']['thumbnail'] : false;
    $image = isset(get_field("project_gallery", $post->ID)[0]['sizes']['large']) ?
        get_field("project_gallery", $post->ID)[0]['sizes']['large'] : false;
    $price = get_field("project_price_information", $post->ID);
    $price = is_numeric($price) ? number_format($price, 0, ",", ".") . " đ" : $price;
    $type = isset(wp_get_object_terms($post->ID, 'project-type', ['fields' => 'names'])[0]) ?
        wp_get_object_terms($post->ID, 'project-type', ['fields' => 'names'])[0] : '';
    $status = isset(wp_get_object_terms($post->ID, 'project-status', ['fields' => 'names'])[0]) ?
        wp_get_post_terms($post->ID, 'project-status', ['fields' => 'names'])[0] : '';
    return [
        'thumbnail' => $thumbnail,
        'type' => $type,
        'image' => $image,
        'status' => $status,
        'price' => $price
    ];
}

function get_template_part_with_vars( $slug, $name = null, $vars=null ) {
    /**
     * Fires before the specified template part file is loaded.
     *
     * The dynamic portion of the hook name, `$slug`, refers to the slug name
     * for the generic template part.
     *
     * @since 3.0.0
     *
     * @param string $slug The slug name for the generic template.
     * @param string $name The name of the specialized template.
     * @param array $vars The list of variables to carry over to the template
     */
    do_action( "get_template_part_{$slug}", $slug, $name );

    $templates = array();
    $name = (string) $name;
    if ( '' !== $name )
        $templates[] = "{$slug}-{$name}.php";

    $templates[] = "{$slug}.php";

    extract($vars);
    foreach ($templates as $template){
        include(locate_template($template));
    }
}

function getBreadcrumbItems($type = false, $args=[]) {
    if ($type == 'news-detail') {
        return [
            ['link' => false, 'title' => get_the_title()]
        ];
    } else if ($type == 'news-page') {
        $baseUri = basename(get_page_link());
        $page = get_page_by_path($baseUri);
        return [
            ['link' => false, 'title' => $page->post_title]
        ];
    } else if ($type == 'project-page') {
        $baseUri = basename(get_page_link());
        $baseTerms = ['mua-ban', 'cho-thue', 'for-sale', 'for-rent'];
        $items = [];
        foreach($baseTerms as $base) {
            if (strpos($baseUri, $base) === 0) {
                $term = get_term_by('slug', $base, 'project-status');
                $items[] = ['link' => true, 'url' => pll_home_url().$term->slug, 'title' => $term->name];
                if (strlen($base) !== strlen($baseUri)) {
                    $projectType = str_replace($base . "-", "", $baseUri);
                    $term = get_term_by('slug', $projectType, 'project-type');
                    if ($term) {
                        $items[] = ['link' => false, 'title' => $term->name];
                    }
                }
                break;
            }
        }
        return $items;
    } else if ($type == 'project-location') {
        $baseUri = basename(get_page_link());
        $baseTerms = ['dau-tu', 'investment'];
        $baseTermLabels = ['Đầu tư', 'Investment'];
        $items = [];
        foreach($baseTerms as $k => $base) {
            if (strpos($baseUri, $base) === 0) {
                $items[] = ['link' => true, 'url' => pll_home_url().$base, 'title' => $baseTermLabels[$k]];
                if (strlen($base) !== strlen($baseUri)) {
                    $projectType = str_replace($base . "-", "", $baseUri);
                    $term = get_term_by('slug', $projectType, 'project-area');
                    if ($term) {
                        $items[] = ['link' => false, 'title' => $term->name];
                    }
                }
                break;
            }
        }
        return $items;
    }  else if ($type == 'project-detail') {
        $items = [];
        if (isset(wp_get_post_terms(get_the_ID(), 'project-status')[0])) {
            $term = wp_get_post_terms(get_the_ID(), 'project-status')[0];
            $items[] = ['link' => true, 'url' => pll_home_url().$term->slug, 'title' => $term->name];
        }
        if (isset(wp_get_post_terms(get_the_ID(), 'project-type')[0])) {
            $temp = wp_get_post_terms(get_the_ID(), 'project-type')[0];
            $temp->slug = isset($term) ? $term->slug . "-" . $temp->slug : $temp->slug;
            $items[] = ['link' => true, 'url' => pll_home_url().$temp->slug, 'title' => $temp->name];
        }
        $items[] = ['link' => false, 'title' => get_the_title()];
        return $items;
    } else {
        $baseUri = basename(get_page_link());
        $page = get_page_by_path($baseUri);
        return [
            ['link' => false, 'title' => $page->post_title]
        ];
    }
}