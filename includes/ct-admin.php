<?php
namespace ct;

class CTAdmin
{
    protected static $instance = null;

    public static function get_instance() 
    {
        // create an object
        NULL === self::$instance and self::$instance = new self;

        return self::$instance;
     }

    public function init()
    {   
        $this->fileInlcudes();

        add_action('admin_menu', array($this, 'menuItems')); 
    }

    public function fileInlcudes()
    {
        require_once CT_PLUGIN_DIR .'/includes/post-requests.php';
        require_once CT_PLUGIN_DIR .'/includes/ct-data.php';
        require_once CT_PLUGIN_DIR .'/includes/ct-listtable.php';
        require_once CT_PLUGIN_DIR .'/includes/ct-helper.php';
        require_once CT_PLUGIN_DIR .'/includes/ct-methods.php';
        require_once CT_PLUGIN_DIR .'/includes/ct-shortcodes.php';

    }

    public function menuItems()
    {
        add_menu_page('Clients', 'Clients', 'manage_options', 'clients', array($this, 'pageDashboard'));

        $PageA = add_submenu_page( 'clients', 'Dashboard', 'Dashboard', 'manage_options', 'clients', array($this, 'pageDashboard'));
        $PageB = add_submenu_page( 'clients', 'All Clients', 'All Clients', 'manage_options', 'ct-all-clients', array($this, 'pageAllClients') ); 
        $PageC = add_submenu_page( 'clients', 'Add New', 'Add New', 'manage_options', 'ct-add-new', array($this, 'pageAddNew') );         
        $PageD = add_submenu_page( 'clients', 'Settings', 'Settings', 'manage_options', 'ct-settings', array($this, 'pageSettings') ); 
       
        add_action('admin_print_scripts-' . $PageA, array($this, 'adminScriptStyles'));
        add_action('admin_print_scripts-' . $PageB, array($this, 'adminScriptStyles'));
        add_action('admin_print_scripts-' . $PageC, array($this, 'adminScriptStyles'));
        add_action('admin_print_scripts-' . $PageD, array($this, 'adminScriptStyles'));
        
    }

    public function adminScriptStyles()
    {
        if(is_admin()) 
        {
            wp_enqueue_media();        
            wp_enqueue_script( 'ct-ajax-request', plugins_url( 'clients/js/ct-admin.js' ), array( 'jquery' ), false, true );
            wp_enqueue_script( 'ct-think201-validator', plugins_url( 'clients/js/think201-validator.js' ), array( 'jquery' ), false, true );
            wp_localize_script( 'ct-ajax-request', 'CTAjax', array( 'ajaxurl' => plugins_url( 'admin-ajax.php' ) ) );
            wp_enqueue_style( 'ct-css', plugins_url( 'clients/assets/css/ct.css' ), array(), CT_VERSION, 'all' );
        }
    }

    public function pageDashboard()
    {
        require_once CT_PLUGIN_DIR .'/pages/admin-dashboard.php';     
    }

    public function pageAddNew()
    {
        require_once CT_PLUGIN_DIR .'/pages/admin-add-new.php';     
    }

    public function pageAllClients()
    {
        require_once CT_PLUGIN_DIR .'/pages/admin-all-clients.php';
    }

    public function pageSettings()
    {
        require_once CT_PLUGIN_DIR .'/pages/admin-settings.php';
    }
}
?>