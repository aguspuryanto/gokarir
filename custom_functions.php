<?php
/*	
 * Date Function 
 * http://abetobing.com/blog/function-indonesian-date-untuk-menampilkan-tanggal-dalam-format-indonesia-49.html
 */

function indonesian_date ($timestamp = '', $date_format = 'l, j F Y', $suffix = '') {
    if (trim ($timestamp) == '')
    {
        $timestamp = time ();
    }
    elseif (!ctype_digit ($timestamp))
    {
        $timestamp = strtotime ($timestamp);
    }
    # remove S (st,nd,rd,th) there are no such things in indonesia :p
    $date_format = preg_replace ("/S/", "", $date_format);
    $pattern = array (
        '/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
        '/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
        '/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
        '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
        '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
        '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
        '/April/','/June/','/July/','/August/','/September/','/October/',
        '/November/','/December/',
    );
    $replace = array ( 'Sen','Sel','Rab','Kam','Jum','Sab','Min',
        'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
        'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
        'Januari','Februari','Maret','April','Juni','Juli','Agustus','September',
        'Oktober','November','Desember',
    );
    $date = date ($date_format, $timestamp);
    $date = preg_replace ($pattern, $replace, $date);
    //$date = "{$date} {$suffix}";
    $date = "{$date}";
    return $date;
}

function hargaPaket($i){
	$harga = array(1 => '250000',2 => '200000',3 => '175000',4 => '150000',5 => '130000',6 => '115000',7 => '100000',8 => '90000',9 => '80000',10 => 'CALL');
	foreach($harga as $k => $v){
		if($k==$i) if(is_numeric($v)) return toIDR($v); else return $v;
	}
}

function premium_booked($i, $arr){
	if(in_array($i,$arr)) return '<span class="label label-info">Booked</span >';
}

function getEdu(){	
	/*
		Pendidikan : D3 => 553, SMA => 2485, S1 => 2284, SMK => 2494, D1 => 547, STM => 2636
		Kota : DENPASAR - BALI => 22,BOJONEGORO => 30,GRESIK = >67,JAWA TIMUR => 77,JEMBER => 78,KEDIRI => 81,MADIUN => 92,MADURA => 93,MALANG => 96,MOJOKERTO => 102,PANDAAN => 110,SIDOARJO = > 144,SUMENEP => 152,SURABAYA => 154,PASURUAN => 111,MATARAM => 1464
	*/
	$args_edu = array(
		'orderby'      	=> 'count',
		'order'     	=> 'DESC',
		'include'     	=> '2485,547,553,2494,2284,2636',
		'taxonomy'  	=> 'category'
	);					
	
	$cat_edu = get_categories( $args_edu );
	return $cat_edu;	
}

function custom_search_query( $query ) {
	if ( !is_admin() && $query->is_main_query() ) {
		if ( $query->is_search ) {
			$meta_query_args = array(
				array(
					'key' => 'city',
					'value' => $query->query_vars['l'],
					'compare' => 'LIKE',
				),
			);
			$query->set('meta_query', $meta_query_args);
			$query->set('posts_per_page', '30');
			$query->set('orderby', 'date');
			$query->set('order', 'DESC');
			
			$today = getdate();
			//$query->set('year', $today["year"]);
			//$query->set('monthnum', $today["mon"]);
		};
	};
}
add_filter( 'pre_get_posts', 'custom_search_query');

function ordinal($cardinal, $mode=false) {
    /* http://www.internoetics.com/2014/02/25/add-st-nd-rd-th-to-a-number-with-php/ */
	
	$test_c = abs($cardinal) % 10; 
	$extension = ((abs($cardinal) %100 < 21 && abs($cardinal) %100 > 4) ? 'th' : (($test_c < 4) ? ($test_c < 3) ? ($test_c < 2) ? ($test_c < 1) ? 'th' : 'st' : 'nd' : 'rd' : 'th')); 
	if($mode==true) return $cardinal. '<small>' . $extension . '</small>'; else return $cardinal.$extension;
}

function toIDR($number){
	$number = (float)$number;
	return number_format($number,0,',','.');
}

add_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );
function wpdocs_set_html_mail_content_type() {
    return 'text/html';
}

function change_search_url_rewrite() {
    if ( is_search() && ! empty( $_GET['s'] ) ) {
        wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) );
        exit();
    }   
}
add_action( 'template_redirect', 'change_search_url_rewrite' );

function wpse8170_phpmailer_init(PHPMailer $mailer){
	$mailer->IsSMTP();
	$mailer->Host = "ssl://smtp.gmail.com"; // your SMTP server
	$mailer->Port = 465;
	$mailer->SMTPAuth = true; // Force it to use Username and Password to authenticate
	$mailer->Username = 'marketing@surabayajobfair.com';
	$mailer->Password = 'sekawanRayaa255';
  
	// Additional settings…
	$mailer->SMTPSecure = "ssl"; // Choose SSL or TLS, if necessary for your server
	$mailer->From = "marketing@surabayajobfair.com";
	$mailer->FromName = "SURABAYAJOBFAIR";
	$mailer->SMTPDebug = false; // write 0 if you don't want to see client/server communication in page
	$mailer->CharSet  = "utf-8";
}

add_action( 'phpmailer_init', 'wpse8170_phpmailer_init', 10, 1);

function wpse8170_filter_content($content){
	global $post;
	if ( get_post_type( $post->ID ) == 106689 ) {
		remove_filter( 'the_content', 'wpautop' );
		//remove_filter( 'the_excerpt', 'wpautop' );
		add_filter( 'the_content', 'km_remove_wpautop_line_breaks' );
		
		$content_post = get_post($post->ID);
		$content = $content_post->post_content;
		$content = apply_filters('the_content', $content);
		$content = strip_tags($content, '<p><br/>');
		return $content;
	}
}
// add_filter('wp', 'wpse8170_filter_content');

function km_remove_wpautop_line_breaks( $content ) {
	return wpautop( $content, false );
}

function remove_the_dashboard () {
	if (current_user_can('level_10')) {
		return;
	}else {
		global $menu, $submenu, $user_ID;
		$the_user = new WP_User($user_ID);
		reset($menu); $page = key($menu);
		while ((__('Dashboard') != $menu[$page][0]) && next($menu))
		$page = key($menu);
		if (__('Dashboard') == $menu[$page][0]) unset($menu[$page]);
		reset($menu); $page = key($menu);
		while (!$the_user->has_cap($menu[$page][1]) && next($menu))
		$page = key($menu);
		if (preg_match('#wp-admin/?(index.php)?$#',$_SERVER['REQUEST_URI']) && ('index.php' != $menu[$page][2]))
		wp_redirect(get_option('siteurl') . '/wp-admin/post-new.php');
	}
}

function remove_first_image ($content) {
	if (!is_page() && !is_feed() && !is_feed() && !is_home()) {
		$content = preg_replace("/<img[^>]+\>/i", "", $content, 1);
	}
	return $content;
}
add_filter('the_content', 'remove_first_image');

function my_search_query( $query ) {
	// not an admin page and is the main query
	if ( !is_admin() && $query->is_main_query() ) {
		if ( is_search() ) {
			$query->set( 'orderby', 'date' );
		}
	}
}
add_action( 'pre_get_posts', 'my_search_query' );

function remove_script_version( $src ){
	$parts = explode( '?ver', $src );
	return $parts[0];
}
add_filter( 'script_loader_src', 'remove_script_version', 15, 1 );
add_filter( 'style_loader_src', 'remove_script_version', 15, 1 );

/* function showdnsserver(){
	$dns = dns_get_record(preg_replace('/www\./i', '', $_SERVER['SERVER_NAME']), DNS_NS);
	echo '<!-- Name Server Records :';
	echo $dns[0]['target'].', '.$dns[1]['target'];
	echo '//-->
	';
}
add_action('wp_footer', 'showdnsserver'); */

/*
	http://wp-snippets.com/pagination-for-twitter-bootstrap/
*/
function page_navi($before = '', $after = '') {
	global $wpdb, $wp_query;
	$request = $wp_query->request;
	$posts_per_page = intval(get_query_var('posts_per_page'));
	$paged = intval(get_query_var('paged'));
	$numposts = $wp_query->found_posts;
	$max_page = $wp_query->max_num_pages;
	if ( $numposts <= $posts_per_page ) { return; }
	if(empty($paged) || $paged == 0) {
		$paged = 1;
	}
	$pages_to_show = 5;
	$pages_to_show_minus_1 = $pages_to_show-1;
	$half_page_start = floor($pages_to_show_minus_1/2);
	$half_page_end = ceil($pages_to_show_minus_1/2);
	$start_page = $paged - $half_page_start;
	if($start_page <= 0) {
		$start_page = 1;
	}
	$end_page = $paged + $half_page_end;
	if(($end_page - $start_page) != $pages_to_show_minus_1) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}
	if($end_page > $max_page) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = $max_page;
	}
	if($start_page <= 0) {
		$start_page = 1;
	}
		
	//echo $before.'<div class="pagination"><ul class="clearfix">'."";
	if ($paged > 1) {
		// $first_page_text = "<<";
		// echo '<li class="page-item prev"><a class="page-link" href="'.get_pagenum_link().'" title="First"><span class="glyphicon glyphicon-home"></span> </a></li>';
	}
		
	$prevposts = "<<"; //get_previous_posts_link('? Previous');
	if($prevposts) { 
		// echo '<li>' . $prevposts  . '</li>';
	} else { /*echo '<li class="disabled"><a href="#">? Previous</a></li>';*/ }
	
	for($i = $start_page; $i  <= $end_page; $i++) {
		if($i == $paged) {
			echo '<li class="page-item active"><a class="page-link" href="#">'.$i.'</a></li>';
		} else {
			echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
		}
	}
	//echo '<li class="">' . next_posts_link('Next ?') . '</li>';
	if ($end_page < $max_page) {
		//$last_page_text = ">>";
		echo '<li class="page-item next"><a class="page-link" href="'.get_pagenum_link($max_page).'" title="Last">' . $max_page . ' </a></li>';
	}
	//echo '</ul></div>'.$after."";
}

// Hooking up our function to theme setup
/* add_action( 'init', 'create_projectscoid' );
function create_projectscoid() {
	register_post_type( 'projectscoid', array(
		'labels' => array(
			'name' => __( 'Projects Affiliate' ),
			'singular_name' => __( 'Projects Affiliate' )
		),
		'public' => true,
        'has_archive' => true,              
        'rewrite' => array('slug' => "projectscoid", 'with_front' => TRUE),
        'supports' => array('title','editor','custom-fields')             
    ));
} */