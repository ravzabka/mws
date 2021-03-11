<?php get_header(); ?>
<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

<section class="container">

	<div class="row">
		<main class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
			<div class="post">	
			
					<?php
					// Start the Loop.
					while ( have_posts() ) :
						the_post(); ?>
						<div class="post__image">
							<?php the_post_thumbnail();?>
						</div>			
					
						<h2 class="post__single-title"><?php the_title(); ?></h2>
						<div class="post__content">
							<?php the_content(); ?>
						</div>
						
										
						
					<?php endwhile; ?>
			</div>
				
		</main>
		<aside class="col-xs-12 col-sm-12 col-md-3 col-lg-3">				
				<?php mws_news(3); ?>
					
				<?php mws_training_events(3); ?>	
		
		</aside>
	</div>
</section>
</div>
</div>

<?php get_footer(); ?>