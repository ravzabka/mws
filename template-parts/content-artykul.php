<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-12">
	<article id="post-<?php the_ID(); ?>" <?php post_class("post__item"); ?>>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-4">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('post-thumbnail',['class' => 'articles__image']);?>	
				</a>		
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
				<div class="post__container">

				<div class="metabox">

						<span class="category-tag"><?php echo get_the_term_list(get_the_ID(), 'artykuly_kategorie', '', ', ', ''); ?></span>

						<span class="metabox__date"><?php $post_date = get_the_date( 'F j Y' ); echo $post_date; ?></span>
					</div>			
					
					<h2 class="post__title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>					
					<p class="post__excerpt"><?php echo wp_trim_words( get_the_content(), 24 ); ?></p>
					<?php 

						$relatedWriter = get_field('related_autor'); 
						if($relatedWriter){
							foreach ($relatedWriter as $writer) { ?>
																			
								<!-- <span class="post__author">autor:</span> -->
								<ion-icon name="brush-outline"></ion-icon>
								
								<span class="author__meta-name"><a href="<?php echo get_the_permalink($writer)?>" class="popular-articles__link"><?php echo get_the_title($writer)?></a></span>
											
							<?php } 
					} ?>
					
				</div>
			</div>
		</div>
	</article>
</div>