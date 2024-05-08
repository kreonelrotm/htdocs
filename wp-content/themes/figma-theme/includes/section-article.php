<?php
if (have_posts()):
    while (have_posts()):
        the_post(); ?>
        <div id="section2">
            <div class="content-article">
                <div class="title">
                    <h1>
                        <span><?php the_title(); ?></span>
                    </h1>
                </div>
                <?php if (has_post_thumbnail()): ?>
                    <div class="thumbnail">
                        <?php
                        the_post_thumbnail('large', array('class' => 'img-fluid'));
                        ?>
                    </div>
                <?php endif; ?>
                <p><?php the_content(); ?></p>
                <div class="tags"><?php the_tags('Tags: ', ', ', '<br />'); ?></div>
            </div>
        </div>
    <?php endwhile;
endif;
?>