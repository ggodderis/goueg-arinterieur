<?php
/**
 * Plugin Name:       Goueg Labo Blocktype
 * Description:       Example block scaffolded with Create Block tool.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       goueg-labo-blocktype
 *
 * @package           create-block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function create_block_goueg_labo_blocktype_block_init() {
	register_block_type( __DIR__ . '/build/1-media' );
	register_block_type( __DIR__ . '/build/2-bandeau' );
	register_block_type( __DIR__ . '/build/3-innerBandeau' );
	register_block_type(
		__DIR__ . '/build/4-dynamic',
		[ 'render_callback' => 'goueg_dynamic_render' ]
	);
	register_block_type( __DIR__ . '/build/6-imageInspiration' );
}
add_action( 'init', 'create_block_goueg_labo_blocktype_block_init' );

function goueg_dynamic_render (){
	return '<div>
		<h2>Bloc Dynamique pour remplacer des short codes...</h2>
			<ul>
				<li>ligne 1</li>
				<li>ligne 2</li>
				<li>ligne 3</li>
				<li>ligne 4</li>
			</ul>
			</div>';
;}

function ar_custom_category( $categories ) {
    $categories[] = [
    	'slug' => 'arinterieur',
    	'title' => 'Blocs spécifiques à Arinterieur',
    ];

    return $categories;
}
add_filter( 'block_categories_all', 'ar_custom_category' );
