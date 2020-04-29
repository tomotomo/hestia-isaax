<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the page header div.
 *
 * @package Hestia
 * @since Hestia 1.0
 */
$wrapper_div_classes = 'wrapper ';
if ( is_single() ) {
	$wrapper_div_classes .= join( ' ', get_post_class() );
}

$layout               = apply_filters( 'hestia_header_layout', get_theme_mod( 'hestia_header_layout', 'default' ) );
$disabled_frontpage   = get_theme_mod( 'disable_frontpage_sections', false );
$wrapper_div_classes .=
	(
		( is_front_page() && ! is_page_template() && ! is_home() && false === (bool) $disabled_frontpage ) ||
		( class_exists( 'WooCommerce' ) && ( is_product() || is_product_category() ) ) ||
		( is_archive() && ( class_exists( 'WooCommerce' ) && ! is_shop() ) )
	) ? '' : ' ' . $layout . ' ';

$header_class = '';
$hide_top_bar = get_theme_mod( 'hestia_top_bar_hide', true );
if ( (bool) $hide_top_bar === false ) {
	$header_class .= 'header-with-topbar';
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset='<?php bloginfo( 'charset' ); ?>'>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MQCVJ3B');</script>
<!-- End Google Tag Manager -->
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>

	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MQCVJ3B"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<div class="<?php echo esc_attr( $wrapper_div_classes ); ?>">
		<header class="header <?php echo esc_attr( $header_class ); ?>">
			<?php
			hestia_before_header_trigger();
			do_action( 'hestia_do_top_bar' );
			do_action( 'hestia_do_header' );
			hestia_after_header_trigger();
			?>
		</header>
