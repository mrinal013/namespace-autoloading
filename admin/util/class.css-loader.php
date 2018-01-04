<?php
namespace Namespace_Demo\Admin\Util;

class CSS_Loader implements Assets_Interface {
	public function init() {
		add_action("admin_enqueue_scripts", array($this, "enqueue"));
	}

	public function enqueue() {
		wp_enqueue_style(
			"namespace",
			plugins_url("assets/css/admin.css", dirname(__FILE__) ),
			array(),
			filemtime( plugin_dir_path(dirname(__FILE__)) . "assets/css/admin.css" ),
			false
			);
	}
}