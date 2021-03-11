<article id="post-<?php the_ID(); ?>" <?php post_class("post__item"); ?>>	
	<div class="row">
			
		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">						
				<?php the_post_thumbnail('post-thumbnail',['class' => 'author__list-image']);?>
		</div>


		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-10">
			<div class="post__container">

				<h3 class="post__title mb-2">
					<a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
						<!-- <span class="category-tag"><?php get_terms_name($post->ID,'specialization'); ?></span> -->
					<p class="post__excerpt"><?php echo wp_trim_words( get_the_content(), 20 ); ?></p>
										
						
			</div>			
		</div>
	</div>
			
</article>	
	