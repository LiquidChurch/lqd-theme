<?php
/**
 * The template part for displaying single posts
 *
 *
 * @package WordPress
<<<<<<< HEAD
 * @subpackage Liquid_Church
 * @since 1.0.0
=======
 * @subpackage Liquid_Churchn
 * @since Liquid Church 1.0
>>>>>>> b8292e0760874892f13b881e19f3c290e16c6461
 */

// Get Sermon object
$sermon = gc_get_sermon_post();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php if ( $video_player = gc_get_sermon_video_player( $sermon ) ) : ?>
		<div class="message-video">
			<?php echo $video_player; ?>
		</div>
		<?php
		// Enqueue fitvids for responsive video.
		wp_enqueue_script(
			'fitvids',
			GC_Sermons_Plugin::$url . 'assets/js/vendor/jquery.fitvids.js',
			array( 'jquery' ),
			'1.1',
			true
		);
		?>
		<script type="text/javascript">
			jQuery( function( $ ) {
				jQuery( '.message-video' ).fitVids();
			});
		</script>
	<?php else : ?>
		<?php liquidchurch_post_thumbnail(); ?>
	<?php endif; ?>

	<?php if ( $audio_player = gc_get_sermon_audio_player( $sermon ) ) : ?>
		<div class="message-audio">
			<?php echo $audio_player; ?>
		</div>
	<?php endif; ?>

	<div class="entry-content">
		<div class="entry-content-left">
			<?php the_content(); ?>

			<?php if ( $notes = apply_filters( 'the_content', $sermon->get_meta( 'gc_sermon_notes' ) ) ) : ?>
				<div class="message-notes">
					<?php echo $notes; ?>
				</div>
			<?php endif; ?>

		</div>

		<div class="entry-content-right">
			<div class="message-series">
				<?php do_action( 'gc_recent_series', array( 'sermon_id' => $sermon->ID, 'thumbnail_size' => 'medium',  'remove_thumbnail' => 'false' ) ); ?>
			</div>
			<div class="message-speaker">
				<?php do_action( 'gc_recent_speaker', array( 'sermon_id' => $sermon->ID, 'thumbnail_size' => 'medium' ) ); ?>
			</div>
			<div class="message-related-links">
				<?php do_action( 'gc_related_links', array( 'sermon_id' => $sermon->ID ) ); ?>
			</div>
		</div>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<div class="message-topics">
			<?php the_terms( $sermon->ID, 'gcs-topic', 'Topics: ', ' / ' ); ?>
		</div>

		<div class="message-tags">
			<?php the_terms( $sermon->ID, 'gcs-tag', 'Tags: ', ' / ' ); ?>
		</div>

		<div class="message-scripture">
			<?php the_terms( $sermon->ID, 'gcs-scripture', 'Scriptures referenced: ', ' / ' ); ?>
		</div>

		<div class="message-other-in-series">
			<h3>Others in Series</h3>
			<?php do_action( 'gc_sermons', array(
				'per_page'       => 8,
				'related_series' => 'this',
				'content'        => '',
				'thumbnail_size' => 'medium',
				'number_columns' => 4,
			) ); ?>
		</div>

		<div class="message-other-in-series">
			<h3>Resources</h3>
			<?php do_action( 'sermon_resources', array(
				'resource_type'      => array( 'files', 'urls' ),
				'resource_file_type' => array( 'image', 'video', 'audio', 'pdf', 'zip', 'other' ),
				'resource_post_id'   => $sermon->ID,
			) ); ?>
		</div>

		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'liquidchurch' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
