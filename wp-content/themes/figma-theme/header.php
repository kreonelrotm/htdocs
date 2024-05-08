<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIGMA - PROJECT</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <?php wp_head(); ?>
</head>

<body style="background: black;">
    <header class="row justify-content-center" id="section1">
        <div class="d-flex align-items-center justify-content-center">
            <div class="video-container">
                <video autoplay muted loop class="custom-video">
                    <source src="<?php echo get_stylesheet_directory_uri(); ?>/images/video.mp4" type="video/mp4">
                </video>
                <div class="gradient-overlay-top"></div>
                <div class="gradient-overlay-left"></div>
                <div class="top-bar">
                    <div class="menu">
                        <div>
                            <a href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.svg" alt="Logo"
                                    class="img-fluid"></a>
                        </div>
                        <div class="d-flex">
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'top-menu',
                                    'container' => 'div',
                                    'container_class' => 'menu-items',
                                    'link_before' => '<button class="btn btn-primary">',
                                    'link_after' => '</button>',
                                )
                            );
                            ?>
                        </div>

                    </div>
                </div>
                <div class="content">
                    <div class="tag">Tag title</div>
                    <div class="title">
                        <h1>
                            <span>SECTION 1</span>
                            <div class="message">
                                <div class="word">Alpha</div>
                                <div class="word">Bravo</div>
                                <div class="word">Charlie</div>
                                <div class="word">Delta</div>
                                <div class="word">Echo</div>
                                <div class="word">Foxtrot</div>
                            </div>
                        </h1>
                    </div>
                    <div class="description"><b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting
                        industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                        printer took a galley of type and scrambled it to make a type specimen book. It has survived not
                        only five centuries, but also the leap into electronic typesetting, remaining essentially
                        unchanged.

                    </div>
                    <div class="buttons">
                        <div class="d-flex">
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'top-menu',
                                    'container' => 'div',
                                    'container_class' => 'menu-items',
                                    'link_before' => '<button class="btn btn-primary">',
                                    'link_after' => '</button>',
                                )
                            );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
