<?php
/*
Plugin Name: Clients
Plugin URI: http://labs.think201.com
Description: Clients (CT) helps you find and replace phrases at ease
Author: Think201
Version: 1.1.1
Author URI: http://labs.think201.com
License: GPL v1

Clients
Copyright (C) 2015, Think201 - hello@think201.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.
See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
/**
 * @package Main
 */

if(version_compare(PHP_VERSION, '5.2', '<' )) 
{
	if (is_admin() && (!defined( 'DOING_AJAX' ) || !DOING_AJAX )) 
	{
		require_once(ABSPATH . 'wp-admin/includes/plugin.php');
		deactivate_plugins( __FILE__ );
		wp_die( sprintf( __( 'Clients requires PHP 5.2 or higher, as does WordPress 3.2 and higher. The plugin has now disabled itself.', 'Mins To Read' ), '<a href="http://wordpress.org/">', '</a>' ));
	} 
	else 
	{
		return;
	}
}

if ( !defined( 'CT_PATH' ) )
define( 'CT_PATH', plugin_dir_path( __FILE__ ) );

if ( !defined( 'CT_BASENAME' ) )
define( 'CT_BASENAME', plugin_basename( __FILE__ ) );

if ( !defined( 'CT_VERSION' ) )
define('CT_VERSION', '1.1.1' );

if ( !defined( 'CT_PLUGIN_DIR' ) )
define('CT_PLUGIN_DIR', dirname(__FILE__) );

if ( ! defined( 'CT_LOAD_JS' ) )
define( 'CT_LOAD_JS', true );

if ( ! defined( 'CT_LOAD_CSS' ) )
define( 'CT_LOAD_CSS', true );

require_once CT_PLUGIN_DIR .'/includes/ct-install.php';
require_once CT_PLUGIN_DIR .'/includes/ct-admin.php';

register_activation_hook( __FILE__, array('CT_Install', 'activate') );
register_deactivation_hook( __FILE__, array('CT_Install', 'deactivate') );
register_uninstall_hook( __FILE__, array('CT_Install', 'delete') );

add_action( 'plugins_loaded', 'ClientsStart' );

function ClientsStart()
{
	$initObj = ct\CTAdmin::get_instance();
	$initObj->init();
}

function getClients($Config = array())
{
	$List = ct\CTData::getClientList($Config);

	foreach ($List as $key => $Client) 
	{
		unset($Client->category);
		unset($Client->isfeatured);
		unset($Client->client_since);
		unset($Client->created_at);
		unset($Client->updated_at);
		unset($Client->misc);
		unset($Client->status);
	}

	return $List;
}

?>