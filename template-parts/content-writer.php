<div class="row">
	<div class="col-xs-12">

		<article id="post-<?php the_ID(); ?>" <?php post_class("post__item"); ?>>	
			
			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">						
				<?php the_post_thumbnail('post-thumbnail',['class' => 'author__list-image']);?>
			</div>


			<div class="col-xs-12 col-sm-9 col-md-9 col-lg-10">
				<div class="author__item-container">

					<h3 class="author__list-title mb-2"><?php the_title(); ?></h3>
						<span class="category-tag"><?php get_terms_name($post->ID,'specialization'); ?></span>
						<p class="author__list-desc"><?php echo wp_trim_words( get_the_content(), 20 ); ?></p>
										
					<div class="btn__container justify-right">
						<a href="<?php the_permalink(); ?>" class="link">zobacz więcej</a>		
					</div>			
				</div>			
			</div>
			
		</article>	
	</div>
</div>	