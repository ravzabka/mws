<?php 
/*
 Template Name: Narzędzia
 */

 ?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">
		<section class="container">
			<div class="row">
				<main class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
						
					<div class="banner__main-image-container">

				        <?php  $image = get_field('page_banner_background_image');
				            if( !empty( $image ) ): ?>
				                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="banner__main-image" />
				            <?php endif; ?>
				            
				            <div class="banner__container">
				                <div class="banner__title-container">
				              		<?php $image = get_field('page_banner_icon');

				              		if( !empty( $image ) ): ?>
				                  		<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="banner__icon" />
				              		<?php endif; ?>                 
				                  	<h3 class="banner__title"><?php the_title(); ?></h3>
				                
				                </div>
				                <?php $desc = get_field('page_banner_subtitle');?>
				                <div class="banner__title-desc"><?php echo $desc;?></div>               
			              	</div>
			        </div> 
			          
            		<div class="row"> 					
						<?php

							$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
							$tools = new WP_Query(array(	

						        'post_type'       =>  'narzedzia',
						        'posts_per_page' =>	10,
						        'paged'		=>	$paged		
		          			));

							if($tools->have_posts()) { ?>
								<?php while($tools->have_posts()) {?>
								    	
								    <?php $tools->the_post();
									get_template_part( 'template-parts/content', 'narzedzia');
							} ?>
											

							  	<nav class="pagination">
		     						<?php
		     							$big = 999999999;
									     echo paginate_links( array(
									          'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
									          'format' => '?paged=%#%',
									          'current' => max( 1, get_query_var('paged') ),
									          'total' => $tools->max_num_pages,
									          'prev_text' => '&laquo;',
									          'next_text' => '&raquo;'
									     ) ); ?>
								</nav>  
								  
								<?php } ?>
					</div>
						
				</main>
				
				<aside class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">	
					
					<?php mws_news(3); ?>
					<?php mws_popular_articles(3); ?>
					<?php mws_training_events(3); ?>
					<?php mws_inspirations(3);?>			
			
				</aside>
			</div>
		</section>
	</div>
</div>

<?php get_footer(); ?>