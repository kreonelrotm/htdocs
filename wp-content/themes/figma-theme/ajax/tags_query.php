<?php

// Load WordPress
$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
require_once ($parse_uri[0] . 'wp-load.php');

// Get the category slug from the URL parameter
$category_slug = isset($_GET['category']) ? $_GET['category'] : null;
$tags = isset($_GET['tags']) ? $_GET['tags'] : null;

// Perform the query
$query_args = [
    'post_type' => 'post',
    'posts_per_page' => -1,
    'order' => 'ASC',
    'tax_query' => [
        'relation' => 'AND',
        [
            'taxonomy' => 'category',
            'field' => 'term_id',
            'terms' => $category_slug,
        ]
    ],
];

// If tags are available, add them to the query
if ($tags && is_array($tags)) {
    $tag_terms = []; // Array to store tag terms
    foreach ($tags as $tag) {
        $tag_terms[] = $tag; // Add each tag to the array
    }
    $query_args['tax_query'][] = [
        'taxonomy' => 'post_tag',
        'field' => 'slug',
        'terms' => $tag_terms, // Use the array of tag terms
    ];
}

$query = new WP_Query($query_args);


?>
<?php if ($query->have_posts()): ?>
    <?php
    // Loop through the posts
    $index = 0;
    while ($query->have_posts()):
        $query->the_post();
        // Get the post thumbnail image
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
        $class = '';
        // Set CSS class for the carousel item
        if ($index == 0) {
            $class = 'active';
        } elseif ($index == 1) {
            $class = 'next';
        } elseif ($index == count($query->posts) - 1) {
            $class = 'prev';
        }
        ?>
        <!-- Carousel item -->
        <div class="item <?php echo $class; ?>">
            <a href="<?php the_permalink(); ?>"><img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>"></a>
        </div>
        <?php
        $index++;
    endwhile;
    // Reset post data
    wp_reset_postdata();
?>
<?php else: ?>
    <!-- No posts found message -->
    <p>No posts found in this category.</p>
<?php endif; ?>
<!-- Carousel navigation buttons -->
<div class="button-container">
    <div class="button"><i class="fas fa-angle-left"></i></div>
    <div class="button"><i class="fas fa-angle-right"></i></div>
</div>