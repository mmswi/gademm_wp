<?php
/**
 * Template Name: Go to second child
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gademm_underscores
 */

$pagekids = get_pages("child_of=".$post->ID."&sort_column=menu_order");
if ($pagekids) {
	$child = $pagekids[1]; //putem pune ce numar vrem - vreau sa redirecteze la copilul 2
	wp_redirect(get_permalink($child->ID));
} else {
// Do whatever templating you want as a fall-back.
}

?>
