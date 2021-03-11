<?php 

require_once('lib/enqueue-assets.php');
require_once('lib/theme-support.php');
require_once('lib/navigation.php');
require_once('lib/popular-articles.php');
require_once('lib/news.php');



function get_terms_name($postid, $specialization){




	$terms = get_the_terms( $postid , $specialization );
	if($terms){
		foreach ( $terms as $term ) {
			echo $term->name;
		}
	}else {
		echo "";
	}
	
}

function pageBannerIndex() { ?>

  <div class="banner__main-image-container">

              <?php 

              $image = get_field('page_banner_background_image',  get_option('page_for_posts'));
              if( !empty( $image ) ): ?>
                  <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="banner__main-image" />

              <?php endif; ?>           

              <div class="banner__container">
                <div class="banner__title-container">
                  
              <?php 
                    $image = get_field('page_banner_icon', get_option('page_for_posts'));
              if( !empty( $image ) ): ?>
                  <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="banner__icon" />
              <?php endif; ?>                 
                  <h3 class="banner__title">Aktualności</h3>
                </div>
                <div class="banner__title-desc">Najnowsze informacje portalu MWS</div>
              </div>
            </div>  

<?php }

function pageBanner($post_type){ ?>

    <div class="banner__main-image-container">
        
        <?php 
              
            $obj = get_post_type_object( $post_type );  
            $page = get_page_by_path( $obj->slug );
            $title = get_the_title( $page );
            $page_id = get_page_by_title( $title );  


            $post_id  = $page_id->ID;
            $image = get_field('page_banner_background_image', $post_id);

            if( !empty( $image ) ): ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="banner__main-image" />
            <?php endif; ?>         

            <div class="banner__container">
                <div class="banner__title-container">
                  <?php 

                  $icon = get_field('page_banner_icon',$post_id);
                  if( !empty( $icon ) ): ?>
                      <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" class="banner__icon" />
                  <?php endif; ?>                 
                  <h3 class="banner__title"><?php echo get_the_title($post_id); ?></h3>
                </div>

                <?php   

                $post = get_post( $post_id );
                $output =  apply_filters( 'the_content', $post->post_content );

                ?>
                <div class="banner__title-desc"><?php echo $output; ?></div>
            </div>
    </div>         

<?php }


function mws_sidebar(){

    $args = array(
    'name'          => __('Facebook Widget','mws'),
    'id'            =>  'facebook-widget',
    'description'   =>  'Widget for facebook feeds',
    'before_widget' => '<div class = "facebook_widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
    
    );

    register_sidebar($args);



    $args = array(
    'name'          => __('Front Page Widget','mws'),
    'id'            =>  'front-widget',
    'description'   =>  'Widget for front feeds'
    
    );

    register_sidebar($args);


    $args = array(
    'name'          => __('Newsletter Widget','mws'),
    'id'            =>  'newsletter-widget',
    'description'   =>  'Widget for front feeds'
    
    );

    register_sidebar($args);
}

add_action('widgets_init', 'mws_sidebar');


function mws_custom_pagination($post_type){

  $big = 999999999;
  echo paginate_links( array(

      'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
      'format' => '?paged=%#%',
      'current' => max( 1, get_query_var('paged') ),
      'total' => $post_type->max_num_pages,
      'prev_text' => '&laquo;',
      'next_text' => '&raquo;'
  ) ); 
}


function orderby_post_title_int( $orderby )
{ return '(wp_posts.post_title+0) ASC'; }

 function SearchFilter($query) {

    // If 's' request variable is set but empty
    if (isset($_GET['s']) && empty($_GET['s']) && $query->is_main_query()){
        $query->is_search = true;
        $query->is_home = false;
    }
    return $query;
  }

add_filter('pre_get_posts','SearchFilter');

add_theme_support( 'responsive-embeds' );














