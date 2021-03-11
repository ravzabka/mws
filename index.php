<?php get_header(); ?>
<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">
		<section class="container">
			<div class="row">
				<main class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
					<!-- Page Banner  -->
						<?php pageBannerIndex(); ?>
						<!-- .Page Banner  -->	
					<div class="post">
						<div class="row">
	



						<?php   if(have_posts()) { ?>
							<?php while(have_posts()) {?>
							<?php the_post(); 

							get_template_part( 'template-parts/content'); } ?>

							<?php the_posts_pagination( array(
								'mid_size'  => 2,
								'prev_text' => '&laquo;',
								'next_text' => '&raquo;',
								'screen_reader_text' => ' ',
							) );?>

							<?php } else { ?>

			   			 	<p><?php _e('Przepraszamy, ale chwilowo nie ma żadnych postów', 'mws'); ?></p>

			   			 	<?php wp_reset_postdata();  ?>

							<?php } ?>
							</div>
							</div>		
					
				</main>	

				<aside class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">	
					<div class="category">
							<h3 class="sidebar__title bg--red">Kategorie</h3>
							<nav class="category__uppertext">

								<?php
										$categories = get_categories( array(
										    'orderby' => 'name',
										    'order'   => 'ASC',
										    'hide_empty'	=> true	,
										    'exclude'		=>	1
										) );?>					

								

								
									<?php 	if ( !empty( $categories ) && is_array( $categories ) ) { 
									    // Run a loop and print them all ?>

									    <ul class="category__list">
									   <?php  foreach ( $categories as $category ) { ?>
									   		<li >
									        <a href="<?php echo get_category_link($category->term_id)?>" class="category__link">
									            <?php echo $category->name; ?>
									        </a></li>
									    <?php } ?>
									

									</ul>
									<?php } ?>
							</nav>
					</div>			
			
					<?php mws_popular_articles(3); ?>					
					<?php mws_inspirations(3);?>	
					<?php mws_training_events(3); ?>		
						
				</aside>
			</div>	
		</section>
	</div>
</div>

<?php get_footer(); ?>


