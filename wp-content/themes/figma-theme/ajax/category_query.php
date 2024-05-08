<?php

// Load WordPress
$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
require_once ($parse_uri[0] . 'wp-load.php');

// Get the category slug from the URL parameter
$category_slug = isset($_GET['category']) ? $_GET['category'] : null;

// Query arguments
$args = array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'order' => 'ASC',
);

// If a category is specified, add it to the query arguments
if ($category_slug && $category_slug !== esc_url(home_url('/'))) {
    $args['category_name'] = $category_slug;
}

// Perform the query
$query = new WP_Query($args);

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
<div class="article-title-container"><h2 class="article-title"></h2></div>
