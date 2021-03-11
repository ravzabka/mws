<?php 
/*
 Template Name: Wydarzenia
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
									<?php 
										$image = get_field('page_banner_icon');
										if( !empty( $image ) ): ?>
										    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="banner__icon" />
										<?php endif; ?>									
									<h3 class="banner__title"><?php the_title(); ?></h3>
								</div>
								<div class="banner__title-desc"><?php the_content(); ?></div>
							</div>

					</div>	
						<!-- .Page Banner  -->	


						<?php

							$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
							$events = new WP_Query(array(
		              
						        'post_type'       =>  'event' ,
						        'posts_per_page' =>	5,
						        'paged'		=>	$paged		     

		          			));


							if($events->have_posts()) { ?>
								<?php while($events->have_posts()) {?>
								    <?php $events->the_post(); 

										get_template_part( 'template-parts/content', 'event');

							} ?>

								<nav class="pagination">
		     						<?php
		     							$big = 999999999;
									     echo paginate_links( array(
									          'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
									          'format' => '?paged=%#%',
									          'current' => max( 1, get_query_var('paged') ),
									          'total' => $events->max_num_pages,
									          'prev_text' => '&laquo;',
									          'next_text' => '&raquo;'
									     ) ); ?>
								</nav>  

								<?php }  ?>
					
				</main>
				<aside class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">

					<div class="news">

						<h3 class="sidebar__title bg--red">Najnowsze wiadomości</h3>
						<ul class="news__list">
							<?php 
							   // the query
							   $the_query = new WP_Query( array(
							      'post_type'       =>  'post',
							      'posts_per_page' => 3,
							   )); 
							?>
							<?php if ( $the_query->have_posts() ) : ?>
		  					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

							<li class="news__item"><a href="#" class="news__link"><?php the_title(); ?></a></li>
							
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>						
							<?php endif; ?>	
						</ul>
					</div>
			
					<div class="popular-articles">
						<h3 class="sidebar__title bg--green">Popularne artykuły</h3>
						<ul class="popular-articles__list">
						
						<?php 
							   // the query
							   $the_query = new WP_Query( array(
							      'post_type'       =>  'article',
							      'posts_per_page' => 3
							   )); 
						?>
						<?php if ( $the_query->have_posts() ) : ?>
  							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

	  						<li class="popular-articles__item">
								<h4 class="popular-articles__title">
									<a href="<?php the_permalink(); ?>" class="popular-articles__link"><?php the_title(); ?></a>
								</h4>
								<?php $writer = get_field('related_writer');	

									if( $writer ): ?>
										<?php foreach( $writer as $p ): // variable must NOT be called $post (IMPORTANT) ?>
										 <div class="author__meta">
											<div class="author__meta-image">
												<?php echo get_the_post_thumbnail( $p->ID ); ?>
											</div>
											<div class="author__meta-profile">
												<p class="author__meta-name"><a href="<?php echo get_the_permalink( $p->ID ); ?>" class="popular-articles__link"><?php echo get_the_title( $p->ID ); ?></a></p>
												
											</div>
										</div>	   
									<?php endforeach; ?>	
								<?php endif; ?>								
							</li>

					 		<?php endwhile; ?>

					 		<?php wp_reset_postdata(); ?>

							<?php endif; ?>						
						</ul>					
				
					</div>				
			
				</aside>				
			</div>
		</section>
	</div>
</div>

<?php get_footer(); ?>