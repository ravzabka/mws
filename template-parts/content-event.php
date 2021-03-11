	<article id="post-<?php the_ID(); ?>" <?php post_class("post__item row"); ?>>

						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
									<div class="events-page__date">	
										<?php 
												// Load field value.
										$unixtimestamp = strtotime(get_field('event_date')); ?>	
										<span class="date__day"><?php echo date_i18n("d", $unixtimestamp ); ?></span>
										<span class="date__month"><?php echo date_i18n("F", $unixtimestamp ); ?></span>
										<span class="events-page__place"><?php the_field('event_city'); ?></span>			
									</div>		
								</div>

								<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 mb-3">
									
									<?php the_post_thumbnail('post-thumbnail',['class' => 'news-page__image']);?>
								</div>
									
							</div>
						</div>

						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
							<div class="events-page__item-content">		
								<div class="metabox">
									<span class="category-tag category-tag--green">szkolnictwo</span>
													
								</div>			
								<h2 class="post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								
								<p><?php echo wp_trim_words( get_the_content(), 20 ); ?></p>
								<a href="<?php the_permalink(); ?>" class="link">czytaj więcej...</a>
							</div>
						</div>				

					</article>