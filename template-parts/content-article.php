<article id="post-<?php the_ID(); ?>" <?php post_class("post__item"); ?>>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
			<?php the_post_thumbnail('post-thumbnail',['class' => 'news-page__image']);?>			
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
			<div class="post__content">						
									
				<div class="metabox">
					<span class="category-tag category-tag--green"><?php echo get_the_term_list(get_the_ID(), 'articlecategory', '', ', ', ''); ?></span>
					<span class="metabox__date"><?php $post_date = get_the_date( 'F j Y' ); echo $post_date; ?></span>
				</div>
				<h2 class="post__title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>					
				<p><?php echo wp_trim_words( get_the_content(), 20 ); ?></p>
				<a href="<?php the_permalink(); ?>" class="link">czytaj więcej...</a>
			</div>
		</div>
	</div>
</article>