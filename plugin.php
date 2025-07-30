<?php
/**
 * Plugin Name: Mini FAIR
 * Description: Create your own FAIR node.
 * Version: 0.1
 * Author: FAIR Contributors
 * License: GPLv2
 * Requires at least: 5.0
 * Requires PHP: 7.4
 * Text Domain: mini-fair
 */

namespace MiniFAIR;

require __DIR__ . '/inc/namespace.php';
require __DIR__ . '/inc/admin/namespace.php';
require __DIR__ . '/inc/api/namespace.php';
require __DIR__ . '/inc/git-updater/namespace.php';
require __DIR__ . '/inc/keys/namespace.php';
require __DIR__ . '/inc/plc/namespace.php';
require __DIR__ . '/inc/plc/util.php';
require __DIR__ . '/vendor/autoload.php';

bootstrap();

add_filter( 'upgrader_clear_destination', function( $clear_destination, $hook_extra ) {
    // $hook_extra['plugin'] is set when installing/updating a plugin via the UI/upgrader
    if ( ! empty( $hook_extra['plugin'] ) 
      && strpos( $hook_extra['plugin'], 'mini-fair/' ) === 0 
    ) {
        // true = delete the existing directory before unpacking
        return true;
    }
    return $clear_destination;
}, 10, 2 );
