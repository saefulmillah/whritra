<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		// layout
		$data = array(
			'title' => 'Transaction', 
			// 'multilevel' => $this->menu->get_menu_for_level($parent=0),
		);

		$layout = array('header' 	=> $this->load->view('_layout/_header', '', TRUE),
						'navbar'	=> $this->load->view('_layout/_navbar', '', TRUE),
						'sidebar' 	=> $this->load->view('_layout/_sidebar', '', TRUE),
						'index'  	=> $this->load->view('master/hub/index', '', TRUE),
						'js' 		=> 'master/hub/script.js',
						'footer' 	=> $this->load->view('_layout/_footer', '', TRUE),
						);

		$this->load->view('_layout/_main', $layout);
	}
}
