<?php 

function mws_news_list($post_number = 4){ ?>	
	<p class="alert-box__desc">	

		<?php 
					 
			$the_query = new WP_Query( array(

				'post_type'		=>	'important',					      
				'posts_per_page' => $post_number
					     
		 )); 
		?>

		<?php if ( $the_query->have_posts() ) : ?>
  		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<?php $link = get_field('info_url'); ?>
			<a href="<?php echo esc_url( $link ); ?>" target="_blank" class="alert-box__link color--white"><?php echo the_title();?></a>	

  		<?php endwhile; ?>									
		<?php endif; ?>	
		<?php wp_reset_postdata(); ?>
	</p>


<?php }  

function mws_opinie(){ ?>	
	<div class="opinie">
	<?php
		// Check rows exists.
		if( have_rows('opinie') ):

		    // Loop through rows.
		    while( have_rows('opinie') ) : the_row();

		        // Load sub field value.
		        $opinie_value = get_sub_field('opinia_field');
		        $opinie_author = get_sub_field('opinia_author'); ?>
		        <blockquote class="blockquote text-center">  
   					<p>"<?php echo $opinie_value; ?>"</p>
					<footer class="blockquote-footer"><cite ><?php echo $opinie_author ; ?></cite></footer>
				</blockquote>
			<?php 
		    // End loop.
		    endwhile;

		// No value.
		else :
		    // Do something...
		endif; ?>
	</div>


<?php }  

function mws_advertisement($post_number = 4){ ?>
	<style type="text/css">
		.slick-slide, .slick-slide *{ outline: none !important; }
	</style>

	<div class="slider__box">
		<?php $the_query = new WP_Query( array(

			'post_type'		=>	'reklama',					      
			'posts_per_page' => $post_number
						     
			)); 
		?>	
		<?php if ( $the_query->have_posts() ) : ?>
	  	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			
			<?php $reklama_link = get_field('reklama_link');?>								
			
			<a href="<?php echo esc_url($reklama_link); ?>" target="_blank" class="slider__image-link">
				<?php the_post_thumbnail('post-thumbnail',['class' => 'articles__image']);?>
			</a>			
							
			

		<?php endwhile; ?>									
		<?php endif; ?>	

		<?php wp_reset_postdata(); ?>
	</div>
<?php }  ?>


