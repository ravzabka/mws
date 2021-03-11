<?php
 /*
 Template Name: Podziekowanie
 */

 ?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">
		<section class="container">
			<div class="row mt-4">

				<div class="col-md-12 col-lg-6">
					<div class="post__image">
					<?php the_post_thumbnail();?>
					</div>	
					
				</div>
				
				<div class="col-md-12 col-lg-6">
					<?php
					// Start the Loop.
					while ( have_posts() ) :
						the_post(); ?>
						
						<div class="post__content pt-5">
							<?php the_content(); ?>
						</div>										 
					<?php endwhile; ?>
				</div>
			</div>
		</section>
	</div>
</div>
<?php get_footer(); ?>