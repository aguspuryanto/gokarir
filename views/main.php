
            <div class="container">
        
            <!--Section: Articles-->
            <section>
                
                <!--Grid row-->
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
                                    <h4 class="mb-3 text-dark">
                                        <a href="{{post.ID}}">{{post.title}}</a>
                                    </h4>
                                    <p class="text-white">{{post.meta.company}} <span class="text-right" style="float:right;"> </span></p>
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
                        <?php
                        /*$do_not_duplicate = get_option('sticky_posts');
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        
                        $args = array( 'posts_per_page'=> 10, 'paged' => $paged, 'orderby' => 'post_date', 'order' => 'DESC', 'exclude' => $do_not_duplicate );
                                
                        $query = get_posts($args);                          
                        foreach ( $query as $post ) :
                        setup_postdata( $post ); ?>
                        
                        <li itemscope="<?=$i;?>" itemtype="http://schema.org/JobPosting" class="list-group-item">
                            <h4 class="mb-3 text-dark">
                                <strong><?=$post->post_title;?></strong>
                            </h4>
                            <p><?=get_post_meta( $post->ID, "company", true);?> <span class="text-right" style="float:right;"><?=get_the_time('d/m/Y', $post->ID);?></span></p>
                        </li>
                        
                        <?php
                            $i++;
                        endforeach;
                        wp_reset_postdata();*/
                        ?>
                        </ul>
                        </div>
                    </div>
                    <!--Grid column-->
                    
                    <?php //get_sidebar(); ?>
                </div>
                <!--Grid row-->

                <!--Pagination -->
                <nav class="d-flex justify-content-center my-4 wow fadeIn">
                    <ul class="pagination pagination-circle pg-info mb-0">

                        <!--First-->
                        <li class="page-item disabled">
                            <a class="page-link">First</a>
                        </li>

                        <!--Arrow left-->
                        <li class="page-item disabled">
                            <a class="page-link" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>

                        <!--Numbers-->
                        <li class="page-item active">
                            <a class="page-link">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link">4</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link">5</a>
                        </li>

                        <!--Arrow right-->
                        <li class="page-item">
                            <a class="page-link" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>

                        <!--Last-->
                        <li class="page-item">
                            <a class="page-link">Last</a>
                        </li>

                    </ul>
                </nav>

            </section>
            <!--Section: Articles-->

            </div>