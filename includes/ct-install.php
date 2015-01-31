<?php

class CT_Install
{

    //Function to Setup DB Tables
    public static function activate()
    {
        global $wpdb;

        $ct_clients = $wpdb->prefix.'ct_clients';

        $ct_clients_query = "CREATE TABLE IF NOT EXISTS $ct_clients(
        id INT(9) NOT NULL AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        url VARCHAR(300),
        description VARCHAR(500),
        category VARCHAR(100),
        logo VARCHAR(500),
        isfeatured BOOLEAN DEFAULT 0,
        client_since DATETIME,   
        created_at DATETIME NOT NULL,
        updated_at DATETIME NOT NULL,
        misc VARCHAR(50),
        status TINYINT(5) DEFAULT 1,
        Primary Key id (id)
        )ENGINE=InnoDB DEFAULT CHARSET=utf8;";

        $wpdb->query($ct_clients_query); 

        require_once 'ct-data.php';

        ct\CTData::addCategory('General');
    }

    public static function deactivate()
    {
      return true;
    }

    public static function delete()
    {
        global $wpdb;

        $table_prefix = $wpdb->prefix;

        $ct_clients = $table_prefix.'ct_clients';

        $ct_clients_query = "DROP TABLE $ct_clients;";
        
        $wpdb->query($ct_clients_query);
    }
}

?>