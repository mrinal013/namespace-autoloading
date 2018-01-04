<?php
namespace Namespace_Demo\Admin;
/**
* This class is used to display file's question
*/
class Meta_Box_Display {
	/**
	* use to store get_question_from_file() from questionReader class
	* @access private
	*/
	private $question_reader;


	public function __construct($question_reader) {
		$this->question_reader = $question_reader;
	}

	private function sanitized_html($html) {
		$allowed_html = array(
			'p'	=> array(
				'id'=>array()
			),
		);
		return wp_kses($html, $allowed_html);
	}

	/**
	* this method is used to add_meta_box() 3rd parameter
	* @access public
	*/
	public function render() {
		$file = dirname( __FILE__ ) . '/data/questions.txt';
		$question = $this->question_reader->get_question_from_file($file);
		$html = "<p id='namespace'>$question</p>";
		echo $this->sanitized_html($html);
	}
}