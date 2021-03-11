<?php 
	/*
 Template Name: Autorzy
 */
 ?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">	
		<section class="container">
			<div class="row">				
				<main class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
					
						<?php

							$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;							
							$writers = new WP_Query(array(		              
						        'post_type'       =>  'autor',
						        'posts_per_page' =>	10,
						        'paged'		=>	$paged					           

		          			));

							if($writers->have_posts()) { ?>
								<?php while($writers->have_posts()) { ?>
								<?php $writers->the_post(); 
								get_template_part( 'template-parts/content', 'autor');
							}  ?>	

							<nav class="pagination">
		     					<?php
		     						$big = 999999999;
									echo paginate_links( array(
									    'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
									    'format' => '?paged=%#%',
									    'current' => max( 1, get_query_var('paged') ),
									    'total' => $writers->max_num_pages,
									    'prev_text' => '&laquo;',
									    'next_text' => '&raquo;'
									    ) ); ?>
							</nav>  
								<?php wp_reset_postdata();

							} ?>				
					
							
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