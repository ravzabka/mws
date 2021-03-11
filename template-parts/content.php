<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-12">
 <article id="post-<?php the_ID(); ?>" <?php post_class("post__item"); ?>>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-4">
			<div>
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('post-thumbnail',['class' => 'articles__image']);?>
			</a>
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
			<div class="post__container">
				
				<div class="metabox">

					<?php 
						global $post; 
						$postcat = get_the_category( $post->ID );
						$category_id = get_cat_ID( $postcat[0]->name );
						$category_link = get_category_link( $category_id );

						foreach( $postcat as $category ) {
 							echo '<span class="category-tag"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></span>';   

 						}

					?>
					
					<span class="metabox__date"><?php $post_date = get_the_date( 'F j Y' ); echo $post_date; ?></span>
				</div>
				<h2 class="post__title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>					
				<p class="post__excerpt"><?php echo wp_trim_words( get_the_content(), 24 ); ?></p>
				
			</div>
		</div>
	</div>
</article>
</div>
