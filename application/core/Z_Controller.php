<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Z_Controller extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}


	function load_view($template, $data = array())
	{

		$this->load->view('layouts/header');
		$this->load->view($template, $data);
		$this->load->view('layouts/footer_js');
		$this->load->view($template . '_js');			
		$this->load->view('layouts/footer');
	}


	function debug()
	{
		$numArgs = func_num_args();
		echo 'Total Arguments:' . $numArgs . "\n";
		$args = func_get_args();
		echo '<pre>';
		foreach ($args as $index => $arg) {
			echo 'Argument ke-' . $index . ':' . "\n";
			var_dump($arg);
			echo "\n";
			unset($args[$index]);
		}
		echo '</pre>';
		die();
	}

	function json_response($data)
	{
		$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
			->_display();
		exit();
	}
}

/**
 * End of file Z_Controller.php
 * File location : ./application/core/Z_Controller.php
 */
