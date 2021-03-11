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
					
								<div class="metabox">
										<?php $relatedWriter = get_field('related_autor'); 
										if($relatedWriter){
											foreach ($relatedWriter as $writer) { ?>
											<div class="author__meta-container">
						
												<div class="author__meta-image">
													<?php echo get_the_post_thumbnail($writer); ?>
												</div>	
												<div class="author__meta-profile">									
													<p class="author__meta-name"><a href="<?php echo get_the_permalink($writer)?>" class="popular-articles__link"><?php echo get_the_title($writer)?></a></p>
												</div>
											</div>
											<?php } 
										} ?>
						
									<span class="category-tag"><?php echo get_the_term_list(get_the_ID(), 'artykuly_kategorie', '', ', ', ''); ?></span>
									<span class="metabox__date"><?php the_date( 'd F Y'); ?></span>					
								</div>								

								<div class="post__image">
									<?php the_post_thumbnail();?>
								</div>
								<?php 

									$sponsor = get_field('artykul_sponsorowany');

									if($sponsor) { ?>
										<div class="metabox">

											<span class="category-tag">artykuł sponsorowany</span>
										</div>
									
								<?php } ?>
								
								<div class="post__content">
									<?php the_content(); ?>
									<div class="post-nav-links__container">
										<?php wp_link_pages(); ?>
									</div>

									<div class="tags__container">
     									<?php the_tags( '<span class="tags">', '</span><span class="tags">', '</span>' ); ?>
									</div>
								</div>
								
								
							<?php endwhile; wp_reset_postdata();?>

					<div class="post__otherposts">
						<h4 class="post__otherposts-title">Mogą Cię również zainteresować: </h4>

					<div class="row">


						 <?php
						$obj = get_queried_object();

    					if( $obj->post_type === 'artykuly' ) {
        						$postid = $obj->ID;
        				} ?>

						<?php $articles = new WP_Query(array(

						              'post_type'       =>  'artykul',
						              'posts_per_page' => 3,
						              'paged' => $paged ,
						              'post__not_in' => array( $postid ),
						              'orderby' => 'rand'   

		          				)); ?>

						<?php while($articles->have_posts()) :?>
								        <?php $articles->the_post();

								        $post_category = get_the_term_list(get_the_ID(), 'artykuly_kategorie', '', ', ', ''); ?>

						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
							<div class="articles__item">
								<!-- <span class="articles__category-tag category-tag category-tag--red"><?php echo $post_category; ?></span> -->
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
					<div class="category effect4">
						<h3 class="sidebar__title bg--blue">Kategorie</h3>
						<nav class="category--blue category__uppertext">

							

							<?php // Get the taxonomy's terms
							$terms = get_terms(
			    				array(
			        				'taxonomy'   => 'artykuly_kategorie',
			        				'hide_empty' => true,
			    					)
								); 						

								?>	
							<?php 	if ( !empty( $terms ) && is_array( $terms ) ) { 
								    // Run a loop and print them all ?>

								    <ul class="category__list">
								   <?php  foreach ( $terms as $term ) { ?>
								   		<li>
								        <a href="<?php echo esc_url( get_term_link( $term ) ) ?>" class="category--blue__link">
								            <?php echo $term->name; ?>
								        </a></li>
								    <?php } ?>
								    <li class="category__item">
								    	<a href="<?php echo site_url('/artykuly');?>" class="category__link">Wszystkie</a>
								    </li>

								</ul>
								<?php } ?>
						</nav>
					</div>

					<?php mws_news(3); ?>					
					<?php mws_training_events(3); ?>	
					<?php mws_inspirations(3);?>		
					
				
					
				</aside>
			</div>
		</section>
	</div><!-- #content -->
</div><!-- #primary -->
<?php get_footer(); ?>