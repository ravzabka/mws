<?php get_header(); ?>
<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">
		<section class="container">
			<div class="row">
				<main class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
					<div class="post">

						<?php 


							if(have_posts()) { ?>
							    <?php while(have_posts()) {?>
							        <?php the_post(); 

							        get_template_part( 'template-parts/content');

							  } ?>

							    <?php the_posts_pagination( array(
								'mid_size'  => 2,
								'prev_text' => __( 'Wcześniejsze', 'mws' ),
								'next_text' => __( 'Następne', 'mws' ),
							) );?>

							<?php } else { ?>

			   			 		<p><?php _e('Sorry, no posts', 'mws'); ?></p>
			   			 		<?php wp_reset_postdata();  ?>
							<?php } ?>
					
					</div>
				</main>	
				<aside class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">	
						
			
					<?php mws_popular_articles(3); ?>					
					<?php mws_inspirations(3);?>	
					<?php mws_training_events(3); ?>		
						
				</aside>
				
			</div>	
		</section>
	</div>
</div>

<?php get_footer(); ?>


