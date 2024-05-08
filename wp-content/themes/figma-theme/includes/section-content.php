<div class="row justify-content-center" id="section2">
    <div class="col-lg-12 col-md-12 col-sm-12 position-relative">
        <div class="bg-section"></div>
        <div class="vector"></div>
        <div class="shadow"></div>

        <div class="content-section">
            <div class="content-top">
                <div class="filter-text">Filtering Section</div>
                <div class="title">
                    <h1>
                        <span>SECTION 2</span>
                    </h1>
                </div>
                <div class="description"><b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting
                    industry.
                </div>
                <div class="dropdown">
                    <select id="select">
                        <option value="" disabled selected hidden>Select a category</option>
                        <option value="<?php echo esc_url(home_url('/')); ?>">All Categories</option>
                        <?php
                        $categories = get_categories();

                        foreach ($categories as $category) {
                            ?>
                            <option value="<?php echo esc_attr(get_category_link($category->term_id)); ?>">
                                <?php echo esc_html($category->name); ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                    <div class="checkbox-list"></div>
                </div>

                <div class="carousel">
                    <div class="items">
                        <?php
                        $category_id = null;
                        if (isset($_GET['category']) && $_GET['category'] !== '') {
                            $category_id = $_GET['category'];
                        }

                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => -1,
                            'order' => 'ASC',
                            'cat' => $category_id,
                        );
                        $query = new WP_Query($args);

                        if ($query->have_posts()):
                            $index = 0;
                            while ($query->have_posts()):
                                $query->the_post();
                                $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
                                $class = '';
                                if ($index == 0) {
                                    $class = 'active';
                                } elseif ($index == 1) {
                                    $class = 'next';
                                } elseif ($index == count($query->posts) - 1) {
                                    $class = 'prev';
                                }
                                ?>
                                <div class="item <?php echo $class; ?>">
                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo $image[0]; ?>"
                                            alt="<?php the_title(); ?>"></a>
                                </div>
                                <?php
                                $index++;
                            endwhile;
                            wp_reset_postdata();
                        else:
                            echo '<p>No posts found in this category.</p>';
                        endif;
                        ?>
                        <div class="button-container">
                            <div class="button"><i class="fas fa-angle-left"></i></div>
                            <div class="button"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>