<?php
namespace ct;

class CTData
{
	public static function getClientList()
	{
		global $wpdb;

		$table_prefix = $wpdb->prefix;
		$ct_clients = $table_prefix.'ct_clients';	
		
		$QueryforData = $wpdb->prepare( "SELECT * FROM $ct_clients WHERE status = %s", 1);
		$Data = $wpdb->get_results($QueryforData);

		return $Data;
	}

	public static function getFeaturedClients()
	{
		global $wpdb;

		$table_prefix = $wpdb->prefix;
		$ct_clients = $table_prefix.'ct_clients';	
		
		$QueryforData = $wpdb->prepare( "SELECT * FROM $ct_clients WHERE status = %s AND isfeatured = %s" , 1, 1);
		$Data = $wpdb->get_results($QueryforData);

		return $Data;
	}

	public static function getClientInfo($id)
	{
		global $wpdb;

		$ct_clients = $wpdb->prefix.'ct_clients';	

		$Query = $wpdb->prepare( "SELECT * FROM $ct_clients WHERE id = %d AND status = %s", $id, 1);	
		$Data = $wpdb->get_row($Query);

		return $Data;
	}
}
?>