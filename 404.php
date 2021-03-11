<?php
 /**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage MWS
 * @since MWS 1.0
 */

 ?>
<?php get_header(); ?>

<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">
		<section class="container">

			<div class="row mt-4">

				<div class="col-md-12 col-lg-6">
					<div class="post__image">
						<img src="<?php bloginfo('template_directory'); ?>/img/pics/error-page.jpg">">						
					</div>
				</div>
				
				<div class="col-md-12 col-lg-6">

					<div class="post__content pt-5">
						<h2>Wygląda na to, że zabłądziłeś!</h2>
						<p>Strona, której szukasz nie istnieje lub została usunięta.</p>							
						<p class="error-page__desc">Wróć do <a href="<?php echo home_url(); ?>" class="link">strony głównej</a></p>
					</div>										 
				
				</div>

			</div>
			
		</section>
	</div>
</div>

<?php get_footer(); ?>


				