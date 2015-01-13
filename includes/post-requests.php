<?php
namespace ct;
/**
 * @package Internals
 */

// Action hook for AJAX Request
add_action('wp_ajax_page_add_new', array('ct\PostData', 'addNew'));


class PostData
{
	public static function addNew()
	{
		// Get the form data
		$Data = self::getData();
	
		// Insert data into DB
		$RetVal = self::addData($Data);

		if($RetVal)
		{
			$msg = 'Successfully added';
		}
		else
		{
			$msg = 'Oops, there seems to be some issue.';
		}

		$response = array('status' => $RetVal, 'msg' 	=> $msg);
		
		wp_send_json($response);
	}

	public static function getData()
	{
		$Data = array();

		$Data['name'] 				= isset($_POST['name']) ? $_POST['name'] : ''; 	
		$Data['description'] 		= isset($_POST['description']) ? $_POST['description'] : ''; 	

		$Data['url'] 				= isset($_POST['url']) ? $_POST['url'] : '';		
		$Data['logo'] 				= isset($_POST['logo']) ? $_POST['logo'] : '';
		$Data['description'] 		= isset($_POST['description']) ? $_POST['description'] : '';		

		$Data['category'] 			= isset($_POST['category']) ? $_POST['category'] : ''; 
		$Data['isfeatured'] 		= $_POST['isfeatured'] == "1"? 1: 0;		


		$Data['created_at']     	= date('Y-m-d H:i:s');
		$Data['updated_at'] 		= date('Y-m-d H:i:s'); 

		$Data['misc'] 				= ''; 
		$Data['status'] 			= 1;

		return $Data;
	}

	public static function addData($Data)
	{
		global $wpdb;

		$table_prefix = $wpdb->prefix;
		$ct_clients = $table_prefix.'ct_clients';
		
		$wpdb->insert($ct_clients, $Data,	array('%s', '%s', '%s', '%s', '%s', '%s', '%d','%s', '%s','%s','%d') ); 

		return true;
	}
}
?>