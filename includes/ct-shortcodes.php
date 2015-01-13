<?php
namespace ct;
	
add_shortcode( "clients_all", array(CTShortCodes::get_instance(), 'getAll'));
add_shortcode( "clients_featured", array(CTShortCodes::get_instance(), 'getFeatured'));

class CTShortCodes
{
    protected static $instance = null;

    public static function get_instance() 
    {
        // create an object
        NULL === self::$instance and self::$instance = new self;

        return self::$instance;
    }

    public static function getAll()
    {
        $Lists = CTData::getClientList();

        $Output = CTShortCodes::_processList($Lists);

        return $Output;
    }

    public static function getFeatured()
    {
        $Lists = CTData::getFeaturedClients();

        $Output = CTShortCodes::_processList($Lists);

        return $Output;
    }

    private static function _processList($ClientList)
    {
        $Output = '<ul class="client-list">';

        foreach($ClientList as $Client)
        {
            $Output .= '<li><a href="'.addhttp($Client->url).'" target="_blank">'.$Client->name.'</a></li>';
        }

        $Output .= '</ul>';

        return $Output;
    }    
}

?>