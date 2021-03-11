
<article id="post-<?php the_ID(); ?>" <?php post_class("col-lg-4 mb-5"); ?>>

		
	
		
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('post-thumbnail',['class' => 'articles__image']);?>	
			</a>		
		

		
			<div class="post__container">						
									
			
				<h2 class="post__title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>					
				<p class="post__excerpt"><?php echo wp_trim_words( get_the_content(), 12 ); ?></p>
				
			</div>
		
	
	
</article>
