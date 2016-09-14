<?php /* Template Name: Groups Directory */ ?>
<?php

get_header();
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div style="max-width:80%; margin:auto;">
			<header class="page-header">
				<h1 class="page-title">Find a Group</h1>
				<div class="taxonomy-description"></div>
			</header><!-- .page-header -->
			<div class="row table-responsive">
				<table id="groups" class="table table-striped sortable">
					<thead>
					<tr>
						<th>Group</th>
						<th>Day</th>
						<th>Time</th>
						<th>Childcare</th>
						<!--<th>Type</th> -->
						<!--<th>At Church</th> -->
						<th>Campus</th>
						<th>Contact</th>
						<th>Description</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$args = array(
						'post_type' => 'ccb-core-groups',
						'posts_per_page' => '-1',
						'tax_query' => array(
							array(
							'taxonomy' => 'group_types',
							'field' => 'slug',
							'terms' => 'volunteers',
							'operator' => 'NOT IN'
							),
						),
					);
					$query = new WP_Query( $args );
					json_encode( $query->posts );
					if ( $query->have_posts() ) {
						$query->the_post();
						// Start the Loop.
						while ( $query->have_posts() ) {
							$query->the_post();
							echo '<tr>';  // Single Group Row

							echo '<td>'; // Get Group Title
							echo get_the_title(); // group name
							echo '</td>'; // End Group Title

							echo '<td>'; // Get Group Day
							$term_list = wp_get_post_terms( get_the_ID(), 'group_days' );
							foreach ( $term_list as $term_single ) {
								echo $term_single->name;
							}
							echo '</td>'; // End Group Day

							echo '<td>'; // Get Group Time
							$times_list = wp_get_post_terms( get_the_ID(), 'group_times' );
							foreach ( $times_list as $time_single ) {
								echo $time_single->name;
							}
							echo '</td>'; // End Group Time

							echo '<td>'; // Get Childcare
							$childcare = get_post_meta( get_the_ID(), 'childcare', true );
							if ( $childcare == 'true' ) {
								echo 'Yes';
							} else {
								echo 'No';
							}
							echo '</td>'; // End Childcare

							/*echo '<td>'; // Get Group Type
							$types_list = wp_get_post_terms( get_the_ID(), 'group_types' );
							foreach ( $types_list as $type_single ) {
								echo $type_single->name;
							}
							echo '</td>'; // End Group Type
							*/

						/*	echo '<td>'; // Get Group Area
							$areas_list = wp_get_post_terms( get_the_ID(), 'group_areas' );
							foreach ( $areas_list as $area_single ) {
								if ( $area_single->name == 'At the Church') {
									echo 'Yes';
								}
							}
							echo '</td>'; // End Group Area */

							echo '<td>'; // Get Campus
							$campus = get_post_meta( get_the_ID(), 'church_campus', true);
							echo $campus;
							echo '</td>'; // End Campus

							echo '<td>'; // Contact Group Leader
							$individual_id = get_post_meta( get_the_ID(), 'main_leader_id', true);
							$leader_full_name = get_post_meta( get_the_ID(), 'leader_full_name', true);
							$individual_full_name = htmlentities($leader_full_name);
							$group_id = get_post_meta( get_the_ID(), 'group_id', true);
							echo '<a href="javascript:void(0)" onclick="javascript:window.open(\'https://liquidchurch.ccbchurch.com/easy_email.php?source=w_group_list&ax=create_new&individual_id=' . $individual_id . '&' . 'group_id=' . $group_id . '&individual_full_name=' . $individual_full_name . '\',\'Email\',\'scrollbars=1,width=520,height=710\');return false;">Email Leader(s)</a>';
							echo '</td>'; // End Contact Group Leader

							echo '<td>'; // Show Group Description
							echo get_the_content();
							echo '</tr>'; // End Single Group Row */
				}
			}
			?>
					</tbody>
					</table>
				</div>
				<script type="text/javascript">
					// This works.
					jQuery(document).ready( function () {
						jQuery('#groups').DataTable({
							paging: false,
							responsive: true,
							fixedHeader: {
								header: true,
								footer: false
							},
							scrollY: false
						});
						// Use json encoded object.
					} );

				</script>
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
