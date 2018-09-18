<?php get_header(); ?>

        <!-- Page Content  -->
        <div id="content">
			<div class="container">
		
            <!--Section: Articles-->
            <section class="">
                
				<!--Grid row-->
                <div class="row wow fadeIn">
                    <!--Grid column-->
					<div class="col-8">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="card mb-3">
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
							?>
							
							<div class="card-header">
								<h1 itemprop="title" class="h2 card-title"><?php echo $post->post_title; ?></h1>
								<!-- <h2 itemprop="title" class="hide"><?php echo $post->post_title; ?></h2> -->
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
								
								<p class="card-text float-right"> <?php edit_post_link( 'Edit', '<span><i class="glyphicon glyphicon-edit"></i> ', '</span>'); ?> </p>
							</div>
							
							<div class="card-body" style="padding:0px;">
								<table class="table table-bordered" style="margin-bottom:0px;">
									<tbody>
										<?php if($compny): ?>
										<tr>
											<td width="25%">Perusahaan</td>
											<td width="2%">:</td>
											<td><div itemscope="" itemtype="http://schema.org/Organization">
												<span itemprop="name"><strong><?=$compny;?></strong></span>
											</div></td>
										</tr>
										<tr>
											<td width="25%">Alamat</td>
											<td width="2%">:</td>
											<td><?=$company_address;?></td>
										</tr>
										<tr class="hidden-xs">
											<td width="25%">Penempatan</td>
											<td width="2%">:</td>
											<td>
												<span itemprop="jobLocation" itemscope="" itemtype="http://schema.org/Place">
													<span itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
														<span itemprop="addressLocality"><?php if($lokasi)echo $lokasi;else echo $city;?></span>
													</span>
												</span>
											</td>
										</tr>
										<tr>
											<td width="25%">Masa Iklan</td>
											<td width="2%">:</td>
											<td><span itemprop="datePosted"><?php echo indonesian_date(get_the_time('d F Y', $post->ID),'d F Y');?></span> s/d <?php echo indonesian_date(date("d F Y", strtotime(get_the_time('d F Y', $post->ID) . $expire)),'d F Y');?></td>
										</tr>
										<?php endif; ?>
										<tr class="hidden-xs">
											<td width="25%">Dilihat</td>
											<td width="2%">:</td>
											<td><?php echo number_format( get_post_meta($post->ID, 'post_views_count', true) );?> kali</td>
										</tr>
										<tr>
											<td width="25%">Jumlah Pelamar</td>
											<td width="2%">:</td>
											<td><?=count($comments); ?> Pelamar</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						
						<div class="card mb-3">
							<div class="card-body" itemscope itemtype="http://schema.org/JobPosting">
								<?php								
								// setPostViews( $post->ID );								
								$content = get_the_content();
								$content = preg_replace("/<img[^>]+\>/i", " ", $content);          
								$content = apply_filters('the_content', $content);
								$content = str_replace(']]>', ']]>', $content);
								?>
								
								<div itemprop="responsibilities"></div>
								<div itemprop="educationRequirements"></div>
								<div itemprop="experienceRequirements"></div>
								<div id="qualifications" itemprop="qualifications">
									<?php echo $content;?>
								</div>
							</div>
						</div>
						<?php
						endwhile; else :
							echo wpautop( 'Sorry, no posts were found' );
						endif;
						?>
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