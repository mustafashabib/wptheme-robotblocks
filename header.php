<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <link rel='stylesheet' id='googleFonts-css'  href='//fonts.googleapis.com/css?family=Quicksand&#038;ver=3.4.2' type='text/css' media='all' />
  <link href='//fonts.googleapis.com/css?family=Antic+Slab' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> 
  <?php wp_head(); ?>
</head>
<body <?php body_class( $class ); ?>>
<div id="wrapper">
    <header>
      <h1><?php bloginfo('name'); ?></h1>
      <a href="<?php echo home_url( '/' ); ?>" title="Robot Blocks" rel="home">
        <img src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>" id="topimage"/>
      </a>
      <h2>
        <?php echo html_entity_decode(get_bloginfo('description')); ?>
      </h2>
    </header>