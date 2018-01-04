<?php
namespace Namespace_Demo\Admin\Util;
/**
* This class is used to populate the content of the meta box
*/
class Question_Reader {
	/**
	* Retrives the question from file
	* @access public
	*/
	public function get_question_from_file($filename) {
		$question = '';

		$file_handle = $this->open($filename);
		$question = $this->get_random_question($file_handle, $filename);
		$this->close($file_handle);
		return $question;
	}
	/**
	* Opens the file for reading and return resource
	* @access private
	* @param string $filename file path
	* @return resource
	*/
	private function open($filename) {
		return fopen($filename, 'r');
	}
	/**
	* Close the file
	* @access private
	* @param $file_handle Resource of the file
	*/
	private function close($file_handle) {
		fclose($file_handle);
	}
	/**
	* Opens the file for reading and return the resource to the file
	* @access private
	*/
	private function get_random_question( $file_handle, $filename ) {
		$questions = fread($file_handle, filesize($filename));
		$questions = explode("\n", $questions);
		$questionCount = count($questions);

		$question = $questions[ rand(1, $questionCount) ];
		while(empty($question)) {
			$question = $questions[ rand(1, $questionCount) ];
		}

		return $question;
	}
}