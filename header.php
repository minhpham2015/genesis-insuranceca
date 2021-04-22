<?php
/**
 * Genesis Framework.
 *
 * WARNING: This file is part of the core Genesis Framework. DO NOT edit this file under any circumstances.
 * Please do all modifications in the form of a child theme.
 *
 * @package Genesis\Templates
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://my.studiopress.com/themes/genesis/
 */

/**
 * Fires at start of header.php, immediately before `genesis_title` action hook to render the Doctype content.
 *
 * @since 1.3.0
 */
do_action( 'genesis_doctype' );

/**
 * Fires immediately after `genesis_doctype` action hook, in header.php to render the document title.
 *
 * @since 1.0.0
 */
do_action( 'genesis_title' );

/**
 * Fires immediately after `genesis_title` action hook, in header.php to render the meta elements.
 *
 * @since 1.0.0
 */
do_action( 'genesis_meta' );

wp_head(); // We need this for plugins.
?>
</head>
<?php if( get_field('background_color_heading') ): ?>
	<style type="text/css">
		.header-main{ background: <?php the_field('background_color_heading'); ?>; }
		.header-main .header-socials .wrap a{ color: <?php the_field('background_color_heading'); ?>; }
	</style>
<?php endif; ?>
<?php if( get_field('padding_top_site_inner') ): ?>
	<style type="text/css">
		body.elementor-template-full-width .site-inner{ padding-top: 0px; }
	</style>
<?php endif; ?>
<?php if( get_field('header_position_absolute_transparent') ): ?>
	<style type="text/css">
	.header-main {
		position: absolute;
		width: 100%;
		background: transparent !important;
	}
	.header-main .header-socials .wrap a {
	    z-index: 9;
	}
	.header-main .site-header .title-area{
	    z-index: 9;
	}
	</style>
<?php endif; ?>
<?php
genesis_markup(
	[
		'open'    => '<body %s>',
		'context' => 'body',
	]
);

if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
/**
 * Fires immediately after the `wp_body_open` action hook.
 *
 * @since 1.0.0
 */
do_action( 'genesis_before' );

genesis_markup(
	[
		'open'    => '<div %s>',
		'context' => 'site-container',
	]
);

// button share in pages
share_page_button();

// alert banner top page
alert_banner_top();

genesis_markup(
	[
		'open'    => '<div %s>',
		'context' => 'header-main',
	]
);
/**
 * Fires immediately after the site container opening markup, before `genesis_header` action hook.
 *
 * @since 1.0.0
 */
do_action( 'genesis_before_header' );

/**
 * Fires to display the main header content.
 *
 * @since 1.0.2
 */
do_action( 'genesis_header' );
/**
 * Fires immediately after the `genesis_header` action hook, before the site inner opening markup.
 *
 * @since 1.0.0
 */
do_action( 'genesis_after_header' );

genesis_markup(
	[
		'close'   => '</div>',
		'context' => 'header-main',
	]
);


genesis_markup(
	[
		'open'    => '<div %s>',
		'context' => 'site-inner',
	]
);
genesis_structural_wrap( 'site-inner' );
