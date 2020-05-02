<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Liquid_Church
 * @since 1.0.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="page">
    <!-- Header start -->
    <div class="lqd-header container-fluid">
        <?php get_template_part( 'template-parts/header/header', 'covid' ); ?>
        <?php get_template_part( 'template-parts/header/header', 'top' ); ?>
        <?php get_template_part( 'template-parts/header/header', 'menu' ); ?>
    </div>

    <!-- Header end -->
    <div class="content">
        <div class="container">
            <div class="row">
