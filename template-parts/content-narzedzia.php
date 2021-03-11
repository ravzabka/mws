<article id="post-<?php the_ID(); ?>" <?php post_class("col-xs-12 col-sm-12 col-md-12 col-lg-4"); ?>>
	<div class="">

		<div class="col-xs-12">

			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('post-thumbnail',['class' => 'articles__image']);?>	
			</a>	



		</div>

		<div class="col-xs-12 ">				
			<h2 class="post__title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>					
			<p class="post__excerpt"><?php echo wp_trim_words( get_the_content(), 12 ); ?></p>
		</div>
	</div>
</article>