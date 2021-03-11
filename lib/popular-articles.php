<?php 

function mws_popular_articles($post_number = 3){ ?>

	<div class="category">
		<h3 class="sidebar__title bg--blue">Artykuły</h3>
		<ul class="events__list">
			<?php 
					   // the query
				$the_query = new WP_Query( array(
				'post_type'       =>  'artykul',
				'posts_per_page' => $post_number
			)); 

			?>
			<?php if ( $the_query->have_posts() ) : ?>
  				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

  					<li class="events__item">
						<h4 class="events__title category--blue__link">
							<a href="<?php the_permalink(); ?>" class=""><?php the_title(); ?></a>
						
						<?php $writer = get_field('related_autor');	

						if( $writer ): ?>
							<?php foreach( $writer as $p ): // variable must NOT be called $post (IMPORTANT) ?>
							<div class="author__meta">
							<div class="author__meta-image">
								<?php echo get_the_post_thumbnail( $p->ID ); ?>
							</div>
							<div class="author__meta-profile">
								<p class="author__meta-name"><a href="<?php echo get_the_permalink( $p->ID ); ?>" class="popular-articles__link"><?php echo get_the_title( $p->ID ); ?></a></p>
											
								</div>
							</div>	
						</h4>   
							<?php endforeach; ?>	
						<?php endif; ?>								
						</li>

				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>						
			<?php endif; ?>						
		</ul>					
		
	</div>


<?php } 

function mws_inspirations($post_number = 3){ ?>

	<div class="category">
		<h3 class="sidebar__title bg--green">Inspiracje</h3>
		<ul class="events__list">
			<?php 
					   // the query
				$the_query = new WP_Query( array(
				'post_type'       =>  'inspiracja',
				'posts_per_page' => $post_number
			)); 

			?>
			<?php if ( $the_query->have_posts() ) : ?>
  				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

  					<li class="events__item">
						<h4 class="events__title category--green__link">
							<a href="<?php the_permalink(); ?>" class=""><?php the_title(); ?></a>
						
						<?php $writer = get_field('related_writer');	

						if( $writer ): ?>
							<?php foreach( $writer as $p ): // variable must NOT be called $post (IMPORTANT) ?>
							<div class="author__meta">
							<div class="author__meta-image">
								<?php echo get_the_post_thumbnail( $p->ID ); ?>
							</div>
							<div class="author__meta-profile">
								<p class="author__meta-name"><a href="<?php echo get_the_permalink( $p->ID ); ?>" class="popular-articles__link"><?php echo get_the_title( $p->ID ); ?></a></p>
											
								</div>
							</div>	
							</h4>   
							<?php endforeach; ?>	
						<?php endif; ?>								
						</li>

				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>						
			<?php endif; ?>						
		</ul>
	</div>


<?php } ?>

<?php 


function mws_training_events($post_number = 3){ ?>

	
				 
					<?php 
					   // the query

						$today = date('Ymd');

						$the_query = new WP_Query( array(
					    	'post_type'       	=>  'webinary',
					    	'posts_per_page' 	=> $post_number,
					    	'meta_key'  		=> 'event_date',
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
					?>

					<?php if ( $the_query->have_posts() ) : ?>
					<div class="category">
						<h3 class="sidebar__title bg--orange">Najbliższe wydarzenia</h3>
						<ul class="events__list">
  					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			
					<li class="events__item">	
						<?php 
							// Load field value.
							$unixtimestamp = strtotime(get_field('event_date')); ?>	
						<a href="<?php the_permalink(); ?>" class="category--orange__link">			
							<p class="events__place"><?php the_field('event_city'); ?></p>			
							<span class="metabox__date"><?php echo date_i18n("d F Y", $unixtimestamp ); ?></span>			
								
							<h4 class="events__title mt-2"><?php the_title(); ?></h4>
						</a>	
									
								
					</li>
					 <?php endwhile; ?>
					 </ul>					
			
				
				</div>
				<?php wp_reset_postdata(); ?>

					<?php endif; ?>	
				
<?php } ?>

<?php 


function mws_news($post_number = 3){ ?>

	<div class="category">
						<h3 class="sidebar__title bg--red">Aktualności</h3>
						<ul class="events__list">
							<?php 
							   // the query
							   $the_query = new WP_Query( array(
							      'post_type'       =>  'post',
							      'posts_per_page' => $post_number,
							   )); 
							?>
							<?php if ( $the_query->have_posts() ) : ?>
		  					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

							<li class="events__item"><a href="<?php the_permalink(); ?>" class="category__link"><h4 class="events__title"><?php the_title(); ?></h4></a></li>
							
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>						
							<?php endif; ?>	
						</ul>
					</div>		


<?php } 

function mws_kalendarium($post_number = 3){ ?>

	<h3 class="title__section">Kalendarium</h3>	
		<ul class="events__list">
			<?php 
						 // the query

				$today = date('Ymd');
				$the_query = new WP_Query( array(

					'post_type'       =>  'kalendarz',							
		    		'order'     => 'ASC',
					'posts_per_page' => $post_number,
					'meta_key'        =>  'kalendarz_data',
						'orderby'         =>  'meta_value_num',
						'order'           =>  'ASC',
						'meta_query'      =>  array(
							
							array(

							    'key' =>  'kalendarz_data',
							    'compare' =>  '>=',
							    'value'   =>  $today,
							    'type'    => 'numeric'
							)
		          		)
					)); ?>
			<?php if ( $the_query->have_posts() ) : ?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<li class="events__item">

						<?php 
														// Load field value.
						$unixtimestamp = strtotime(get_field('kalendarz_data')); ?>	
							<span class="metabox__date"><?php echo date_i18n("d F Y", $unixtimestamp ); ?></span>	
													


							<?php $date = get_field('kalendarz_data');
									$date2 = date("F j, Y", strtotime($date));?>		            		   

									<h4 class="events__title mt-2 mb-3"><?php the_title(); ?></h4>
									<?php the_content(); ?>
								</li>
											
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>						
						<?php endif; ?>	
					</ul>



<?php }



function randomBox($post_type = 'post', $tag_title = 'post', $post_number = 1){ 

	 // the query
	$the_query = new WP_Query( array(
	'post_type'       =>  $post_type,
	'posts_per_page' => $post_number,
	'orderby'		=>	'rand'
	 )); ?>
	<?php if ( $the_query->have_posts() ) : ?>
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
			<div class="articles__item">
				<a href="<?php echo site_url("/".$post_type); ?>"><span class="articles__category-tag category-tag category-tag--red"><?php echo $tag_title; ?></span></a>
				<a href="<?php the_permalink(); ?>" class="articles__image-link">
					<?php the_post_thumbnail( 'full', array('class'=>'articles__image') ); ?>					
				</a>
				<a href="<?php the_permalink();?>"><h3 class="articles__title"><?php the_title(); ?></h3></a>
			</div>
		</div>
	<?php  endwhile;?>
	<?php wp_reset_postdata(); ?>						
	<?php endif; ?>				
	<?php 
}




function sliderItem($post_type = 'post', $tag_title = 'post',$post_number = 1){ 
	 // the query
	$the_query = new WP_Query( array(
	'post_type'       =>  $post_type,
	'posts_per_page' => $post_number,
	'orderby'		=>	'rand'
	 )); ?>
	<?php if ( $the_query->have_posts() ) : ?>
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

		
	<div class="slider__item">
		<a href="<?php echo site_url("/".$post_type); ?>"><span class="slider__category-tag category-tag category-tag--red"><?php echo $tag_title; ?></span></a>
		<a href="<?php the_permalink();?>" class="slider__image-link">							
			<?php the_post_thumbnail( 'full', array('class'=>'slider__image') ); ?>	
		</a>
		
		<a href="<?php the_permalink(); ?>" class="slider__title">
			<h4 class=""><?php the_title(); ?></h4>
		</a>
		
		
							
							
						</div>
					<?php  endwhile;?>
	<?php wp_reset_postdata(); ?>						
	<?php endif; ?>		
<?php }

?>

