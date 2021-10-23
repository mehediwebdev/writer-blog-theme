<?php

/**
 * Register widget area.
 *
 */
function writer_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Main Sidebar', 'writer' ),
			'id'            => 'right-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'writer' ),
			'before_widget' => '<div class="sidebar-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		)
	);

  // Social Icon Custom widget

	register_widget( 'social_icon' );
  register_widget( 'popular_post' );
  register_widget( 'latest_post' );

}
add_action( 'widgets_init', 'writer_widgets_init' );

//Social Widget Start

class social_icon extends WP_Widget{

	function __construct() {

		parent::__construct(
		// widget ID
		'social_icon',
		// widget name
		__('Writer Social Icon', 'writer'),
		// widget description
		array( 'description' => __( 'Write theme social widget', 'writer' ), )
		);
	}

    public function widget( $args, $instance ) {
    	    ?>
		   <?php echo $args['before_widget']; ?>
            <?php echo $args['before_title']; ?><?php echo $instance['title'] ?><?php echo $args['after_title']; ?>
            <div class="sidebar-widget__follow-me">
              <div class="sidebar-widget__follow-me-icons">
                <a href="<?php echo $instance['facebook'] ?>">
                  <?php if(!empty($instance['facebook'])) { ?>
                  <svg>
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#facebook"></use>
                  </svg>
                   <?php } ?>
                </a>
                <a href="<?php echo $instance['twitter'] ?>">
                 <?php if(!empty($instance['twitter'])) { ?>
                  <svg>
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#twitter"></use>
                  </svg>
                   <?php } ?>
                </a>
                <a href="<?php echo $instance['google_plus'] ?>">
                 <?php if(!empty($instance['google_plus'])) { ?>
                  <svg>
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#google"></use>
                  </svg>
                   <?php } ?>
                </a>
                <a href="<?php echo $instance['pinterest'] ?>">
                <?php if(!empty($instance['pinterest'])) { ?>
                  <svg>
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#pinterest"></use>
                  </svg>
                   <?php } ?>
                </a>
                <a href="<?php echo $instance['instagram'] ?>">
                 <?php if(!empty($instance['instagram'])) { ?>
                  <svg>
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#instagram"></use>
                  </svg>
                   <?php } ?>
                </a>
              </div>
            </div>
        <?php echo $args['after_widget']; ?>
          <?php
	}



	public function form( $instance ) {
	  ?>
	    <p>
        	<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
        	<input id="<?php echo $this->get_field_id('title'); ?>" class="widefat" type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>">
        </p>

        <p>
        	<label for="<?php echo $this->get_field_id('facebook'); ?>">Facebook</label>
        	<input id="<?php echo $this->get_field_id('facebook'); ?>" class="widefat" type="text" name="<?php echo $this->get_field_name('facebook'); ?>" value="<?php echo $instance['facebook']; ?>">
        </p>
        
	    <p>
	    	<label for="<?php echo $this->get_field_id('twitter'); ?>">Twitter</label>
	    	<input id="<?php echo $this->get_field_id('twitter'); ?>" class="widefat" type="text" name="<?php echo $this->get_field_name('twitter'); ?>" value="<?php echo $instance['twitter']; ?>">
        </p>

        <p>
	    	<label for="<?php echo $this->get_field_id('google_plus'); ?>">Google</label>
	    	<input id="<?php echo $this->get_field_id('google_plus'); ?>" class="widefat" type="text" name="<?php echo $this->get_field_name('google_plus'); ?>" value="<?php echo $instance['google_plus']; ?>">
        </p>

         <p>
	    	<label for="<?php echo $this->get_field_id('pinterest'); ?>">Pinterest</label>
	    	<input id="<?php echo $this->get_field_id('pinterest'); ?>" class="widefat" type="text" name="<?php echo $this->get_field_name('pinterest'); ?>" value="<?php echo $instance['pinterest']; ?>">
        </p>
        <p>
	    	<label for="<?php echo $this->get_field_id('instagram'); ?>">Instagram</label>
	    	<input id="<?php echo $this->get_field_id('instagram'); ?>" class="widefat" type="text" name="<?php echo $this->get_field_name('instagram'); ?>" value="<?php echo $instance['instagram']; ?>">
        </p>
	  <?php
	}


   public function update( $new_instance, $old_instance ) {
	$instance = array();

	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

    $instance['facebook'] = esc_url(strip_tags( $new_instance['facebook'] ));
    
    $instance['twitter'] = esc_url(strip_tags( $new_instance['twitter'] ));
    $instance['google_plus'] = esc_url(strip_tags( $new_instance['google_plus'] ));
    $instance['pinterest'] = esc_url(strip_tags( $new_instance['pinterest'] ));
    $instance['instagram'] = esc_url(strip_tags( $new_instance['instagram'] ));
    

	return $instance;
   }

}

//Social Widget End

// Post View Count start

function post_view($id, $echo = false ){
      $view = get_post_meta($id,'post_view',true);

             if($view == NULL){
                  $view = 0;
          }
        $view++;

    update_post_meta( $id,'post_view',$view);
    if($echo ==false){
      return $view;
    }else{
      echo $view;
    }

  }

  // Popular post widget Start

  class popular_post extends WP_Widget {


 function __construct() {

    parent::__construct(
    // widget ID
    'popular_post',
    // widget name
    __('Writer Popular Post', 'writer'),
    // widget description
    array( 'description' => __( 'Write theme popular post widget', 'writer' ), )
    );
  }

 public function widget( $args_popular, $instance_popular ) {


  ?>
      <?php echo $args_popular['before_widget']; ?>
            <?php echo $args_popular['before_title']; ?><?php echo $instance_popular['title_popular'] ?><?php echo $args_popular['after_title']; ?>
            <?php 
              $pop = new WP_Query( array(
                  'post_type' => 'post',
                  'posts_per_page' => $instance_popular['popular_post_number'],
                  'meta_key' => 'post_view',
                  'orderby' => 'meta_value_num',
                  
               ))
            ?>
           <?php while($pop->have_posts()):$pop->the_post(); ?>
            <div class="sidebar-widget__popular">
              <div class="sidebar-widget__popular-item">
                <div class="sidebar-widget__popular-item-image">
                  <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail('img-responsive'); ?></a>
                </div>
                <div class="sidebar-widget__popular-item-info">
                  <div class="sidebar-widget__popular-item-date">
                    <span>January 24, 2021</span>
                  </div>
                  <div class="sidebar-widget__popular-item-content">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </div>
                </div>
              </div>
            </div>
         <?php endwhile; ?>
         <?php echo $args_popular['after_widget']; ?>

<?php
 }


public function form( $instance_popular ) {
    ?>
      <p>
          <label for="<?php echo $this->get_field_id('title_popular'); ?>"> Title</label>
          <input id="<?php echo $this->get_field_id('title_popular'); ?>" class="widefat" type="text" name="<?php echo $this->get_field_name('title_popular'); ?>" value="<?php echo $instance_popular['title_popular']; ?>">
        </p>

        <p>
          <label for="<?php echo $this->get_field_id('popular_post_number'); ?>">Number of Posts</label>
          <input id="<?php echo $this->get_field_id('popular_post_number'); ?>" class="widefat" type="text" name="<?php echo $this->get_field_name('popular_post_number'); ?>" value="<?php echo $instance_popular['popular_post_number']; ?>">
        </p>
    <?php
  }

}

 // Popular post widget End

// Latest post widget Start

class latest_post extends WP_Widget{

  function __construct() {

    parent::__construct(
    // widget ID
    'latest_post',
    // widget name
    __('Writer Latest Post', 'writer'),
    // widget description
    array( 'description' => __( 'Write theme Latest Post widget', 'writer' ), )
    );
  }


 public function widget( $args_latest, $instance_latest ) {


  ?>
      <?php echo $args_latest['before_widget']; ?>
            <?php echo $args_latest['before_title']; ?><?php echo $instance_latest['title_latest'] ?><?php echo $args_latest['after_title']; ?>
            <?php 
              $lop = new WP_Query( array(
                  'post_type' => 'post',
                  'posts_per_page' => $instance_latest['latest_post_number'],
                  
               ))
            ?>
           <?php while($lop->have_posts()):$lop->the_post(); ?>
            <div class="sidebar-widget__popular">
              <div class="sidebar-widget__popular-item">
                <div class="sidebar-widget__popular-item-image">
                  <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail('img-responsive'); ?></a>
                </div>
                <div class="sidebar-widget__popular-item-info">
                  <div class="sidebar-widget__popular-item-date">
                    <span>January 24, 2021</span>
                  </div>
                  <div class="sidebar-widget__popular-item-content">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </div>
                </div>
              </div>
            </div>
         <?php endwhile; ?>
         <?php echo $args_latest['after_widget']; ?>

<?php
 }


public function form( $instance_latest ) {
    ?>
      <p>
          <label for="<?php echo $this->get_field_id('title_latest'); ?>">Title</label>
          <input id="<?php echo $this->get_field_id('title_latest'); ?>" class="widefat" type="text" name="<?php echo $this->get_field_name('title_latest'); ?>" value="<?php echo $instance_latest['title_latest']; ?>">
        </p>

        <p>
          <label for="<?php echo $this->get_field_id('latest_post_number'); ?>">Number of Posts</label>
          <input id="<?php echo $this->get_field_id('latest_post_number'); ?>" class="widefat" type="text" name="<?php echo $this->get_field_name('latest_post_number'); ?>" value="<?php echo $instance_latest['latest_post_number']; ?>">
        </p>
    <?php
  }

}
 // Latest post widget End