
									<!-- <div class="apply">
										<div class="btn-group" role="group" align="center">
											<button type="button" class="btn btn-warning btn-lg btn-block btn-ads" data-toggle="collapse" data-target="#exampleModal"><i class="glyphicon glyphicon-send"></i> KIRIM LAMARAN</button>
										</div>
										<?php
										if ( current_user_can( 'manage_options' ) && count($comments) > 0 ) {	?>
										<div id="rekapCommentsPage" class="pull-right">			
											<form id="rekapComments" method="post">
												<input type="hidden" name="comment_post_ID" value="<?php echo $post->ID;?>">
												<input type="hidden" name="redirect2" value="<?php bloginfo('template_url'); ?>/rekap_comments.php" id="redirect2">
												<button type="submit" name="SendRekap" class="btn btn-info btn-lg">KIRIM REKAP LAMARAN</button>
											</form>
										</div>					
										<?php } ?>
									</div> -->
										
									<div class="clearfix">
										<div style="margin-top:10px;" id="feedback"></div>
									</div>
									
									<?php
									$post_id = get_the_ID();
									$compny = get_post_meta($post_id, 'company', true);
									?>
									
									<div id="exampleModal" class="collapse card mb-3">
										<form id="apply_form" method="post" enctype="multipart/form-data">
											<!-- <hr> -->
											<div class="card-header">
												<h4>KIRIM LAMARAN KE <?=strtoupper($compny);?></h4>
											</div>
											<div class="card-body">
												<div class="row">
													<div class="col-md-6 form-group">
														<label class="control-label">Nama Lengkap <small style="display:inline">* wajib</small></label>
														<input type="text" class="form-control" name="author" required="required">
													</div>
													<div class="col-md-6 form-group">
														<label class="control-label">No Handphone <small style="display:inline">* wajib</small></label>
														<input type="text" class="form-control" name="apply_mobile" required="required">
													</div>
												</div>
												<div class="row">
													<div class="col-md-6 form-group">
														<label class="control-label">Email <small style="display:inline">* wajib</small></label>
														<input type="email" class="form-control" name="email" required="required">
													</div>
													<div class="col-md-6 form-group">
														<label class="control-label">Pilih Kota <small style="display:inline">* wajib</small></label>
														<input type="text" class="form-control" name="apply_city" required="required">
													</div>
												</div>
												<div class="row">			
													<div class="col-md-4 form-group">
														<label class="control-label">Tahun Lahir</label>
														<select class="form-control" name="apply_ydate" required="required">
															<option value="">Pilih Tahun</option>
															<?php
															$year = date('Y');
															for($y=($year-15); $y>($year-45); $y--) {
																echo '<option value="'.$y.'">'.$y.'</option>';
															}
															?>
														</select>
													</div>
													<div class="col-md-4 form-group">
														<label class="control-label">Kelamin</label>
														<select class="form-control" name="apply_gender" required="required">
															<option value="">Pilih Kelamin</option>
															<option value="Pria">Pria</option>
															<option value="Wanita">Wanita</option>
														</select>
													</div>
													<div class="col-md-4 form-group">
														<label class="control-label">Pendidikan Terakhir</label>
														<select class="form-control" name="apply_edu" required="required">
															<option value="">Pilih Pendidikan</option>
															<option value="SMP">SMP</option>
															<option value="SMA">SMA</option>
															<option value="SMA">SMK</option>
															<option value="STM">STM</option>
															<option value="D1">D1</option>
															<option value="D2">D2</option>
															<option value="D3">D3</option>
															<option value="S1">S1</option>
															<option value="S2">S2</option>
														</select>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12 form-group">
														<label>Resume <small style="display:inline">* wajib</small></label>
														<input type="file" id="file" name="apply_File">
														<p class="help-block">Hanya file pdf, doc, docx. Tidak lebih besar 1 Mb.</p>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12 form-group">
														<label>Posisi <small style="display:inline">* wajib</small></label>
														<input type="text" class="form-control" name="posisi">
														<p class="help-block"></p>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12 form-group">
														<label class="control-label">Perkenalkan Diri Anda, Kenapa Perusahaan harus menerima Anda, Apa kelebihan dan kekurangan Anda, Apa motivasi Anda melamar kerja di Perusahaan <?=$compny;?>!<small style="display:inline">* wajib</small></label>
														<textarea class="form-control" name="comment" cols="45" rows="4" aria-required="true" required="required"></textarea>
													</div>
												</div>
												<input type="hidden" name="comment_post_ID" value="<?=$post_id;?>">
												<input type="hidden" name="redirect" value="<?php bloginfo('template_url'); ?>/apply_form.php" id="redirect">
												<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-send"></i> KIRIM LAMARAN</button>
											</div>
										</form>
									</div>
									