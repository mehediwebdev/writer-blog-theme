<?php get_header(); ?>

<?php 
$elementor_page = get_post_meta( get_the_ID(), '_elementor_edit_mode');
if( $elementor_page ): ?>
    <div class="technology-page-builder">
        <?php
        while( have_posts() ):
            the_post();
        ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
    </div>
<?php else: ?>
    <div class="single-page">
        <?php
        while( have_posts() ):
            the_post();
        ?>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php the_content(); ?></p>
        <?php endwhile; ?>
    </div>
<?php endif; ?>      

<?php get_footer(); ?>