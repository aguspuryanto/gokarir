<?php get_header(); ?>

        <!-- Page Content  -->
        <div id="content">
			<div class="container" ng-controller="single">
		
            <!--Section: Articles-->
            <?php
			$post_id = get_the_ID();
            $compny = get_post_meta($post_id, 'company', true);
			$company_address = get_post_meta($post_id, 'company_address', true); 
			$company_map = get_post_meta($post_id, 'company_map', true); 
			$lokasi = get_post_meta($post_id, 'lokasi', true);
			$city = get_post_meta($post_id, 'city', true);
			$mailto = get_post_meta($post_id, 'mailto', true);
            $xdate = get_post_meta($post_id, 'expired_date', true);
			if($xdate) $expire = "+".$xdate." day"; else  $expire = "+30 day";

			$comments = get_comments('post_id='.$post_id.'&meta_key=apply_doc');
			$post_views_count = get_post_meta($post_id, 'post_views_count', true);
			// var_dump($post_views_count);
			if($post_views_count===null || empty($post_views_count)) $post_views_count = 0;
			?>

            <section ng-init="init('<?=$post_id;?>')" class="{{postId}}">
                
				<?php if ( is_sticky($post_id) ) {
					get_template_part('views/top_single', '');
				} ?>
                
				<!--Grid row-->
                <div class="row wow fadeIn">
                    <!--Grid column-->
					<div class="col-md-8 col-12">

						<div class="card mb-3">
							
							<?php if ( !is_sticky($post_id) ) { ?>
							<div class="card-header">
								<h1 itemprop="title" class="h2 card-title" ng-bind-html="posts.title.rendered"></h1>
								<p class="d-inline-block">
									<span typeof="Organization">
										<span itemprop="name">
											<i class="fa fa-building"></i> {{posts.meta.company}}
										</span>
									</span>
								</p>
								<p class="d-inline-block">
									<?php
									// $lokasi = $city = '{{posts.meta.city}}';
									// Get the ID of a given category
									$category_id = get_cat_ID( $city );					 
									// Get the URL of this category
									$category_link = get_category_link( $category_id );
									?>
									<!-- Print a link to this category -->
									<span itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress"><span itemprop="addressLocality"><i class="fa fa-map-marker" aria-hidden="true"></i> <a href="<?php echo esc_url( $category_link ); ?>" title="<?=$city;?>" rel="tag">{{posts.meta.city}}</a></span></span>
								</p>
								
								<p class="card-text float-right"> <?php edit_post_link( 'Edit', '<span><i class="glyphicon glyphicon-edit"></i> ', '</span>'); ?> </p>
							</div>
							<?php } ?>
							
							<div ng-if="!posts.meta.urbanhire_url" class="card-body" style="padding:0px;">
								<table class="table table-bordered" style="margin-bottom:0px;">
									<tbody>
										<?php if($compny): ?>
										<tr>
											<td width="25%">Perusahaan</td>
											<td width="2%">:</td>
											<td><div itemscope="" itemtype="http://schema.org/Organization">
												<span itemprop="name"><strong>{{posts.meta.company}}</strong></span>
											</div></td>
										</tr>
										<tr>
											<td width="25%">Alamat</td>
											<td width="2%">:</td>
											<td>{{posts.meta.company_address}}</td>
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
											<td><span itemprop="datePosted"><?php echo indonesian_date(get_the_time('d F Y', $post_id),'d F Y');?></span> s/d <?php echo indonesian_date(date("d F Y", strtotime(get_the_time('d F Y', $post_id) . $expire)),'d F Y');?></td>
										</tr>
										<?php endif; ?>
										<tr class="hidden-xs">
											<td width="25%">Dilihat</td>
											<td width="2%">:</td>
											<td><?=number_format( $post_views_count );?> kali</td>
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
								// setPostViews( $post_id );
								?>
								
								<div itemprop="responsibilities"></div>
								<div itemprop="educationRequirements"></div>
								<div itemprop="experienceRequirements"></div>
								<div id="qualifications" itemprop="qualifications" ng-bind-html="posts.content.rendered">
									
								</div>
							</div>
							<div ng-if="posts.meta.urbanhire_url" class="card-footer">
								<!-- <span class="d-block">{{posts.meta.urbanhire_url}}</span> -->
								<a rel="nofollow" target="_blank" href="{{posts.meta.urbanhire_url}}" class="btn btn-info btn-lg btn-block">KIRIM LAMARAN</a>
							</div>
							<div ng-if="posts.meta.mailto" class="card-footer">
								<!-- <span class="d-block">{{posts.meta.urbanhire_url}}</span> -->
								<button type="button" class="btn btn-warning btn-lg btn-ads" data-toggle="collapse" data-target="#exampleModal"> KIRIM LAMARAN</button>
								
								<?php
								if ( current_user_can( 'manage_options' ) && count($comments) > 0 ) {	?>
								<div id="rekapCommentsPage" class="float-right">			
									<form id="rekapComments" method="post">
										<input type="hidden" name="comment_post_ID" value="<?php echo $post->ID;?>">
										<input type="hidden" name="redirect2" value="<?php bloginfo('template_url'); ?>/rekap_comments.php" id="redirect2">
										<button type="submit" name="SendRekap" class="btn btn-info btn-lg">KIRIM REKAP LAMARAN</button>
									</form>
								</div>					
								<?php } ?>
							</div>
						</div>
						
						<?php 
						if($mailto!="" && $compny!=""){								
							if($post->ID!=100013){
								if(count_days($post->post_date) <=60 ):
									get_template_part('views/form_apply', '');
								endif; //end count_days									
							}
						}
						
						if(count($comments) > 0 && $mailto!="" && $post->ID!=100013){?>
							<div class="card">
								<div class="card-header">
									<h3 class="panel-title">Daftar Pelamar Online</h3>
								</div>
								<div class="card-body" style="padding:0px;margin:0px">
									<div class="table-responsive">
									<table class="table table-bordered" style="margin-bottom:0px">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama</th>
												<th>Kota</th>
												<th>Pend.</th>
												<th>Usia</th>
											</tr>
										</thead>
										<tbody>							
										<?php
										$n=1;
										foreach($comments as $comment) :
										//echo($comment->comment_author);
											echo '<tr id="comment-'.$comment->comment_ID.'">
												<td width="5%"> '.$n.'. </td>
												<td valign="top"> '.ucwords( $comment->comment_author ).' </td>
												<td> '.get_comment_meta( $comment->comment_ID, 'apply_city', true ).' </td>
												<td> '.get_comment_meta( $comment->comment_ID, 'apply_edu', true ).' </td>
												<td> '.get_age( get_comment_meta( $comment->comment_ID, 'apply_ydate', true ) ).' th</td>
											</tr>';								
											$n++;
										endforeach;
										?>
										</tbody>
									</table>
									</div>
								</div>
							</div>
						<?php }
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