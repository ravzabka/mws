<footer class="footer">
	<section>
		<div class="container">

			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">

				 	<div class="footer__col">
				 		
						 <a href="<?php echo home_url();?>" class="header__logo">
                     		<img src="<?php bloginfo('template_directory'); ?>/img/brandmarks/mws.svg" alt="MWS Logo">
                		</a>
						
						<p class="footer__desc">Portal edukacyjny MWS tworzy grono profesjonalistów, które od 2008 roku oferuje wiedzę płynącą z doświadczenia i wspiera nauczycieli w przygotowaniu uczniów do funkcjonowania w zinformatyzowanym społeczeństwie.</p>
					</div>        		
	    		</div>

		    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-2">
		    			<div class="footer__col">
							<h3 class="footer__title">Menu</h3>
							<nav class="foooter__nav">
								 <!-- menu -->
					            <?php 
					            	$args = array(
					                	'theme_location'    =>  'footer-menu',               
					                	'menu_id'           =>  'menu',
					                	'menu_class'        =>  'footer__nav-list'
					            	);

					            	wp_nav_menu($args);
					            
					            ?>  
								
							</nav>
						</div>    			
		    	</div>  

	    		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-2">
	    			<div class="footer__col">
						<h3 class="footer__title"><a href="<?php echo site_url().'/dopobrania'?>">Do pobrania</a></h3>
						<nav class="foooter__nav">
							<ul class="footer__nav-list">
								
						

						<?php 
					
						$terms = get_terms(

				    		array(
				        		'taxonomy'   => 'dopobrania',
				        		'hide_empty' => false,
				    			)
							);



							// Check if any term exists
							if ( !empty( $terms ) && is_array( $terms ) ) { ?>

								<?php  foreach ( $terms as $term ) { ?>		
								<li><a href="<?php echo esc_url( get_term_link( $term ) ) ?>"><?php echo $term->name; ?></a></li>	
																	   	
								 <?php } ?>		
							<?php } ?>

					        	</ul>
						</nav>
					</div>  
	    		</div>

	    		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
	    			<div class="footer__col">
	    				<a href="https://www.facebook.com/groups/sPokojNauczycielski" target="_blank">
                     		<img src="<?php bloginfo('template_directory'); ?>/img/pics/spokoj-nauczycielski-dolacz.png" alt="Spokój Nauczycielski">
                		</a>
					</div> 
	    		</div>			
			</div>
			
		</div>
	</section>	

	<section class="footer__second bg--black">
		
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<p class="footer__copyrights">&copy; Copyright <?php the_date('Y');?> MWS - Portal nowoczesnych nauczycieli</p>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							
					<nav class="footer__nav">
								
					    <?php 
					        $args = array(
					            'theme_location'    =>  'footer-info',               
					            'menu_id'           =>  'menu',
					            'menu_class'        =>  'footer__nav-row'
					        );

					        wp_nav_menu($args);
					            
					    ?>  
								
					</nav>	    			
	    		</div>
			</div>
		</div>

	</section>
</footer>

<?php wp_footer(); ?>

</body>
</html>