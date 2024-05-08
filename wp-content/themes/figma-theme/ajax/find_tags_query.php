<?php
// Here you will extract the tags of articles from the specified category
// and return them as a JSON response

$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
require_once ($parse_uri[0] . 'wp-load.php');

// Extract tags of articles from the specified category
global $wpdb;

// The category URL we receive
$url = $_GET['category'];

// Extract the last part of the URL address (category name)
$url_parts = explode('/', rtrim($url, '/'));
$category_name = end($url_parts);

// Replace special characters with spaces
$category_name = str_replace('-', ' ', $category_name);

// Transform the category name into uppercase
$category_name = ucwords($category_name);

// Get the ID and category object based on the name
$category = get_category_by_slug($category_name);
if ($category) {
    $category_id = $category->term_id;

    // Arguments for query_posts()
    $args = array(
        'category_name' => $category_name,
    );

    // Execute the query
    query_posts($args);

    // Initialize an array to store tag names
    $all_tags_arr = array();

    while (have_posts()):
        the_post();
        $posttags = get_the_tags();
        if ($posttags) {
            foreach ($posttags as $tag) {
                $all_tags_arr[] = $tag->name; // Save tag names in an array
            }
        }
    endwhile;

    // Remove duplicates from the tag array
    $tags_arr = array_unique($all_tags_arr);

    // Initialize an array to store tags and their links
    $term_links = array();

    foreach ($tags_arr as $tag) {
        // Get the term (tag) object based on the name
        $el = get_term_by('name', $tag, 'post_tag');

        // Add the link and tag name to the term array
        if ($el) {
            $term_links[] = array(
                'url' => get_term_link($el),
                'name' => $el->name,
                'slug' => $el->slug
            );
        }
    }

    // Return the list of links as a JSON response, including the category ID
    header('Content-Type: application/json');
    echo json_encode(
        array(
            'category_id' => $category_id,
            'tags' => $term_links
        )
    );
} else {
    // If no category found with this name, return an error message
    echo json_encode(array('error' => 'Category not found'));
}
?>