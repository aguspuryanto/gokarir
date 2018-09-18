
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php
				$compny = get_post_meta($post->ID, 'company', true);
				$company_address = get_post_meta( $post->ID, 'company_address', true); 
				$company_map = get_post_meta( $post->ID, 'company_map', true); 
				$lokasi = get_post_meta($post->ID, 'lokasi', true);
				$city = get_post_meta($post->ID, 'city', true);
				$mailto = get_post_meta($post->ID, 'mailto', true);
				$xdate = get_post_meta($post->ID, 'expired_date', true);
				if($xdate) $expire = "+".$xdate." day"; else  $expire = "+30 day";
				$comments = get_comments('post_id='.$post->ID.'&meta_key=apply_doc');
						
				$post_views_count = get_post_meta($post->ID, 'post_views_count', true);
				// var_dump($post_views_count);
				if($post_views_count===null || empty($post_views_count)) $post_views_count = 0;

				// if ( is_sticky() ) {
				?>

				<!--Grid row-->
                <div class="card d-none d-sm-block">
                	<!--Grid column-->
					<div class="row wow fadeIn">
						<div class="col-md-8 col-12">
							<img class="img-fluid" src="<?=get_template_directory_uri().'/src/243364659643_original.jpg';?>">
						</div>

						<div class="col-md-4 col-12 pt-2">
							<p class="d-inline-block">
								<i class="fa fa-clock"></i> <?php echo indonesian_date(get_the_time('d F Y', $post->ID),'d F Y');?>	
							</p>
							<h1 itemprop="title" class="h2 card-title"><?=$post->post_title; ?></h1>
							<p class="d-inline-block">
								<span typeof="Organization">
									<span itemprop="name">
										<i class="fa fa-building"></i> <?=$compny;?>
									</span>
								</span>
							</p>
							<p class="d-inline-block">
								<?php
								// Get the ID of a given category
								$category_id = get_cat_ID( $city );							 
								// Get the URL of this category
								$category_link = get_category_link( $category_id );
								?>
								<!-- Print a link to this category -->
								<span itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress"><span itemprop="addressLocality"><i class="fa fa-map-marker" aria-hidden="true"></i> <a href="<?php echo esc_url( $category_link ); ?>" title="<?=$city;?>" rel="tag"><?=$city;?></a></span></span>
							</p>
							<p class="d-block">
								<span typeof="Organization">
									<span itemprop="name">
										<i class="fa fa-map-signs"></i> <?=$company_address;?>
									</span>
								</span>
							</p>
						</div>
					</div>
				</div>

				<div class="card p-3 d-none d-sm-block" style="border-top: none;">
					<div class="row wow fadeIn">
						<div class="col-md-8 col-12">
							<ul class="list-inline float-left">
							  <li class="list-inline-item pt-3"><i class="fa fa-eye"></i> <?=number_format( $post_views_count );?> kali</li>
							  <li class="list-inline-item pt-3"><i class="fa fa-user"></i> <?=count($comments); ?> Pelamar</li>
							  <!-- <li class="list-inline-item"><i class="fa fa-star"></i> <?=count($comments); ?> </li> -->
							</ul>

							<!-- <ul class="list-inline float-right">
							  <li class="list-inline-item"><button type="button" class="btn btn-outline-dark btn-lg"> <i class="fa fa-bookmark"></i> Simpan</button></li>
							  <li class="list-inline-item"><button type="button" class="btn btn-outline-dark btn-lg"> <i class="fa fa-share-alt"></i> Bagikan</button> </li>
							</ul> -->
						</div>

						<div class="col-md-4 col-12">
							<button type="button" class="btn btn-success btn-lg btn-block">KIRIM LAMARAN</button>
						</div>
					</div>
				</div>

				<?php
				// } 
				// End if is_sticky
				
				endwhile; else :
					echo wpautop( 'Sorry, no posts were found' );
				endif;
				?>
				
				<div class="card p-3 mb-3 d-none d-sm-block" style="border-top: none;">
					<div class="row wow fadeIn">
						<div class="col-md-12 col-12">
							<?php echo implode_category($post->ID); ?>
						</div>
					</div>
				</div>