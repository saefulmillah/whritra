<?php 
/**
 * 
 */
class Owner extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// layout
		$data = array(
			'title' => 'Owner', 
			// 'multilevel' => $this->menu->get_menu_for_level($parent=0),
		);

		$layout = array('header' 	=> $this->load->view('_layout/_header', '', TRUE),
						'navbar'	=> $this->load->view('_layout/_navbar', '', TRUE),
						'sidebar' 	=> $this->load->view('_layout/_sidebar', '', TRUE),
						'index'  	=> $this->load->view('master/owner/index', '', TRUE),
						'js' 		=> 'master/owner/script.js',
						'footer' 	=> $this->load->view('_layout/_footer', '', TRUE),
						);

		$this->load->view('_layout/_main', $layout);
	}
}