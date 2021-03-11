<article id="post-<?php the_ID(); ?>" <?php post_class("post__item"); ?>>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
			<a href="<?php the_permalink(); ?>" class="hover02">
				<?php the_post_thumbnail('post-thumbnail',['class' => 'news-page__image']);?>	
			</a>		
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
			<div class="post__container">						
									
				<div class="metabox">
					<span class="category-tag"><?php echo get_the_term_list(get_the_ID(), 'articlecategory', '', ', ', ''); ?></span>
					<span class="metabox__date"><?php $post_date = get_the_date( 'F j Y' ); echo $post_date; ?></span>
				</div>
				<h2 class="post__title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>					
				<p class="post__excerpt"><?php echo wp_trim_words( get_the_content(), 24 ); ?></p>
				
			</div>
		</div>
	</div>
</article>