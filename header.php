<!DOCTYPE html>
<!--[if lt IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie6 lte7 lte8 lte9"><![endif]-->
<!--[if IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie7 lte7 lte8 lte9"><![endif]-->
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="no-js ie ie8 lte8 lte9"><![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="no-js ie ie9 lte9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.5, minimum-scale=0.5">
		<title><?php wp_title( 'by', true, 'right' ); bloginfo( 'name' ); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="<?php echo get_bloginfo('template_directory'); ?>/images/favicon.ico" />
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<?php

			wp_enqueue_script('jquery');

			if ( is_singular() && get_option( 'thread_comments' ) )
				wp_enqueue_script( 'comment-reply' );

			$options = get_option ( 'svbtle_options' ); 

			echo $options['google_analytics'];
 
			if( isset( $options['color'] ) && '' != $options['color'] )
				$color = $options['color'];
			else 
				$color = "#ff0000";
	
		?>

		<style>blockquote {border-color: <?php echo $color ?>;}figure.logo, aside.alsoby li a:hover, aside.kudo.complete span.circle {background-color: <?php echo $color ?>;}section.preview header#begin h2,ul#user_meta a:hover,nav.pagination span.next a,nav.pagination span.prev a {color: <?php echo $color ?>;}ul#user_meta a:hover,nav.pagination span.next a,nav.pagination span.prev a {border-color: <?php echo $color ?>;}::-moz-selection { background: <?php echo $color ?>; color: #fff; text-shadow: none;}::selection { background: <?php echo $color ?>; color: #fff; text-shadow: none;}
		</style>
		
		<?php wp_head();  ?>
			<script>
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
						  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
						    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-47148207-1', 'wtf.sg');
  ga('send', 'pageview');

</script>
	</head>
	<body <?php body_class(); ?>>

		<header id="sidebar">
			<figure class="medium">
				<!--<a href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a> -->
				<canvas id="conway" width="192" height="192"></canvas>
			<script type="text/javascript">
			var CELL_WIDTH = 12;
			var CELL_COLOR = 'rgb(0,128,0)';
			function turtle(board,x,y) {
				board[x + 0][y + 4].clicked();
				board[x + 0][y + 5].clicked();
				board[x + 1][y + 0].clicked();
				board[x + 1][y + 1].clicked();
				board[x + 1][y + 3].clicked();
				board[x + 1][y + 6].clicked();
				board[x + 1][y + 8].clicked();
				board[x + 1][y + 9].clicked();
				board[x + 2][y + 0].clicked();
				board[x + 2][y + 1].clicked();
				board[x + 2][y + 8].clicked();
				board[x + 2][y + 9].clicked();
				board[x + 3][y + 0].clicked();
				board[x + 3][y + 2].clicked();
				board[x + 3][y + 7].clicked();
				board[x + 3][y + 9].clicked();
				board[x + 4][y + 2].clicked();
				board[x + 4][y + 3].clicked();
				board[x + 4][y + 6].clicked();
				board[x + 4][y + 7].clicked();
				board[x + 5][y + 1].clicked();
				board[x + 5][y + 2].clicked();
				board[x + 5][y + 4].clicked();
				board[x + 5][y + 5].clicked();
				board[x + 5][y + 7].clicked();
				board[x + 5][y + 8].clicked();
				board[x + 6][y + 3].clicked();
				board[x + 6][y + 6].clicked();
				board[x + 7][y + 1].clicked();
				board[x + 7][y + 8].clicked();
				board[x + 8][y + 1].clicked();
				board[x + 8][y + 8].clicked();
				board[x + 10][y + 1].clicked();
				board[x + 10][y + 2].clicked();
				board[x + 10][y + 3].clicked();
				board[x + 10][y + 4].clicked();
				board[x + 10][y + 5].clicked();
				board[x + 10][y + 6].clicked();
				board[x + 10][y + 7].clicked();
				board[x + 10][y + 8].clicked();
				board[x + 11][y + 0].clicked();
				board[x + 11][y + 1].clicked();
				board[x + 11][y + 8].clicked();
				board[x + 11][y + 9].clicked();
			}
			var preload = function(board) {
				console.log('HELO');
				turtle(board,2,3);
			};
			</script>
				<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/conway.js"></script>
				<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/konami.js"></script>
<script>
			var easter_egg = new Konami();
			easter_egg.code = start;
			easter_egg.load();
		</script>
			</figure>
			<h1><a href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<h2><a href="<?php echo home_url( '/' ); ?>"><?php echo $options['theme_username'] ?></a></h2>
			<h3><?php bloginfo( 'description' ); ?></h3>

			<ul id="user_nav">
			
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				
				<?php if ($options['rss-link']): ?>
					<li class="link feed">
				      <a href="<?php bloginfo('rss_url'); ?>">feed</a>
				    </li>		
				<?php endif ?>		
		
				<?php if ( is_active_sidebar( 'sidebar' ) ) dynamic_sidebar( 'sidebar' ); ?>

		  </ul>
		  <aside id="svbtle_linkback">
		    <a href="https://github.com/gravityonmars/wp-svbtle">
		      <span class="logo_square"><span class="logo_circle">&nbsp;</span></span>&nbsp;<span class="svbtle">wp-svbtle</span>
		    </a>
		  </aside>
		</header>
		<section id="river" role="main">
        
        <?php if (isset($_GET['not_found'])): ?>
        <div id="notice"><span>:(</span><br><br>Not found.</div>
        <?php endif; ?>
