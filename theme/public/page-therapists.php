<?php
/**
 * Template Name: Page Therapists
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

$context = Timber::context();
$context['post'] = new Timber\Post();

$templates = array( 'pages/therapists.html.twig', 'pages/page.html.twig' );

Timber::render($templates, $context);