<?php
/**
 * The template part for displaying single messages
 *
 *
 * @package WordPress
 * @subpackage Liquid_Churchn
 * @since Liquid Church 1.0
 */

// Get Sermon object
$sermon = lqdm_get_sermon_post();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php if ( $video_player = lqdm_get_sermon_video_player( $sermon ) ) : ?>
		<div class="message-video">
			<?php echo $video_player; ?>
		</div>
		<?php
		// Enqueue fitvids for responsive video.
		wp_enqueue_script(
			'fitvids',
			Lqd_Messages_Plugin::$url . 'assets/js/vendor/jquery.fitvids.js',
			[ 'jquery' ],
			'1.1',
			true
		);
		?>
		<script type="text/javascript">
			jQuery( function( $ ) {
				jQuery( '.lqdm-video' ).fitVids();
			});
		</script>
	<?php else : ?>
		<?php lqdm_post_thumbnail(); ?>
	<?php endif; ?>

	<?php if ( $audio_player = lqdm_get_sermon_audio_player( $sermon ) ) : ?>
		<div class="lqdm-audio">
			<?php echo $audio_player; ?>
		</div>
	<?php endif; ?>

	<div class="entry-content">
		<div class="entry-content-left">
			<?php the_content(); ?>

			<?php if ( $notes = apply_filters( 'the_content', $sermon->get_meta( 'lqdm_notes' ) ) ) : ?>
				<div class="lqdm-notes">
					<?php echo $notes; ?>
				</div>
			<?php endif; ?>

		</div>

		<div class="entry-content-right">
			<div class="lqdm-series">
				<?php do_action( 'lqdm_recent_series', [ 'sermon_id' => $sermon->ID, 'thumbnail_size' => 'medium', 'remove_thumbnail' => 'false' ] ); ?>
			</div>
			<div class="lqdm-speaker">
				<?php do_action( 'lqdm_recent_speaker', [ 'sermon_id' => $sermon->ID, 'thumbnail_size' => 'medium' ] ); ?>
			</div>
		</div>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<div class="lqdm-topics">
			<?php the_terms( $sermon->ID, 'lqdm-topic', 'Topics: ', ' / ' ); ?>
		</div>

		<div class="lqdm-tags">
			<?php the_terms( $sermon->ID, 'lqdm-tag', 'Tags: ', ' / ' ); ?>
		</div>

		<div class="lqdm-scripture">
			<?php the_terms( $sermon->ID, 'lqdm-scripture', 'Scriptures referenced: ', ' / ' ); ?>
		</div>

		<div class="lqdm-message-other-in-series">
			<h3>Others in Series</h3>
			<?php do_action( 'lqd_messages', [
				'per_page'       => 8,
				'related_series' => 'this',
				'content'        => '',
				'thumbnail_size' => 'medium',
				'number_columns' => 4,
            ] ); ?>
		</div>

		<div class="lqdm-message-other-in-series">
			<h3>Resources</h3>
			<?php do_action( 'lqdm_resources', [
				'resource_type'      => [ 'files', 'urls' ],
				'resource_file_type' => [ 'image', 'video', 'audio', 'pdf', 'zip', 'other' ],
				'resource_post_id'   => $sermon->ID,
            ] ); ?>
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
