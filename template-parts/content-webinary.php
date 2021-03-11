<article id="post-<?php the_ID(); ?>" <?php post_class("post__item"); ?>>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('post-thumbnail',['class' => 'articles__image']);?>	
			</a>		
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
			<div class="post__container">
				<?php $unixtimestamp = strtotime(get_field('event_date')); ?>
				
				<h2 class="post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span> (</span><?php echo date_i18n("d F Y", $unixtimestamp ); ?>)</a></h2>					
				<p class="post__excerpt"><?php echo wp_trim_words( get_the_content(), 24 ); ?></p>				
				
			</div>
		</div>
	</div>
</article>