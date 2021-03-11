<?php
/*
Template Name Posts: Event
*/
?>

<?php get_header(); ?>
<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">	
		<section class="container">
			<div class="row">
				<main class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
					<div class="post">

					
					<?php // Start the Loop.
					while ( have_posts() ) :
						the_post(); ?>
						

							<!-- <div class="metabox">
								<span class="category-tag category-tag--green">szkolnictwo</span>
							</div>	 -->
						
							<h2 class="post__single-title"><?php the_title(); ?></h2>	

							<div class="row">

								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<?php the_post_thumbnail('post-thumbnail',['class' => 'single-event__image']);?>
								</div>

								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="single-event__container">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
												<div class="single-event__calendar">Data: 
													<?php 
														// Load field value.
														$unixtimestamp = strtotime(get_field('event_date')); ?>	
													<span><?php echo date_i18n("d F Y", $unixtimestamp ); ?></span>
												</div>

											</div>
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
													<div class="single-event__time">godzina: 
												<span><?php the_field('event_time'); ?></span>
											</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
												<div class="single-event__place-container">
												miejsce: 
												<div class="single-event__localization">
													<span class="single-event__place-name"><?php the_field('event_place'); ?></span>
													<span class="single-event__street"><?php the_field('event_street'); ?></span>
													<span class="single-event__city"><?php the_field('event_city'); ?></span>
												</div>											
											</div>
												
											</div>
										</div>
									</div>
								
								</div>
							</div>	
						
							<div class="post__content">
								<?php the_content(); ?>
							</div>
						
						
					<?php endwhile; ?>
					</div>
				</main>
				<aside class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">
					
					<?php mws_news(3); ?>
					
					<?php mws_popular_articles(3); ?>
					
				</aside>


			</div>	
		</section>
	</div>
</div>

<?php get_footer(); ?>