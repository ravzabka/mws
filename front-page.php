<?php get_header(); ?>

<section class="alert-box">

	<div class="container">

		<div class="alert-box__container">
			<div class="row">
				<div class="col-md-2">
					<div class="alert-box__red-label">Ważne</div>
				</div>
				<div class="col-md-10">	
					<?php mws_news_list(4); ?>
					
				</div>
			</div>
		</div>

	</div>
</section>

<section class="slider">

	<div class="container">	
		<div class="row">			
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-lg-4 col-xl-8 mb-4 mb-sm-4 mb-md-5">
				<?php add_revslider('exploration-header'); ?>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-4">
				<div class="row">		
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-12">
					<?php mws_advertisement(4); ?>
					</div>
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-12">
						<?php sliderItem('inspiracja','inspiracje', 1); ?> 
					
					</div>
				</div>

			</div>
	</div>
	</div>
</section>



<section class="our-events container">
	<div class="row">
		<!-- Sekcja nasze akcje -->
		<div class="our-events__col col-xs-12 col-sm-12 col-md-6 col-lg-6">

			<h3 class="title__section"><?php the_field('section_title'); ?></h3>			
			<div class="our-events__container">

					<?php 
					   // the query
					   $post1 = get_field('post_number_1');
					   $post2 = get_field('post_number_2');
					   $post3 = get_field('post_number_3');
					   $post4 = get_field('post_number_4');

					   $myarray = array($post1 ,$post2,$post3);
					   $the_query = new WP_Query( array(

					   	  'post_type'		=>	'any',
					      'post__in'       =>  $myarray,
					      'posts_per_page' => 4
					     
					   )); 
					?>

					<?php if ( $the_query->have_posts() ) : ?>
  					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

  						<div class="our-events__box">
  							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('post-thumbnail',['class' => 'our-events__image']);?> 
							</a>
  							<div class="our-events__box-content">
								<h4 class="our-events__box-title">
						
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>									
									</a>				

								</h4>
								<p class="our-events__desc"><?php the_field('action_subtitle'); ?></p>
							</div>
						</div>


  					<?php endwhile; ?>
									
					<?php endif; ?>	
					<?php wp_reset_postdata(); ?>	
			</div>
		</div>
		

		<!-- Sekcja gazetka multimedialna -->
		<div class="our-events__col col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<h3 class="title__section"><?php the_field('gm_section_title'); ?></h3>			
				
			<div class="our-events__newspaper">
				<?php $gm_image = get_field('gm_image');
				if( !empty( $gm_image ) ): ?>
    					<img src="<?php echo esc_url($gm_image['url']); ?>" alt="<?php echo esc_attr($gm_image['alt']); ?>" class="our-events__newspaper-image"/>
					<?php endif; ?>	
						
			</div>
			<div class="our-events__download-box">

				<p class="our-events__date-info">

					<?php the_field('gm_title'); ?><br>
					<?php the_field('gm_date'); ?>
				</p>					
						
				<a href="<?php echo site_url('/gazetka'); ?>" class="btn btn--red" target="_blank">pobierz</a>    					
						
					
			</div>			
		</div>		
		<!-- / koniec sekcji gazetka multimedialna -->

	</div>

</section>

<section class="container">
	<?php get_template_part( 'template-parts/content', 'newsletter');	?>

</section>

<section class="info container">
	<span class="info__info"><img src="<?php bloginfo('template_directory'); ?>/img/pics/info.jpg" alt="Info"></span>
	<div class="row">
		<div class="col-lg-12">
			<?php 
				$link = get_field('reklama_link');
				if( $link ): ?>
						<a href="<?php echo esc_url( $link ); ?>" target="_blank">		
    		
				<?php endif; ?>
			

     			<picture>
     				<?php $image_small = get_field('reklama_obrazek_small');
					if( !empty( $image_small ) ): ?>    					
    				<source media="(max-width: 450px)" srcset="<?php echo esc_url($image_small['url']); ?>">
					<?php endif; ?>

					<?php $image_medium = get_field('reklama_obrazek_medium');
					if( !empty( $image_medium ) ): ?> 
					<source media="(min-width: 451px) and (max-width: 639px)" srcset="<?php echo esc_url($image_medium['url']); ?>">
					<?php endif; ?>  

					<?php $image_intermediate = get_field('reklama_obrazek_intermediate');
					if( !empty( $image_intermediate ) ): ?> 
					<source media="(min-width: 640px) and (max-width: 800px)" srcset="<?php echo esc_url($image_intermediate['url']); ?>">
					<?php endif; ?>  

					<?php $image_large = get_field('reklama_obrazek_large');
					if( !empty( $image_large ) ): ?>
					<source media="(min-width: 801px)" srcset="<?php echo esc_url($image_large['url']); ?>">
					<?php endif; ?>

					<img src="<?php echo esc_url($image_large['url']); ?>" alt="Avtek">
					
				</picture>
			</a>
		</div>
	</div>
</section>


<section class="space">		
	<div class="container">	
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 order-lg-2 col-xl-3 order-xl-1">				
				<?php mws_popular_articles(4); ?>
				<?php mws_training_events(3); ?>
							
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 order-lg-12 col-xl-6 order-xl-2">
				<?php mws_kalendarium(4); ?>
				
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 order-lg-1 col-xl-3 order-xl-12 text-center">	

				<style>
					.fb-page,
					.fb-page span,
					.fb-page span iframe[style] {
					    max-width: 100% !important;
					}
				</style>		
				
				<div class="fb-page mb-4" data-href="https://www.facebook.com/portalMWS" data-tabs="timeline" data-adapt-container-width="true" data-width="500" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/portalMWS" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/portalMWS">Portal edukacyjny MWS</a></blockquote></div>
				<?php dynamic_sidebar( 'front-widget' ); ?>	
			</div> 	
		</div>
	</div>
</section>

<section class="articles">
	<div class="container">
		<h3 class="title__section">Opinie o naszym portalu</h3>		
		<div class="row">
			<div class="col-lg-12">
				<?php mws_opinie(); ?>	
				
			</div>
		</div>
	</div>	
</section>

<section class="articles">
	<div class="container">
		<h3 class="title__section">Ciekawe materiały</h3>		
		<div class="row">	
			<?php randomBox('inspiracja','inspiracje', 1); ?>
			<?php randomBox('narzedzia','narzędzia', 1); ?>
			<?php randomBox('artykul','artykuły', 1); ?>	
			<?php randomBox('poradniki','poradniki', 1); ?>	

		</div>
	</div>	
</section> 


<section class="articles">
	<div class="container">
		<h3 class="title__section">Nasze tematy</h3>		
		<div class="row">	
			<div class="col-lg-12">
				<div class="tags__container">
				<?php $tags = get_tags(array(
  					'hide_empty' => false
				));		

				foreach ($tags as $tag) { 
				$tag_link = get_tag_link( $tag->term_id ); ?>

				<span class="tags"><a href="<?php echo $tag_link;?>" title="<?php echo $tag->name; ?>"><?php echo $tag->name; ?></a></span>
				  
				<?php } ?>

			</div>

		</div>
	</div>
	
</section> 

<?php get_footer(); ?>


