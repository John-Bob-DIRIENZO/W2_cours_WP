<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <div class="card-group">
        <?php while (have_posts()) : ?>

            <?php the_post(); ?>

            <div class="card">
                <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="...">
                <div class="card-body">

                    <?php if (get_post_meta(get_the_ID(), 'wpheticSponso', true)) : ?>
                        <div class="alert alert-primary" role="alert">
                            Contenu Soponso
                        </div>
                    <?php endif; ?>

                    <h5 class="card-title"><?php the_title(); ?></h5>

                    <p><small> Style: <?= the_terms(get_the_ID(), 'style'); ?></small></p>

                    <p class="card-text"><?php the_content(); ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">Lire plus</a>
                </div>
            </div>

        <?php endwhile; ?>

    </div>

<?php endif; ?>




<?php get_footer(); ?>
