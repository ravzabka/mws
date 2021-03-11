<?php
/*
Template Name: Download
*/
?>

<?php get_header(); ?>
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">	
			<section class="container">
				<div class="row">
					<main class="col-xs-12 col-sm-12 col-md-12 col-lg-12">					
						<?php // Start the Loop.
							while ( have_posts() ) :
								the_post(); ?>

									<h2 class="single-event__title"><?php the_title(); ?></h2>	
									<?php the_content(); ?>	
							<?php endwhile; ?>	

							<!-- ACF plugin  -->

							<div class="row">

								<div class="col-6 col-sm-6 col-md-3 col-lg-2 mb-3">
									<img src="<?php echo get_template_directory_uri(); ?>/img/pics/biologia_ksiazka_milab.jpg" alt="" class="download__image">
									<div class="btn__container text-center">
										<a href="#" class="btn">Pobierz</a>
									</div>
								</div>

								<div class="col-6 col-sm-6 col-md-3 col-lg-2 mb-3">
									<img src="<?php echo get_template_directory_uri(); ?>/img/pics/biologia_ksiazka_milab.jpg" alt="" class="download__image">
									<div class="btn__container text-center">
										<a href="#" class="btn">Pobierz</a>
									</div>
								</div>

								<div class="col-6 col-sm-6 col-md-3 col-lg-2 mb-3">
									<img src="<?php echo get_template_directory_uri(); ?>/img/pics/biologia_ksiazka_milab.jpg" alt="" class="download__image">
									<div class="btn__container text-center">
										<a href="#" class="btn">Pobierz</a>
									</div>
								</div>

								<div class="col-6 col-sm-6 col-md-3 col-lg-2 mb-3">
									<img src="<?php echo get_template_directory_uri(); ?>/img/pics/biologia_ksiazka_milab.jpg" alt="" class="download__image">
									<div class="btn__container text-center">
										<a href="#" class="btn">Pobierz</a>
									</div>
								</div>

								<div class="col-6 col-sm-6 col-md-3 col-lg-2 mb-3">
									<img src="<?php echo get_template_directory_uri(); ?>/img/pics/biologia_ksiazka_milab.jpg" alt="" class="download__image">
									<div class="btn__container text-center">
										<a href="#" class="btn">Pobierz</a>
									</div>
								</div>

								<div class="col-6 col-sm-6 col-md-3 col-lg-2 mb-3">
									<img src="<?php echo get_template_directory_uri(); ?>/img/pics/biologia_ksiazka_milab.jpg" alt="" class="download__image">
									<div class="btn__container text-center">
										<a href="#" class="btn">Pobierz</a>
									</div>
								</div>

								<div class="col-6 col-sm-6 col-md-3 col-lg-2 mb-3">
									<img src="<?php echo get_template_directory_uri(); ?>/img/pics/biologia_ksiazka_milab.jpg" alt="" class="download__image">
									<div class="btn__container text-center">
										<a href="#" class="btn">Pobierz</a>
									</div>
								</div>

								<div class="col-6 col-sm-6 col-md-3 col-lg-2 mb-3">
									<img src="<?php echo get_template_directory_uri(); ?>/img/pics/biologia_ksiazka_milab.jpg" alt="" class="download__image">
									<div class="btn__container text-center">
										<a href="#" class="btn">Pobierz</a>
									</div>
								</div>

							</div>		
					</main>
				</div>
			</section>		
		</div>
	</div>

<?php get_footer(); ?>