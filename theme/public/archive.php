<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

$context = Timber::get_context();
$timber_posts = new Timber\PostQuery();
$context['posts'] = $timber_posts;

$templates = array( 'index.html.twig' );

if ( sizeof($timber_posts) > 0) {
  if ($timber_posts[0]->type == 'blogarticle') {
    $templates = array('pages/blogarticles.html.twig');
  } else if ($timber_posts[0]->type == 'mediaarticle') {
    $templates = array('pages/mediaarticles.html.twig');
  } else if ($timber_posts[0]->type == 'workshop') {
    $templates = array('pages/workshops.html.twig');
  }
}

Timber::render( $templates, $context );