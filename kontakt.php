<?php

 /*
 Template Name: Kontakt
 */

 ?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">
		
		<section class="address mb-5">
			<div class="container">
				<div class="row">
					
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 offset-lg-1 text-center">
						<h2 class="title text-center">Formularz kontaktowy</h2>			
						

					<?php while ( have_posts() ) :

						the_post(); ?>
						<?php the_content(); ?>						
							
					<?php endwhile; ?>	
						
						
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 offset-md-3 text-center mt-5">
						<?php echo do_shortcode( '[contact-form-7 id="211" title="kontakt"]' ); ?>
					</div>
					
				</div>
			</div>
			
		</section>
	
		<section class="container">
			<?php get_template_part( 'template-parts/content', 'newsletter');	?>
		</section>
	</div>
</div>





<?php get_footer(); ?>