<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <section class="header-blog">
            <div class="container">
                <div class="row align-items-center items">
                    <div class="col-3">
                        LOGO
                    </div>
                    <div class="col-9 text-right">
                        MENU
                    </div>
                </div>
            </div>
        </section>
    </header>

    <div class="global-loading">
        <div class="block">
            <div class="spinner-border text-primary" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>