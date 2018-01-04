<?php
/*
* Plugin Name: Namespace by Mrinal
*/
if(!defined('WPINC')) {
	exit("No Entry");
}

use Namespace_Demo\Admin;
use Namespace_Demo\Admin\Util;

require_once( trailingslashit( dirname( __FILE__ ) ) . 'inc/autoloader.php' );

add_action("plugins_loaded", array("mainClass", "init") );

class mainClass {
	private $cssloader;

	public static function init() {
		$class = __CLASS__;
		new $class;
	}
	public function __construct() {
		add_action('add_meta_boxes', array($this, 'metaBox' ));
		$this->cssloader = new Util\CSS_Loader();
		$this->cssloader->init();

	}
	public function metaBox() {
		$meta_box = new Admin\Meta_Box( new Admin\Meta_Box_Display( new Util\Question_Reader() ) );
		$meta_box->init();
	}
}