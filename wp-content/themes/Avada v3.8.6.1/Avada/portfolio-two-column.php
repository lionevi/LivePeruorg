<?php
// Template Name: Portfolio Two Column
get_header(); ?>
	<?php
	$content_css = 'width:100%';
	$sidebar_css = 'display:none';
	$content_class = '';
	$sidebar_exists = false;
	$sidebar_left = '';
	$double_sidebars = false;

	$sidebar_1 = get_post_meta( $post->ID, 'sbg_selected_sidebar_replacement', true );
	$sidebar_2 = get_post_meta( $post->ID, 'sbg_selected_sidebar_2_replacement', true );

	if( Avada()->settings->get( 'pages_global_sidebar' ) ) {
		if( Avada()->settings->get( 'pages_sidebar' ) != 'None' ) {
			$sidebar_1 = array( Avada()->settings->get( 'pages_sidebar' ) );
		} else {
			$sidebar_1 = '';
		}

		if( Avada()->settings->get( 'pages_sidebar_2' ) != 'None' ) {
			$sidebar_2 = array( Avada()->settings->get( 'pages_sidebar_2' ) );
		} else {
			$sidebar_2 = '';
		}
	}

	if( ( is_array( $sidebar_1 ) && $sidebar_1[0] ) && ( is_array( $sidebar_2 ) && $sidebar_2[0] ) ) {
		$double_sidebars = true;
	}

	if( is_array( $sidebar_1 ) &&
		$sidebar_1[0]
	) {
		$sidebar_exists = true;
	} else {
		$sidebar_exists = false;
	}

	if( ! $sidebar_exists ) {
		$content_css = 'width:100%';
		$sidebar_css = 'display:none';
		$sidebar_exists = false;
	} elseif(get_post_meta($post->ID, 'pyre_sidebar_position', true) == 'left') {
		$content_css = 'float:right;';
		$sidebar_css = 'float:left;';
		$content_class = 'portfolio-two-sidebar';
		$sidebar_exists = true;
		$sidebar_left = 1;
	} elseif(get_post_meta($post->ID, 'pyre_sidebar_position', true) == 'right') {
		$content_css = 'float:left;';
		$sidebar_css = 'float:right;';
		$content_class = 'portfolio-two-sidebar';
		$sidebar_exists = true;
	} elseif(get_post_meta($post->ID, 'pyre_sidebar_position', true) == 'default'  || ! metadata_exists( 'post', $post->ID, 'pyre_sidebar_position' )) {
		$content_class = 'portfolio-two-sidebar';
		if(Avada()->settings->get( 'default_sidebar_pos' ) == 'Left') {
			$content_css = 'float:right;';
			$sidebar_css = 'float:left;';
			$sidebar_exists = true;
			$sidebar_left = 1;
		} elseif(Avada()->settings->get( 'default_sidebar_pos' ) == 'Right') {
			$content_css = 'float:left;';
			$sidebar_css = 'float:right;';
			$sidebar_exists = true;
			$sidebar_left = 2;
		}
	}

	if(get_post_meta($post->ID, 'pyre_sidebar_position', true) == 'right') {
		$sidebar_left = 2;
	}

	if( Avada()->settings->get( 'pages_global_sidebar' ) ) {
		if( Avada()->settings->get( 'pages_sidebar' ) != 'None' ) {
			$sidebar_1 = Avada()->settings->get( 'pages_sidebar' );

			if( Avada()->settings->get( 'default_sidebar_pos' ) == 'Right' ) {
				$content_css = 'float:left;';
				$sidebar_css = 'float:right;';
				$sidebar_left = 2;
			} else {
				$content_css = 'float:right;';
				$sidebar_css = 'float:left;';
				$sidebar_left = 1;
			}
		}

		if( Avada()->settings->get( 'pages_sidebar_2' ) != 'None' ) {
			$sidebar_2 = Avada()->settings->get( 'pages_sidebar_2' );
		}

		if( Avada()->settings->get( 'pages_sidebar' ) != 'None' && Avada()->settings->get( 'pages_sidebar_2' ) != 'None' ) {
			$double_sidebars = true;
		}
	} else {
		$sidebar_1 = '0';
		$sidebar_2 = '0';
	}

	if($double_sidebars == true) {
		$content_css = 'float:left;';
		$sidebar_css = 'float:left;';
		$sidebar_2_css = 'float:left;';
	} else {
		$sidebar_left = 1;
	}
	?>
	<div id="content" class="<?php echo avada_get_portfolio_classes( get_the_ID() ); echo ' ' . $content_class; ?>" style="<?php echo $content_css; ?>">

	<?php get_template_part( 'templates/portfolio', 'layout' ); ?>

	</div>
	<?php if( $sidebar_exists == true ): ?>
	<?php wp_reset_query(); ?>
	<div id="sidebar" class="sidebar" style="<?php echo $sidebar_css; ?>">
		<?php
		if($sidebar_left == 1) {
			generated_dynamic_sidebar($sidebar_1);
		}
		if($sidebar_left == 2) {
			generated_dynamic_sidebar_2($sidebar_2);
		}
		?>
	</div>
	<?php if( $double_sidebars == true ): ?>
	<div id="sidebar-2" class="sidebar" style="<?php echo $sidebar_2_css; ?>">
		<?php
		if($sidebar_left == 1) {
			generated_dynamic_sidebar_2($sidebar_2);
		}
		if($sidebar_left == 2) {
			generated_dynamic_sidebar($sidebar_1);
		}
		?>
	</div>
	<?php endif; ?>
	<?php endif; ?>
<?php get_footer();

// Omit closing PHP tag to avoid "Headers already sent" issues.
