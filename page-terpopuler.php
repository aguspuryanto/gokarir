<?php 
/* Template Name: Post Terpopuler */

get_header(); ?>

        <!-- Page Content  -->
        <!-- <div id="content" ng-view> </div> -->
        <div id="content">
	        <div class="container" ng-controller="home">
	        
	            <!--Section: Articles-->
	            <section>
	                
	                <!--Grid row-->
	                <div class="row wow fadeIn">
						<div class="col-md-12">
							<?php get_template_part( 'views/pulsa' ); ?>
						</div>
					</div>
					
	                <div class="row wow fadeIn">
	                    <!--Grid column-->
	                    <div class="col-md-8 col-12">	                        
	                        <div class="card bg-light">
								<div class="card-header">
									<h1 class="h2 my-4">Lowongan Kerja Terbaru</h1>
								</div>
								<ul class="list-group list-group-flush">
								<?php
								$do_not_duplicate = get_option('sticky_posts');
								$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
								
								$args = array( 'posts_per_page'=> 25, 'paged' => $paged, 'orderby' => 'post_date', 'order' => 'DESC', 'exclude' => $do_not_duplicate, 'post_type' => array('post','projectscoid') );
										
								$query = get_posts($args);                          
								foreach ( $query as $post ) :
									setup_postdata( $post ); ?>
									
									<li itemscope="<?=$i;?>" itemtype="http://schema.org/JobPosting" class="list-group-item">
										<h4 class="mb-3 text-dark">
											<a href="<?=get_permalink($post->ID);?>"><strong><?=$post->post_title;?></strong></a>
										</h4>
										<p><?=get_post_meta( $post->ID, "company", true);?> <span class="text-right" style="float:right;"><?=get_the_time('d/m/Y', $post->ID);?></span></p>
									</li>
									
									<?php
									endforeach;
								wp_reset_postdata();
								?>
								</ul>
	                        </div>

							<!--Pagination -->
							<nav class="d-flex justify-content-center my-4 wow fadeIn">
								<ul class="pagination pagination-circle pg-info mb-0">
									<?php page_navi(); ?>
								</ul>
							</nav>
	                    </div>
	                    <!--Grid column-->
	                    
	                    <?php get_sidebar(); ?>
	                </div>
	                <!--Grid row-->

	            </section>
	            <!--Section: Articles-->

	        </div>
        </div>
		
<?php get_footer(); ?>