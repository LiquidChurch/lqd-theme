<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Liquid_Churchn
 * @since Liquid Church 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<?php
	?>

	<div class="entry-content">
		<?php
		$sermon = gc_get_sermon_post( $sermon_post_id );
		?>
		<div class="row">
			<div class="col-md-5">
				<a href="<?php echo $sermon->permalink();?>">
					<?php echo wp_get_attachment_image( $sermon->featured_image_id(), 'full', false, array(
						'class' => 'gc-series-list-sermons-img', ) ); ?>
				</a>
			</div>
			<div class="col-md-7">
				<header class="entry-header">
					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				</header><!-- .entry-header -->
				<?php
				$speaker = $sermon->get_speaker();
				echo $speaker->name;
				//$speakers = gc_sermons()->taxonomies->speakers->get( get_queried_object_id() );
				//echo $speakers->name;
				//$speakers = $sermon->get_speaker();
				//foreach ($speakers as $key => $speaker) {
				/*	echo $key . " <br />";
					echo $speaker . " <br />";
					$name = $speaker->name;
					echo $name;

				} */
				?>
			</div>
		</div>


	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php liquidchurch_entry_meta(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
