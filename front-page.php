
    <?php get_header(); ?>

    <main>
      <div class="container">
        <div class="col-md-8  col-lg-9">

  <?php 
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post(); 
?>
          <div class="blog-post">
            <div class="blog-post__image">
              <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('img-responsive'); ?></a>
            </div>
            <div class="blog-post__title">
              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </div>
            <div class="blog-post__info">
              <span>By <a href="#"><?php the_author(); ?></a></span>
           <!--    <span>January 25, 2021</span> -->
            <span><?php the_time('F d,Y'); ?></span>
              <span><a href="#"><?php comments_number(); ?></a></span>
            </div>
            <div class="blog-post__content">
              <p><?php echo wp_trim_words(get_the_content(), 50, '');?></p>
            </div>
            <div class="blog-post__footer">
              <a class="blog-post__footer-link" href="<?php the_permalink(); ?>">Read more</a>
              <div class="blog-post__footer-social">
                <span>Share:</span>
                <div class="blog-post__footer-social-icons">
                  <a href="#">
                    <svg>
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#facebook"></use>
                    </svg>
                  </a>
                  <a href="#">
                    <svg>
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#twitter"></use>
                    </svg>
                  </a>
                  <a href="#">
                    <svg>
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#google"></use>
                    </svg>
                  </a>
                  <a href="#">
                    <svg>
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#pinterest"></use>
                    </svg>
                  </a>
                  <a href="#">
                    <svg>
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#email"></use>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
       <?php 
              endwhile; // end while
    endif; // end if
?>

       
    <?php 
      $pagination = get_the_posts_pagination( array(
          'mid_size'  => 1,
          'prev_text' => __( 'Nex Page', 'writer' ),
          'next_text' => __( 'Previous Page', 'writer' ),
          'type'               => 'list',
          'screen_reader_text' => __( ' ' ),
      ) ); 




 $pagination = str_ireplace('navigation pagination', 'blog-pagination', $pagination);
 $pagination = str_ireplace('page-numbers', 'blog-pagination__items', $pagination);
 $pagination = str_ireplace('<li>', '  <li class="blog-pagination__item">', $pagination);







     echo $pagination;

    ?>

        </div>
        
         <?php get_sidebar(); ?>
        
      </div>
    </main>
   <?php get_footer(); ?>