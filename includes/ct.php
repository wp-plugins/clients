<?php
namespace ct;

// Action hook for AJAX Request
add_action('wp_ajax_post_er_form', array('er\EasyReplace', 'captureForm'));

class Clients
{
	protected static $instance = null;

	public function __construct()
    {
    }

    public static function get_instance() 
    {
	 	// create an object
	 	NULL === self::$instance and self::$instance = new self;

	 	return self::$instance;
	 }

    // Initiation Hook
    public function init()
    {
        

    }
}

?>