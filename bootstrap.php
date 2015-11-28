<?php

if( !class_exists('MVC_Plugin') ):

class MVC_Plugin {
	
	private $path;
	
	/*
	*  __construct
	*
	*  
	*
	*  @type	function
	*  @date	9/25/15
	*  @since	1.0.0
	*
	*  @param	N/A
	*  @return	N/A
	*/
	
	function __construct() {
		$this->path = plugin_dir_path( __FILE__ );
		add_action('admin_menu', array($this, 'mvc_admin_menu'));
		spl_autoload_register(array($this,'mvc_directory_autoloader'));
	}
	
	/*
	*  mvc_admin_menu
	*
	*  This function will add the MVC Plugin menu item to the WP admin
	*
	*  @type	action (admin_menu)
	*  @date	9/25/15
	*  @since	1.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function mvc_admin_menu() {
		
		add_menu_page( 'MVC Plugin', 'MVC Plugin', 'manage_options', 'mvc-plugin', array($this, 'mvc_plugin_render'), 'dashicons-backup', 90 );		
	}
	
	
	/*
	*  mvc_plugin_options
	*
	*  This function will render the appropriate view
	*
	*  @type	function
	*  @date	9/25/15
	*  @since	1.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function mvc_plugin_render(){
        $model = new Model($this->path);
		$controller = new Controller($model);
		$view = new View($model);
		if (isset($_REQUEST['mvc_view'])) $controller->render($_REQUEST['mvc_view']);
		$view->output();
	}
	
	
	/*
	*  mvc_plugin_options
	*
	*  This function auto loads the classes contained in the mvc structure
	*  Note that this function is used with spl_autoload_register to load classes
	*  from multiple directories
	*
	*  @type	function
	*  @date	9/25/15
	*  @since	1.0.0
	*
	*  @param	$field (string)
	*  @return	n/a
	*/
	function mvc_directory_autoloader($class_name){
	    $array_paths = array(
			'model/',
			'view/',
	        'controller/'
	    );
	
	    foreach($array_paths as $path)
	    {
	        $file = plugin_dir_path( __FILE__ ).$path.$class_name.'.php';
	        
	        if(is_file($file)) 
	        {
	            include_once $file;
	        } 
	    }
	}
	
	/*
	*  mvc_plugin_options
	*
	*  This function auto loads the classes contained in the mvc structure
	*  Note that this function is used with spl_autoload_register to load classes
	*  from multiple directories
	*
	*  @type	function
	*  @date	9/25/15
	*  @since	1.0.0
	*
	*  @param	$field (string)
	*  @return	n/a
	*/
	function mvc_enqueue_scripts($class_name){
		
		
	}
	
}// End MVC_Pluginer

$bulk_import = new MVC_Plugin();

endif;