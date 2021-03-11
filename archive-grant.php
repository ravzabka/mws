<?php 
/*
 Template Name: Dotacje
 */

 ?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">
		<section class="container">
			<div class="row">
				<main class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
					
						<!-- Page Banner  -->	 
					<div class="banner__main-image-container">

				        <?php 

				        	$image = get_field('page_banner_background_image');
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

					<?php

						$articles = new WP_Query(array(		              
						    'post_type'       =>  'grant'  
		          		));

						if($articles->have_posts()) { ?>

							<?php while($articles->have_posts()) {?>
							
								<?php $articles->the_post(); 

								    get_template_part( 'template-parts/content', 'grant');

								} ?>

								<?php the_posts_pagination();?>

								<?php } else { ?>

				   			<p><?php _e('Sorry, no posts', 'mws'); ?></p>
						<?php } ?>						
				</main>	
				<aside class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">	
					
					<?php mws_news(3); ?>					
					<?php mws_training_events(3); ?>	
					<?php mws_popular_articles(3); ?>					
			
				</aside>
			</div>	
		</section>
	</div>
</div>

<?php get_footer(); ?>