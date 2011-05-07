<?php
/**
 * @package WordPress
 * @subpackage Toolbox
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php if ( 'post' == $post->post_type ) : ?>
		<div class="entry-meta">
			<ul>
				<li>
<?php $y = get_the_time('Y'); ?>
<?php $m = get_the_time('m'); ?>
<?php $d = get_the_time('d'); ?>				
					<time class="entry-date" datetime="<?php the_date('c') ?>">
					<a href="<?php echo get_day_link($y, $m, $d);?>" rel="bookmark">
						<span class="day"><?php echo $d ?></span>
						<span class="month"><?php the_time('F \'y')?></span>
					</a>
						<span class="time"><?php the_time('H:i')?></span>
					</time>
				</a>
				</li>

				<li>
				<span class="sep"> by </span>
				<span class="author vcard">
					<a
						class="url fn n"
						href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) )?>"
						title="<?php printf( esc_attr__( 'View all posts by %s', 'toolbox' ), get_the_author() )?>"
					>
						<?php the_author() ?>
					</a>
				</span>
				</li>
				<li>
					<span class="cat-links">
					<?php the_category( ', ' ); ?>
					</span>
				</li>
		</ul>
		</div><!-- .entry-meta -->
		<?php endif; ?>

		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'toolbox' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for search pages ?>
	<div class="entry-summary">
		<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'toolbox' ) ); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'toolbox' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'toolbox' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<span class="sep"> | </span>
		<?php the_tags( '<span class="tag-links">' . __( 'Tagged ', 'toolbox' ) . '</span>', ', ', '<span class="sep"> | </span>' ); ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'toolbox' ), __( '1 Comment', 'toolbox' ), __( '% Comments', 'toolbox' ) ); ?></span>
		<?php edit_post_link( __( 'Edit', 'toolbox' ), '<span class="sep">|</span> <span class="edit-link">', '</span>' ); ?>
	</footer><!-- #entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
