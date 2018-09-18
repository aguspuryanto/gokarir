<?php 
/* Template Name: Urbanhire Feed */

get_header(); ?>

        <!-- Page Content  -->
        <div id="content">
	        <div class="container">
	        
	            <!--Section: Articles-->
	            <?php //$post_id = get_the_ID($_GET['page_id']); ?>
	            <?php echo $_GET['page_id']; ?>
	            <section>
	                
	                <!--Grid row-->
	                <div class="row wow fadeIn">
						<div class="col-md-12">
							<script type="text/javascript">
								setTimeout(function () {
							        // window.location.href = "<?php get_post_meta($post_id, 'urbanhire_url', true); ?>";
							    }, 1500);
							</script>
						</div>
					</div>

	            </section>
	            <!--Section: Articles-->

	        </div>
        </div>
		
<?php get_footer(); ?>