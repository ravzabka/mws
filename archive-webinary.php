<?php 
/*
 Template Name: Webinary
 */

 ?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">
		<section class="container">
			<div class="row">
				<main class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
					

				
				<div class="banner__main-image-container bg--white pb-5 border-bottom">			 	 
			    <?php 
					 get_template_part( 'template-parts/content', 'login');
				?>    
				</div>     
						

								<?php

								$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
								$today = date('Ymd');
								$events = new WP_Query(array(
		              
						              'post_type'       =>  'webinary' ,
						              'posts_per_page' =>	10,
						              'paged'		=>	$paged	,
						              'meta_key'  	=> 'event_date',
					    			  'orderby'   		=> 	'meta_value_num',
    								  'order'     		=> 'ASC',
					    	          'meta_query'		=> array(
								    		array(
								    			'key'     => 'event_date',
			            						'compare' => '>=',
			            						'value'   => $today,
			            						'type'	  => 'numeric'
			            				)					    		
					    			)	     

		          				));


								if($events->have_posts()) { ?>
								    <?php while($events->have_posts()) {?>
								        <?php $events->the_post(); 

											 get_template_part( 'template-parts/content', 'webinary');

							  } ?>

								    <nav class="pagination">
		     						<?php
		     							$big = 999999999;
									     echo paginate_links( array(
									          'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
									          'format' => '?paged=%#%',
									          'current' => max( 1, get_query_var('paged') ),
									          'total' => $events->max_num_pages,
									          'prev_text' => '&laquo;',
									          'next_text' => '&raquo;'
									     ) ); ?>
								</nav>  

								<?php }  ?>
					
				</main>
				<aside class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">	

					<?php mws_news(3); ?>
					<?php mws_popular_articles(3); ?>					
					<?php mws_inspirations(3);?>
						
				</aside>
				
			</div>
		</section>
	</div>
</div>

<?php get_footer(); ?>