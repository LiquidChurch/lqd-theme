<?php /* Template Name: Groups Directory */ ?>
<?php

get_header(); ?>
	<link rel="stylesheet"
      href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
	<script type="text/javascript"
src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php if ( have_posts() ) : ?>
			<div style="max-width:80%; margin:auto;">
			<header class="page-header">
				<h1 class="page-title">Groups</h1>
				<?php
					//the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<?php
            echo '<div class="row" style="font-size:1.5rem;line-height:1.5rem;font-weight:800;">';
            echo '<div class="col-md-3">Group</div>';
            echo '<div class="col-md-1">Day</div>';
            echo '<div class="col-md-1">Time</div>';
			echo '<div class="col-md-1">Childcare</div>';
            echo '<div class="col-md-1">Type</div>';
            echo '<div class="col-md-1">Church</div>';
            echo '<div class="col-md-2">Campus</div>';
            echo '<div class="col-md-2">Contact</div>';
            echo '</div>';
			echo '<hr />';
            echo '<br />';
			$args = array(
				'post_type' => 'ccb-core-groups',
				'posts_per_page' => '-1'
			);
			$query = new WP_Query( $args );
			if ( $query->have_posts() ) {
				$query->the_post();
				echo '<div>';
				// Start the Loop.
				while ( $query->have_posts() ) {
					$query->the_post();
					echo '<div class="row">';  // Single Group Row

					echo '<div class="col-md-3">'; // Get Group Title
					echo '<span style="font-size:1.5rem; line-height:1.5rem">' . get_the_title() . '</span>'; // group name
					echo '</div>'; // End Group Title

					echo '<div class="col-md-1">'; // Get Group Day
					$term_list = wp_get_post_terms( get_the_ID(), 'group_days' );
					foreach ( $term_list as $term_single ) {
						echo $term_single->name;
					}
					echo '</div>'; // End Group Day

					echo '<div class="col-md-1">'; // Get Group Time
					$times_list = wp_get_post_terms( get_the_ID(), 'group_times' );
					foreach ( $times_list as $time_single ) {
						echo $time_single->name;
					}
					echo '</div>'; // End Group Time

					echo '<div class="col-md-1">'; // Get Childcare
					$childcare = get_post_meta( get_the_ID(), 'childcare', true );
					if ( $childcare == 'true' ) {
						echo 'Yes';
					} else {
						echo 'No';
					}
					echo '</div>'; // End Childcare

                    echo '<div class="col-md-1">'; // Get Group Type
                    $types_list = wp_get_post_terms( get_the_ID(), 'group_types' );
                    foreach ( $types_list as $type_single ) {
                        echo $type_single->name;
                    }
                    echo '</div>'; // End Group Type

                    echo '<div class="col-md-1">'; // Get Group Area
                    $areas_list = wp_get_post_terms( get_the_ID(), 'group_areas' );
                    foreach ( $areas_list as $area_single ) {
                    	if ( $area_single->name == 'At the Church') {
                    		echo 'Yes';
	                    }
                        //echo $area_single->name;
                    }
                    echo '</div>'; // End Group Area

					echo '<div class="col-md-2">'; // Get Campus
					$campus = get_post_meta( get_the_ID(), 'church_campus', true);
					echo $campus;
					echo '</div>'; // End Campus

                    echo '<div class="col-md-2">'; // Contact Group Leader
					$individual_id = get_post_meta( get_the_ID(), 'main_leader_id', true);
					$leader_full_name = get_post_meta( get_the_ID(), 'leader_full_name', true);
					$individual_full_name = htmlentities($leader_full_name);
					$group_id = get_post_meta( get_the_ID(), 'group_id', true);
                    echo '<a href="javascript:void(0)" onclick="javascript:window.open(\'https://liquidchurch.ccbchurch.com/easy_email.php?source=w_group_list&ax=create_new&individual_id=' . $individual_id . '&' . 'group_id=' . $group_id . '&individual_full_name=' . $individual_full_name . '\',\'Email\',\'scrollbars=1,width=520,height=710\');return false;">Email Leader(s)</a>';
                    echo '</div>'; // End Contact Group Leader

					echo '</div>'; // End Single Group Row
                  /*  echo '<div class="row">'; // Single Group Row
                    echo '<div class="col-md-12">'; // Group Description
                    echo '<p style="font-size:1.5rem; line-height:1.5rem;">' . get_the_content() . '</p>'; // group description
                    echo '</div>'; // End Group Description
                    echo '</div>'; // End Single Row
                  */
					echo '<hr>';

					//$address2 = get_post_meta( get_the_ID(), 'address_line_2', true );
					//echo $address2;
					//echo '<a href="javascript:void(0)" onclick="javascript:window.open(\'https://liquidchurch.ccbchurch.com/easy_email.php?source=w_group_list&ax=create_new&individual_id=35917&group_id=884&individual_full_name=Dave%20Mackey\',\'Email\',\'scrollbars=1,width=520,height=710\');return false;">Email Leader(s)</a>';
				}
				echo '</div>';
			}
			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'liquidchurch' ),
				'next_text'          => __( 'Next page', 'liquidchurch' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'liquidchurch' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
			</div>
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
