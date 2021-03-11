<?php get_header(); ?>
<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">
		<section class="container">
			<div class="row">
				<main class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
					<div class="post">								
					
						<?php
						// Start the Loop.
						while(have_posts() ) :
							the_post(); ?>
							<?php $unixtimestamp = strtotime(get_field('event_date')); ?>	

							<h2 class="post__single-title"><?php the_title(); ?><span>(</span><?php echo date_i18n("d F Y", $unixtimestamp ); ?>)</h2>							
						
							<div class="metabox">
															
								<span class="metabox__date"><?php the_date( 'd F Y'); ?></span>					
							</div>								

							<div class="post__image">
								<?php the_post_thumbnail();?>
							</div>

							<div class="post__content">

								<div class="single-event__link-container">
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mb-1">
											<div class="single-event__calendar">
												<ion-icon name="calendar-outline"></ion-icon> 	
												<span><?php echo date_i18n("d F Y", $unixtimestamp ); ?></span>
											</div>

										</div>
										<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mb-1">
											<div class="single-event__time">
												<ion-icon name="time-outline"></ion-icon>
													<span><?php the_field('event_time'); ?></span>
												</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mb-1">
													<div class="single-event__place-container">
													<ion-icon name="desktop-outline"></ion-icon>
													
													<div class="single-event__localization">
														<span class="single-event__place-name"><?php the_field('event_place'); ?></span>
														<span class="single-event__street"><?php the_field('event_street'); ?></span>
														<span class="single-event__city"><?php the_field('event_city'); ?></span>
													</div>
													</div>											
												
													
												</div>
									</div>
								</div>								
											
									
								<?php the_content(); ?>

									<?php 
											
										$link = get_field('event_registration');?>	
										<div class="single-event__link-container">									
										
											<div class="row">
												<div class="col-sm-6 col-md-8 align-center">
													<span class="align-center">Kliknij w link aby się zarejestrować na webin</span>
												</div>
												<div class="col-sm-6 col-md-4">
														<a href="<?php echo esc_url( $link ); ?>" class="btn btn--red btn--full btn--medium" target="_blank">Zarejestruj się</a>
												</div>
											</div>
										</div>									

										<?php $author = get_field('author_name'); ?>

										<?php if($author) : ?>

										<div class="single-event__author-container">
											<div class="row">
												<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-3">
													<?php $author_image = get_field('author_image');
													if( !empty( $author_image ) ): ?>
								    					<img src="<?php echo esc_url($author_image['url']); ?>" alt="<?php echo esc_attr($author_image['alt']); ?>" class="single-event__image"/>
													<?php endif; ?>	

												</div>
												<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-9 mt-2 mb-1">
													<p class="single-event__author-name">Prowadzący: <?php the_field('author_name'); ?></p>
													<p><?php the_field('author_desc'); ?></p>
												</div>
											</div>
										</div>

										<?php endif; ?>	
									

										<div class="post-nav-links__container">
											<?php wp_link_pages(); ?>
										</div>

										<div class="tags__container">
	     									<?php the_tags( '<span class="tags">', '</span><span class="tags">', '</span>' ); ?>
										</div>
							</div>							
									
							<?php endwhile; wp_reset_postdata();?>

						<div class="post__otherposts">
							<h4 class="post__otherposts-title">Zobacz inne webinary: </h4>

							<div class="row">
								<?php
									$obj = get_queried_object();

	    							if( $obj->post_type === 'webinary' ) {
	        						$postid = $obj->ID;
	        						} ?>

									<?php $articles = new WP_Query(array(

							            'post_type'       =>  'webinary',
							            'posts_per_page' => 3,
							            'paged' => $paged ,
							            'post__not_in' => array( $postid ),
							            'orderby' => 'rand'   

			          				)); ?>

							<?php while($articles->have_posts()) :?>
								 <?php $articles->the_post();?>						        

									<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
								<div class="articles__item">
									
									<a href="<?php the_permalink(); ?>" class="articles__image-link ">
										<div class="articles__image">
										<?php the_post_thumbnail('post-thumbnail',['class' => 'articles__image']);?>
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
					<?php mws_training_events(3); ?>	
					<?php mws_inspirations(3);?>
					
				</aside>
			</div>
		</section>
	</div><!-- #content -->
</div><!-- #primary -->
<?php get_footer(); ?>