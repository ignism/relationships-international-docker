<?php
/**
 * Template Name: Page Home
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

$context = Timber::context();
$context['post'] = new Timber\Post();

$templates = array( 'pages/home.html.twig', 'pages/page.html.twig' );

Timber::render($templates, $context);