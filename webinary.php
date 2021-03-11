<?php 
/*  Template Name: Webinar  */
?>
<?php get_header(); ?>

<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

		<section class="container">
			<div class="row">
				<main class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
						
					

					<?php   

					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
					$webinary = new WP_Query(array(

						'post_type'       =>  'webinary',
						'posts_per_page' => 10,
						'paged' => $paged   

					));	?>

					<?php while($webinary->have_posts()) {?>
						<?php $webinary->the_post(); 

						get_template_part( 'template-parts/content', 'webinary');	
					} ?>

					<nav class="pagination">
						<!-- Funkcja zdefiniowana w functions.php  -->
		     			<?php mws_custom_pagination($webinary); ?>
					</nav>

					<?php wp_reset_postdata(); ?>

				</main>

				<aside class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">
					

					<?php mws_news(3); ?>
					<?php mws_inspirations(3);?>		
					<?php mws_training_events(3); ?>
			
				</aside>
			</div>	
		</section>
	</div>
</div>

<?php get_footer(); ?>
