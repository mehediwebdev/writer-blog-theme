<?php get_header(); ?>
    <main>
      <div class="container">
        <div class="col-md-8  col-lg-9">
          <?php while(have_posts()):the_post(); ?>

             <?php echo  get_template_part( 'template-parts/content', get_post_type() ); 


             ?>
             
          <?php endwhile;?>
        </div>

      <?php get_sidebar(); ?>

      </div>
    </main>

    <?php get_footer(); ?>