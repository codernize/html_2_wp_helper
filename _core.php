<?php 
if (defined('ABSPATH')) { // if in WordPress, then don't run the code
	return true;
} // end if 


$traces = debug_backtrace();
define('DS', DIRECTORY_SEPARATOR) ;
if (isset($traces[0])) {
	$file_path = $traces[0]['file'];
	// file name
	$file_name = substr($file_path, strrpos($file_path, DS)+1);
	define('FILE', $file_name);
	// page name
	$page_name = substr($file_name, 0 , strrpos($file_name, '.')+1);
	$page_name = str_replace(
	                array(
	                      '-',
	                      '_',
	                      '.',
	                      ), 
	                array(
	                      ' ',
	                      ' ',
	                      ' ',
	                      ), 
	                $page_name);
	$page_name = ucfirst($page_name);
	define('PAGE_NAME', $page_name);

	$curPageURL = curPageURL();
	// find base link
	if (strpos($curPageURL, $file_name)) {
		$site_url = substr($curPageURL, 0 , strpos($curPageURL, $file_name));

		
	} else {
		$site_url = $curPageURL ;
	}
	if (substr($site_url, -1) == '/') {
		$site_url = substr($site_url, 0 , -1);
	}
	define('SITE_URL', $site_url);
	// folder name
	$folder_name = substr(SITE_URL, strpos(SITE_URL, 'localhost/')+10);
	$folder_name = str_replace('/', '&nbsp;&raquo;&nbsp;', strtoupper($folder_name));
	define('FOLDER', $folder_name);
	
	$this_url = dirname(__FILE__) ;
	define('ABSPATH', $this_url . DS) ;

}
global $page, $paged;
$page = 1 ;
$paged = 1 ;



function site_url() {
	return SITE_URL;
}

function wp_nav_menu($args = array()){
	if (!isset($args['theme_location'])) {
		$args['theme_location'] = 'primary';
	}
	ob_start();
	?>
	<?php switch ($args['theme_location']) {
		case 'footer':
			?>
			<div class="columns footer-menu">
				<ul class="no-bulets">
					<li><a href="#">Careers</a></li>        
					<li><a href="#">Capabilities</a></li>
				</ul>
			</div>
			<?php
			break;
		
		default:
			?>
			<ul class="right ">
				  <li class="current-menu-item"><a href="#">Home</a></li>
				  <li><a href="#">About</a></li>
				  <li><a href="#">FAQ</a></li>
				  <li><a href="#">Testimonials</a></li>
				  <li><a href="#">CONTACT</a></li>
				</ul>
			<?php
			break;
	} ?>		
	
	<?php
	$menu = ob_get_clean();
	if (isset($args['echo']) && $args['echo']) {
		echo $menu ; 
	} else {
		return $menu;
	}
}

function get_bloginfo($what = '',$another = '') {
	if ($what == 'name') {
		return PAGE_NAME;
		
	}
	if ($what == 'description') {
		return '';
	}
	return site_url();

}

function bloginfo($what = '') {
	
	echo get_bloginfo($what);
	
}

function get_header($what = null) {
	get_template_part('header',$what);
	// require_once 'header.php'; // deprecated
}
function get_footer($what = null) {
	get_template_part('header',$what);
	// require_once 'footer.php'; // deprecated
}


function curPageURL() {
	$pageURL = 'http';
	if (@$_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}

function wp_title($sep = '|',$echo=true, $poz = 'right') {
	$title = PAGE_NAME . '&nbsp;@&nbsp;' . FOLDER .' &raquo; ';
	if ($echo) {
		echo $title ;
	} else {
		return $title;
	}
}

function is_home() {
	return FILE == 'index.php' ? true : (FILE == 'front-page.php' ? true : false);
}
function is_front_page() {
	return FILE == 'index.php' ? true : (FILE == 'front-page.php' ? true : false);
}

function body_class(){
	$class = '';
	if (is_home()) {
		$class .= ' home';
	}
	$page = FILE ;
	$page = str_replace(array('-','_','.'), '-', $page);
	$class .= ' page-'.$page.'-php page-template-'.$page;
	echo 'class="'.$class.'"';
}

function is_page($what = false) {
	if (false == $what) {
		if (substr(FILE, 0 , 6) == 'single') {
			return false;
		} else {
			return true;
		}
	} else if (is_string($what)) {
		return FILE == 'page-'.$what.'.php';
	}
	// TODO: array
}

function is_singular($what = false)  {
	if (false == $what) {
		return strpos(FILE, 'single') !== false ; // if file is single(-[.*])?
	} else if ($what == 'page') {
		return is_page(); // single page
	} else if ($what == 'post') {
		return FILE == 'single.php'; // single post
	} else {
		return FILE == 'single-'.$what.'.php'; // single custom post type
	}
}

function wp_head(){
	?>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/app.css" />
	<?php
}


function wp_footer(){
	/*
	<script src="<?php bloginfo('template_url'); ?>/bower_components/what-input/dist/what-input.js"></script>
	
	 */
	?>
	<script src="<?php bloginfo('template_url'); ?>/bower_components/jquery/dist/jquery.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/bower_components/foundation-sites/dist/foundation.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/app.js"></script>
	<?php
}


function get_template_part( $slug, $name = null ) { 
	$templates = array();
	$name = (string) $name;
	if ( '' !== $name )
		$templates[] = "{$slug}-{$name}.php";

	$templates[] = "{$slug}.php";

	locate_template($templates, true, false);
}

function locate_template($template_names, $load = false, $require_once = true ) {
	$located = '';
	foreach ( (array) $template_names as $template_name ) {
		if ( !$template_name )
			continue;
		if ( file_exists(ABSPATH .  $template_name)) {
			$located = ABSPATH . $template_name;
			break;
		}	
	}

	if ( $load && '' != $located )
		load_template( $located, $require_once );

	return $located;
}

function load_template( $_template_file, $require_once = true ) {
	
	if ( $require_once ) {
		require_once( $_template_file );
	} else {
		require( $_template_file );
	}
}
