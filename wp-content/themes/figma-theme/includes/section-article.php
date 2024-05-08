<?php
// Verificăm dacă există un articol curent înainte de a încerca să afișăm conținutul
if (have_posts()):
    while (have_posts()):
        the_post(); ?>
        <div class="row justify-content-center" id="section2">
            <div class="col-lg-9 col-md-9 col-sm-12 position-relative">
                <div class="content-article">
                    <div class="title">
                        <h1>
                            <span><?php the_title(); ?></span>
                        </h1>
                    </div>
                    <?php if (has_post_thumbnail()): ?>
                        <div class="thumbnail">
                            <?php
                            // Obținem imaginea thumbnail cu dimensiunea specificată
                            the_post_thumbnail('large', array('class' => 'img-fluid')); 
                            ?>
                        </div>
                    <?php endif; ?>
                    <p><?php the_content(); ?></p>
                    <div class="tags"><?php the_tags('Tags: ', ', ', '<br />'); ?></div>
                </div>
            </div>
        </div>
    <?php endwhile;
endif;
?>
