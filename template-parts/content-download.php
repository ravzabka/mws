
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
 <article id="post-<?php the_ID(); ?>" class="download__container">
 	
		
				<?php $download_file = get_field('download_file');
					if( $download_file ): ?>

				<a href="<?php echo $download_file['url']; ?>"  target="_blank" class="download__btn">
					<img src="<?php bloginfo('template_directory'); ?>/img/icons/download.png"> 
					<!-- <ion-icon name="download-outline"></ion-icon> -->
					<h4 class="download__title"><?php the_title() ?></h4>
				</a>
				<?php endif; ?>					
		
	
</article>
</div>
