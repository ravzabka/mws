<?php get_header(); ?>
<div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">

        <section class="page container">

            <div class="row">
                <main class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">

                    <?php

                        if ( have_posts() && strlen( trim(get_search_query()) ) != 0 ) : 
                        global $query_string;
                        $query_args = explode("&", $query_string);
                        $search_query = array();



                        foreach($query_args as $key => $string) {
                          $query_split = explode("=", $string);
                          $search_query[$query_split[0]] = urldecode($query_split[1]);
                        } // foreach

                        $the_query = new WP_Query($search_query);
                        if ( $the_query->have_posts() ) : 
                        ?>
                        <!-- the loop -->
                        <h2>Wyniki wyszukiwania dla hasła: <?php echo get_search_query();?></h2>

                         
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                           <?php get_template_part( 'template-parts/content', 'tag');   ?>
                        <?php endwhile; ?>
                       
                        <!-- end of the loop -->

                        <?php wp_reset_postdata(); ?>

                    <?php else : ?>
                        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                    <?php endif; ?>
                    <?php else : ?>

                        <p>Brak wyników wyszukiwania</p>
                    <?php endif; ?>


                </main> 
                <aside class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">
                    

                    <?php mws_news(3); ?>                   
                    <?php mws_training_events(3); ?>
                    <?php mws_popular_articles(3); ?>   
                    <?php mws_inspirations(3);?>        
            
                </aside>                
            </div>
        </section>  

    </div><!-- #content -->
</div><!-- #primary -->
        
    

<?php get_footer(); ?>