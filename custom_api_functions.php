<?php

/*
 * CUSTOM WP-JSON API
 */

// Remove the API link from the HTML head
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );

// You can require authentication for all REST API requests by adding an is_user_logged_in check to the rest_authentication_errors filter.
/* add_filter( 'rest_authentication_errors', function( $result ) {
    if ( ! empty( $result ) ) {
        return $result;
    }
    if ( ! is_user_logged_in() ) {
        return new WP_Error( 'rest_not_logged_in', 'Only authenticated users can access the REST API.', array( 'status' => 401 ) );
    }
    return $result;
}); */

add_action( 'rest_api_init', 'slug_register_postmeta' );
function slug_register_postmeta() {
    register_rest_field( 'post', 'meta', array(
		'get_callback' => 'slug_get_company',
        'update_callback' => null,
        'schema' => null,
    ));
}

function slug_get_company( $object, $field_name, $request ) {

	if(get_post_meta( $object[ 'id' ], 'urbanhire_url', true )){
		return array(
			'city' => get_post_meta( $object[ 'id' ], 'city', true ),
			'company' => get_post_meta( $object[ 'id' ], 'company', true ),
			'exp' => get_post_meta( $object[ 'id' ], 'exp', true ),
			'pendidikan' => get_post_meta( $object[ 'id' ], 'pendidikan', true ),
			'salary' => get_post_meta( $object[ 'id' ], 'salary', true ),
			'tipejob' => get_post_meta( $object[ 'id' ], 'tipejob', true ),
			'urbanhire_url' => get_post_meta( $object[ 'id' ], 'urbanhire_url', true )
		);
		
	} else {
	    return array(
			'company' => get_post_meta( $object[ 'id' ], 'company', true ),
			'company_address' => get_post_meta( $object[ 'id' ], 'company_address', true ),
			'city' => get_post_meta( $object[ 'id' ], 'city', true ),
			'mailto' => get_post_meta( $object[ 'id' ], 'mailto', true )
		);
	}
}

// http://example.com/wp-json/myplugin/v1/author/(?P<id>\d+)
add_action( 'rest_api_init', function () {
	register_rest_route( 'wp/v2', '/posts_sticky', array(
		'methods' => WP_REST_Server::READABLE,
		'callback' => 'api_stickyposts',
		// 'permission_callback' => 'get_items_permissions_check',
		'show_in_index' => false,
	) );

	register_rest_route( 'wp/v2', '/posts_sticky_sidebar', array(
		'methods' => WP_REST_Server::READABLE,
		'callback' => 'api_stickyposts_sidebar',
		// 'permission_callback' => 'get_items_permissions_check',
		'show_in_index' => false,
	) );
	
	register_rest_route( 'wp/v2', '/posts_comments', array(
		'methods' => WP_REST_Server::READABLE,
		'callback' => 'api_comments',
		// 'permission_callback' => 'get_items_permissions_check',
		'show_in_index' => false,
	) );
	
	register_rest_route( 'wp/v2', '/login/', array(
		'methods'  => WP_REST_Server::READABLE,
		'callback' => 'api_login',
    ));
} );

function get_items_permissions_check( $request ) {
    // Here we are accessing the path variable 'id' from the $request.
	if ( isset( $request['token'] ) ) {
		return $request;
	} else {
        // Error handling.
        return new WP_Error( 'rest_not_found', esc_html__( 'Only authenticated users can access the REST API.', '' ), array( 'status' => 404 ) );
    }
}

function api_stickyposts(){
	/* $wp_request_headers = array(
	  'Authorization' => 'Basic ' . base64_encode( 'username:password' )
	); */

	$max = AC_STICKY_POSTS_COUNT;

	$options = get_option('tp_option');
	$posts = array();
	for($i= 1; $i<= $max; $i++) {
		if(!empty($options["id_".$i])) $posts[] = $options["id_".$i];
	}
	
	/*$args = array(
		'post__in' => $sticky_posts, //get_option( 'sticky_posts' ),
		'orderby' => 'date',
    	// 'order' => 'ASC',
		'posts_per_page' => -1
	);
	
	$query = new WP_Query( $args );
	echo "Last SQL-Query: {$query->request}"; die();	
	$posts = $query->get_posts();
	// echo json_encode($posts); die();*/
	
	$output = array();
	foreach( $posts as $p ) {		
		$post= get_post($p);
		$output[] = array( 
			'id' => $post->ID,
			'date' => get_the_time('Y-m-d H:i:s', $post->ID),
			'date_gmt' => get_the_time('Y-m-d H:i:s', $post->ID),
			'slug' => $post->post_name,
			'title' => $post->post_title,
			'link' => get_permalink($post->ID),
			'meta' => array(
				'company' => get_post_meta( $post->ID, 'company', true ),
				'company_address' => get_post_meta( $post->ID, 'company_address', true ),
				'city' => get_post_meta( $post->ID, 'city', true ),
				'mailto' => get_post_meta( $post->ID, 'mailto', true ),
				'expired_date' => get_post_meta( $post->ID, 'expired_date', true )
			)
		);
	}
	wp_reset_query();
	
	return $output;
}

function api_stickyposts_sidebar(){
	/* $wp_request_headers = array(
	  'Authorization' => 'Basic ' . base64_encode( 'username:password' )
	); */

	$max = 9; //AC_STICKY_POSTS_COUNT;

	$options = get_option('tp_option');
	$posts = array();
	for($i= 1; $i<= $max; $i++) {
		if(!empty($options["id_".$i])) $posts[] = $options["id_".$i];
	}
	
	/*$args = array(
		'post__in' => $sticky_posts, //get_option( 'sticky_posts' ),
		'orderby' => 'date',
    	// 'order' => 'ASC',
		'posts_per_page' => -1
	);
	
	$query = new WP_Query( $args );
	echo "Last SQL-Query: {$query->request}"; die();	
	$posts = $query->get_posts();
	// echo json_encode($posts); die();*/
	
	$output = array();
	foreach( $posts as $p ) {		
		$post= get_post($p);
		$output[] = array( 
			'id' => $post->ID,
			'date' => get_the_time('Y-m-d H:i:s', $post->ID),
			'date_gmt' => get_the_time('Y-m-d H:i:s', $post->ID),
			'slug' => $post->post_name,
			'title' => $post->post_title,
			'link' => get_permalink($post->ID),
			'meta' => array(
				'company' => get_post_meta( $post->ID, 'company', true ),
				'company_address' => get_post_meta( $post->ID, 'company_address', true ),
				'city' => get_post_meta( $post->ID, 'city', true ),
				'mailto' => get_post_meta( $post->ID, 'mailto', true ),
				'expired_date' => get_post_meta( $post->ID, 'expired_date', true )
			)
		);
	}
	wp_reset_query();
	
	return $output;
}

/*
 * http://localhost:8080/wp/wp-json/wp/v2/posts_comments/?post_id=112466
 * paramater: post_id
 */
 
function api_comments($request){
	$post_id = $request["post_id"];
	$comments = get_comments('post_id='.$post_id.'&meta_key=apply_doc');
	
	$output = array();
	foreach($comments as $comment) {
		$output[] = $comment;
	}
	
	return $output;
}

/*
 * http://localhost:8080/wp/wp-json/wp/v2/login?username=xxxx&password=xxxx
 */
 
function api_login($request){
    $creds = array();
    $creds['user_login'] = $request["username"];
    $creds['user_password'] =  $request["password"];
    $creds['remember'] = true;
    $user = wp_signon( $creds, false );

    if ( is_wp_error($user) )
      echo $user->get_error_message();

    return $user;
}