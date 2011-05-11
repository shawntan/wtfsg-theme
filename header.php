<?php
/**
 * @package WordPress
 * @subpackage Toolbox
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'toolbox' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php bloginfo( 'template_directory' ); ?>/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>

	<script type="text/javascript">
		var CELL_WIDTH=5;
		var CELL_COLOR='#F3804F';
		var preload = function(board) {
			board[92][29].clicked();
			board[92][30].clicked();
			board[93][29].clicked();
			board[93][30].clicked();
			board[100][12].clicked();
			board[100][13].clicked();
			board[101][12].clicked();
			board[101][14].clicked();
			board[102][14].clicked();
			board[102][29].clicked();
			board[102][30].clicked();
			board[102][31].clicked();
			board[103][14].clicked();
			board[103][15].clicked();
			board[103][28].clicked();
			board[103][32].clicked();
			board[104][27].clicked();
			board[104][33].clicked();
			board[105][27].clicked();
			board[105][33].clicked();
			board[106][30].clicked();
			board[107][28].clicked();
			board[107][32].clicked();
			board[108][29].clicked();
			board[108][30].clicked();
			board[108][31].clicked();
			board[109][30].clicked();
			board[112][27].clicked();
			board[112][28].clicked();
			board[112][29].clicked();
			board[113][27].clicked();
			board[113][28].clicked();
			board[113][29].clicked();
			board[114][26].clicked();
			board[114][30].clicked();
			board[116][25].clicked();
			board[116][26].clicked();
			board[116][30].clicked();
			board[116][31].clicked();
			board[126][27].clicked();
			board[126][28].clicked();
			board[127][27].clicked();
			board[127][28].clicked();
		};
	</script>
	<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/conway.js"></script>
	<script type="text/javascript">
		var isCtrl = false;
		document.onkeyup=function(e) {
			if(e.which == 17) isCtrl=false;
		}
		document.onkeydown=function(e) {
			if(e.which == 17) isCtrl=true;
			if(e.which == 83 && isCtrl == true) {
				toggle();
				return false;
			}
		}
	</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed">
	<header id="branding" role="banner">
		<hgroup>
			<canvas id="conway" width="640" height="170"></canvas>
			<div id="title">
			<h1 id="site-title"><span><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
			<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>
		</hgroup>

		<nav id="access" role="navigation">
			<h1 class="section-heading"><?php _e( 'Main menu', 'toolbox' ); ?></h1>
			<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'toolbox' ); ?>"><?php _e( 'Skip to content', 'toolbox' ); ?></a></div>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #access -->
	</header><!-- #branding -->


	<div id="main">
