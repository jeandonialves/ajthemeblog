<?php get_header('home'); ?>

<div class="page-home">
    <section class="banner">
        <div class="container">
            <div class="row search-row align-items-end">
                <div class="col-12 search-column">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section class="middle-content">
            <div class="container">

                <div class="row">
                    <div class="col-12">
                        <?php get_template_part('template-parts/featured-post-slider'); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="container">
                            <div class="row">
                                <div class="col-10">
                                    <h3 class="title">Mais recentes</h3>
                                </div>
                                <div class="col-2">
                                    <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
                                        <?php
                                        if ($terms = get_terms(array('taxonomy' => 'category', 'orderby' => 'name'))) :
                                            echo '
                                                <select id="select-category-home-filter" name="categoryfilter" class="select-category form-control">
                                                <option value="">Categoria</option>
                                            ';
                                            foreach ($terms as $term) :
                                                echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';
                                            endforeach;
                                            echo '</select>';
                                        endif;
                                        ?>
                                        <input type="hidden" name="action" value="myfilter">
                                    </form>
                                </div>
                            </div>

                            <div>
                                <div class="col-12">
                                    <div class="card-columns" id="response">
                                        <?php

                                        $args2 = array(
                                            'post_type' => 'post',
                                            'post__not_in' => get_option('sticky_posts'),
                                            'posts_per_page' => 6
                                        );

                                        global $wpquery_home;
                                        $wpquery_home = new WP_Query($args2);
                                        if ($wpquery_home->have_posts()) :
                                            while ($wpquery_home->have_posts()) : $wpquery_home->the_post();
                                        ?>
                                                <?php get_template_part('template-parts/card/card', get_post_format()) ?>
                                        <?php
                                            endwhile;
                                            wp_reset_postdata();
                                        endif;
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <?php
                                    // don't display the button if there are not enough posts
                                    if ($wpquery_home->max_num_pages > 1)
                                        echo '<div class="misha_loadmore">More posts</div>'; // you can use <a> as well
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<?php get_footer(); ?>