<?php get_header(); ?>

<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

		<section class="page container">

			<div class="row">
				<main class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
					
					<?php
						// Start the Loop.
						while ( have_posts() ) :
						the_post(); ?>
							<h2 class="post__single-title"><?php the_title(); ?></h2>
							<div class="metabox">
							<?php 
								global $post; 
									$postcat = get_the_category( $post->ID );
									$category_id = get_cat_ID( $postcat[0]->name );
									$category_link = get_category_link( $category_id );								

									foreach( $postcat as $category ) {
		 							echo '<span class="category-tag"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></span>';  
								} 
							?>							
								<span class="metabox__date"><?php $post_date = get_the_date( 'F j Y' ); echo $post_date; ?></span>
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

						<?php endwhile; ?>				
						<?php wp_reset_postdata(); ?>	

						<div class="post__otherposts">
							<h4 class="post__otherposts-title">Mogą Cię również zainteresować: </h4>

							<div class="row">
								<?php
								$obj = get_queried_object();
				    			if( $obj->post_type === 'post' ) {
				        						$postid = $obj->ID;
				        				} ?>

										<?php $posts = new WP_Query(array(

									              'post_type'       =>  'post',
									              'posts_per_page' => 3,							             
									              'post__not_in' => array( $postid ),
									              'orderby' => 'rand'   

					          				)); ?>

									<?php while($posts->have_posts()) :?>
											        <?php $posts->the_post(); ?>

									<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
										<div class="articles__item">
											<!-- <span class="articles__category-tag category-tag category-tag--red"><?php echo get_the_term_list(get_the_ID(), 'category', '', ', ', ''); ?></span> -->
											<a href="#" class="articles__image-link">
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
				</main>

				<aside class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">
					<div class="category effect4">
						<h3 class="sidebar__title bg--red">Kategorie</h3>
						<nav class="category__uppertext">

							<?php
								$categories = get_categories( array(
									'orderby' => 'name',
									'order'   => 'ASC',
									'hide_empty'	=> true	,
									'exclude'		=>	1
								) );?>	
									
							<?php 	if ( !empty( $categories ) && is_array( $categories ) ) { 
								 // Run a loop and print them all ?>

								<ul class="category__list">
									<?php  foreach ( $categories as $category ) { ?>
									<li>
										<a href="<?php echo get_category_link($category->term_id)?>" class="category__link">
										<?php echo $category->name; ?>
									</a></li>
									<?php } ?>
									<li class="category__item">
										<a href="<?php echo site_url('/aktualnosci');?>" class="category__link">Wszystkie</a>
									 </li>

								</ul>
								<?php } ?>
						</nav>				
					</div>
					<?php mws_popular_articles(3); ?>
					<?php mws_training_events(3); ?>
					<?php mws_inspirations(3);?>			
					
				</aside>
			</div>
		</section>
	</div><!-- #content -->
</div><!-- #primary -->
		
	

<?php get_footer(); ?>