<?php
namespace Namespace_Demo\Admin;
/*
* Represents a meta box to be displayed within the 'Add new post' page
*
* This class maintains a reference to a display object responsible for displaying whatever content is rendered within the meta box
*/
class Meta_Box {
	/**
	* A reference to the metaBoxDisplay class
	* @access private
	*/
	private $display;
	/**
	* constructor function of metaBox class. It receive metaBoxDisplay class and set it as this->display
	* @access public
	* @param metaBoxDisplay $display variable
	*/
	public function __construct($display) {
		$this->display = $display;
	}

	/**
	* Registers meta box with WordPress
	*/
	public function init() {
		add_meta_box(
			'namespace-meta-box',
			'Inspiration quotation',
			array($this->display, 'render'),
			'post',
			'side',
			'high'
		);
	}
}