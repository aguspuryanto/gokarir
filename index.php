<?php get_header(); ?>

        <!-- Page Content  -->
        <!-- <div id="content" ng-view> </div> -->
        <div id="content">
	        <div class="container" ng-controller="home">
	        
	            <!--Section: Articles-->
	            <section>
	                
	                <!--Grid row-->
	                <div class="row wow fadeIn">
						<div class="col-md-12">
							<?php //get_template_part( 'views/pulsa' ); ?>
						</div>
					</div>
					
	                <div class="row wow fadeIn">
	                    <!--Grid column-->
	                    <div class="col-md-8 col-12">
	                        <div class="card bg-primary mb-3">
								<div class="card-header">
									<h2 class="text-white">Lowongan Premium</h1>
								</div>
								<ul class="list-group list-group-flush">

								<li itemscope="{{$index+1}}" itemtype="http://schema.org/JobPosting" class="list-group-item bg-warning" ng-repeat="post in posts">
									<div class="row">
										<div class="col-md-2 col-3 text-center">
											<h1 class="mt-4 text-dark">{{$index+1}}.</h1>
										</div>
										<div class="col-md-10 col-9">
											<a href="{{post.link}}"><h4 class="mb-3 text-dark" ng-bind-html="post.title"></h4></a>
											<p class="text-white">{{post.meta.company}} <span class="text-right" style="float:right;"> {{post.date | date:'shortDate'}}</span></p>
										</div>
									</div>

								</li>

								<?php
								/*$args = array('post__in' => get_option( 'sticky_posts' ), 'orderby' => 'ID', 'order' => 'DESC', 'posts_per_page' => -1);
								$my_query = new WP_Query( $args );                      
								$i=1;
								while ( $my_query->have_posts() ) :  $my_query->the_post(); 
								$do_not_duplicate = $post->ID; ?>
								
								<li itemscope="<?=$i;?>" itemtype="http://schema.org/JobPosting" class="list-group-item bg-warning"><div class="row">
									<div class="col-md-2 col-3 text-center">
										<h1 class="mt-4 text-dark"><?=$i;?>.</h1>
									</div>
									<div class="col-md-10 col-9">
									<h4 class="mb-3 text-dark">
										<a href="<?=get_permalink($post->ID);?>"><?=$post->post_title;?></a>
									</h4>
									<p class="text-white"><?=get_post_meta( $post->ID, "company", true);?> <span class="text-right" style="float:right;"><?=get_the_time('d/m/Y', $post->ID);?></span></p>
									</div>
								</div></li>
								
								<?php
									$i++;
								endwhile;
								wp_reset_query();*/
								?>
								</ul>
	                        </div>
	                        
	                        <div class="card bg-light">
								<div class="card-header">
									<h1 class="h2 my-4">Lowongan Kerja Terbaru</h1>
								</div>
								<ul class="list-group list-group-flush">
									
									<li itemscope="<?=$i;?>" itemtype="http://schema.org/JobPosting" class="list-group-item" ng-repeat="lp in latest_posts">
										<a href="{{lp.link}}"><h4 class="mb-3 text-dark" ng-bind-html="lp.title.rendered"></h4></a>
										<p>{{lp.meta.company}} <span class="text-right" style="float:right;">{{lp.date | date:'shortDate'}}</span></p>
									</li>

								<?php
								/*$do_not_duplicate = get_option('sticky_posts');
								$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
								
								$args = array( 'posts_per_page'=> 10, 'paged' => $paged, 'orderby' => 'post_date', 'order' => 'DESC', 'exclude' => $do_not_duplicate, 'post_type' => array('post') );
										
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
								wp_reset_postdata();*/
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