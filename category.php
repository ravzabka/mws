<?php get_header(); ?>
<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">
		<section class="container">
			<div class="row">
				<main class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
					<!-- Page Banner  -->
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
								<div class="banner__title-desc">Tutaj znajdziesz najświeższe informacje.</div>
							</div>
					</div>	
						<!-- .Page Banner  -->	
					<div class="post">

						<?php 

							if(have_posts()) { ?>
							    <?php while(have_posts()) {?>
							        <?php the_post(); 

							        get_template_part( 'template-parts/content');

							  } ?>

							    <?php the_posts_pagination( array(
									'mid_size'  => 2,
									'prev_text' => '&laquo;',
									'next_text' => '&raquo;',
									'screen_reader_text' => ' ',

								) );?>

							<?php } else { ?>

			   			 		<p><?php _e('Przykro nam, ale aktualnie brak postów w tej kategorii', 'mws'); ?></p>
			   			 		<?php wp_reset_postdata();  ?>
							<?php } ?>
					
					</div>
				</main>	
				<aside class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">	
					<div class="category effect4">
						<h3 class="sidebar__title bg--red">Kategorie</h3>
						<nav class="category__uppertext">

							<?php $cat = get_the_category(); ?>

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
								   		<li <?php if($cat[0]->cat_name == $category->name) echo 'class="current-cat"';?>>
								        <a href="<?php echo get_category_link($category->term_id)?>" class="category__link">
								            <?php echo $category->name; ?>
								        </a></li>
								    <?php } ?>
								    <li class="category__item">
								    	<a href="<?php echo site_url('/aktualnosci');?>" class="category__link">Wszystkie</a>
								    </li>

								</ul>
								<?php } ?>
						</nav>
					</div>
						
					<?php mws_popular_articles(3); ?>
					<?php mws_training_events(3); ?>
					<?php mws_inspirations(3);?>
					
				</aside>
			</div>	
		</section>
	</div>
</div>

<?php get_footer(); ?>


