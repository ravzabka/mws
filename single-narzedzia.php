<?php get_header(); ?>
<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

<section class="container">

	<div class="row">
		<main class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
			<div class="post">	
			
					<?php
					// Start the Loop.
					while ( have_posts() ) :
						the_post(); ?>
						<h2 class="post__single-title"><?php the_title(); ?></h2>
						<div class="post__image">
							<?php the_post_thumbnail();?>
						</div>			
					
						
						<div class="post__content">
									<?php the_content(); ?>
									<div class="post-nav-links__container">
										<?php wp_link_pages(); ?>
									</div>

									<div class="tags__container">
     									<?php the_tags( '<span class="tags">', '</span><span class="tags">', '</span>' ); ?>
									</div>
								</div>
						
										
						
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>	
					<div class="post__otherposts">
						<h4 class="post__otherposts-title">Mogą Cię również zainteresować: </h4>

						<div class="row">


							 <?php
							$obj = get_queried_object();

		    					if( $obj->post_type === 'narzedzia' ) {
		        						$postid = $obj->ID;
		        				} ?>

								<?php $posts = new WP_Query(array(

							              'post_type'       =>  'narzedzia',
							              'posts_per_page' => 3,							             
							              'post__not_in' => array( $postid ),
							              'orderby' => 'rand'   

			          				)); ?>

							<?php while($posts->have_posts()) :?>
									        <?php $posts->the_post(); ?>

							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
								<div class="articles__item">
									
									<a href="#" class="articles__image-link">
										<div class="articles__image">
											<?php the_post_thumbnail();?>
										</div>									
									</a>
									<a href="<?php the_permalink(); ?>"><h3 class="articles__title"><?php the_title(); ?></h3></a>
								</div>
							</div>

							<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>						
								
						</div>

					</div>		
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