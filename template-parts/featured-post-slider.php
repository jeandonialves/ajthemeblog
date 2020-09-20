<section class="featured-post-slider">
    <div class="container">
        <?php
        $sticky = get_option('sticky_posts');
        if (!empty($sticky)) {
        ?>
            <div class="row">
                <div class="col-12">
                    <h3>Notícias em destaque</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12 featured-post-slides-container">

                    <?php
                    rsort($sticky);
                    $args = array(
                        'post__in' => $sticky
                    );
                    query_posts($args);
                    ?>

                    <div class="featured-post-slides">

                        <?php
                        while (have_posts()) {
                            the_post();
                        ?>

                            <article class="card-post-slide" <?php post_class(); ?>>
                                <div class="row">
                                    <div class="col-5">
                                        <?php the_post_thumbnail('medium', array('class' => 'card-img-top')); ?>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="category"><?php the_category(' '); ?></h5>
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <div class="excerpt">
                                            <?php the_excerpt(); ?>
                                        </div>
                                    </div>
                                    <div class="col-1"></div>
                                </div>
                            </article>

                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php  } ?>
    </div>
</section>