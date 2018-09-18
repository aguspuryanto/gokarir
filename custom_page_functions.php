<?php
// http://www.kvcodes.com/2014/01/how-to-create-pages-programmatically-and-add-custom-template-wordpress/

function kv_create_contact_page() {

	$page = get_pages(); 	
	$contact_page= array( 'slug' => 'contact', 'title' =>'KV Contact' );

	foreach ($pages as $page) { 
		$apage = $page->post_name; 
		switch ( $apage ){ 
			case 'contact' : $contact_found= '1'; break;			
			default: $no_page;			
		}		
	}

	if($contact_found != '1'){
		/* $page_id = wp_insert_post(array(
			'post_title' => $contact_page['title'],
			'post_type' =>'page',		
			'post_name' => $contact_page['slug'],
			'post_status' => 'publish',
			'post_excerpt' => 'User profile and author page details page ! '	
		));
		add_post_meta( $page_id, '_wp_page_template', 'pages/contact.php' ); */
		
		// https://clicknathan.com/web-design/automatically-create-pages-wordpress/
		
		/* $blog_page_title = 'Blog';
		$blog_page_content = 'This is blog page placeholder. Anything you enter here will not appear in the front end, except for search results pages.';
		$blog_page_check = get_page_by_title($blog_page_title);
		$blog_page = array(
			'post_type' => 'page',
			'post_title' => $blog_page_title,
			'post_content' => $blog_page_content,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' => 'blog'
		);
		if(!isset($blog_page_check->ID) && !the_slug_exists('blog')){
			$blog_page_id = wp_insert_post($blog_page);
		} */
	}
}

// add_action('admin_init', 'kv_create_contact_page');

function kv_create_urbanhire_page(){
        
    // https://clicknathan.com/web-design/automatically-create-pages-wordpress/        
    $blog_page_title = 'Urbanhire';
    $blog_page_check = get_page_by_title($blog_page_title);
    $blog_page = array(
        'post_type' => 'page',
        'post_title' => $blog_page_title,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'urbanhire'
    );

    if(!isset($blog_page_check->ID)){
        $page_id = wp_insert_post($blog_page);
        add_post_meta( $page_id, '_wp_page_template', 'page-jobq.php' );
    }   
}

add_action('admin_init', 'kv_create_urbanhire_page');

// add_filter( 'query_vars', 'register_query_var' ); 

// function register_query_var( $vars ) {
//     $vars[] = 'page_id';
//     return $vars;
// }
// add_rewrite_endpoint( 'page_id', EP_PAGES | EP_PERMALINK );

// add_filter('wp', 'urbanhire_page_filter_content');

// function urbanhire_page_filter_content($content){
//     global $post;
//     echo var_dump($post);
// }


/**
 * Attaches the specified template to the page identified by the specified name.
 *
 * @params    $page_name        The name of the page to attach the template.
 * @params    $template_path    The template's filename (assumes .php' is specified)
 *
 * @returns   -1 if the page does not exist; otherwise, the ID of the page.
 */
function attach_template_to_page( $page_name, $template_file_name ) {

    // Look for the page by the specified title. Set the ID to -1 if it doesn't exist.
    // Otherwise, set it to the page's ID.
    $page = get_page_by_title( $page_name, OBJECT, 'page' );
    $page_id = null == $page ? -1 : $page->ID;

    // Only attach the template if the page exists
    if( -1 != $page_id ) {
        update_post_meta( $page_id, '_wp_page_template', $template_file_name );
    } // end if

    return $page_id;

} // end attach_template_to_page

// attach_template_to_page( 'sitemap', 'template-sitemap.php' );


	// register_activation_hook( __FILE__, 'create_uploadr_page' );
    function create_uploadr_page() {
        $post_id = -1;
        // Setup custom vars
        $author_id = 1;
        $slug = 'event-photo-uploader';
        $title = 'Event Photo Uploader';

        // Check if page exists, if not create it
        if ( null == get_page_by_title( $title )) {
            $uploader_page = array(
				'comment_status' => 'closed',
                'ping_status' => 'closed',
                'post_author' => $author_id,
                'post_name' => $slug,
                'post_title' => $title,
                'post_status' => 'publish',
                'post_type' => 'page'
            );

            $post_id = wp_insert_post( $uploader_page );
            if ( !$post_id ) {
                    wp_die( 'Error creating template page' );
            } else {
                    update_post_meta( $post_id, '_wp_page_template', 'custom-uploadr.php' );
            }
        } // end check if

    }

    // add_action( 'template_include', 'uploadr_redirect' );
    function uploadr_redirect( $template ) {
        $plugindir = dirname( __FILE__ );
        if ( is_page_template( 'custom-uploadr.php' )) {
            $template = $plugindir . '/templates/custom-uploadr.php';
        }
        return $template;

    }