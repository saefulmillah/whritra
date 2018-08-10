<?php 
/**
 * 
 */
class Owner extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('MasterOwner_model', 'MasterOwner');
		// template
		$this->load->library('ion_auth');
		$this->load->model('menus_model', 'menu');
		$arrGroups = array('admin','StaffWH');
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		} 
		elseif (!$this->ion_auth->in_group($arrGroups))
		{
			$groups = '';
			$i=0;
			foreach ($arrGroups as $row) {
				$groups .= $arrGroups[$i].',';
				$i++;
			}
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be a part of '.$groups.' to view this page');
		}
	}

	public function index()
	{
		// layout
		$data = array(
			'title' => 'Owner',
			'multilevel' => $this->menu->get_menu_for_level($parent=0),
			'css'	=> array('css/dataTables.bootstrap4.min.css'),
			'js'	=> array(
							 	'js/jquery.dataTables.min.js',
							 	'js/dataTables.bootstrap4.min.js',
								'master/owner/script.js',
							),
			// 'multilevel' => $this->menu->get_menu_for_level($parent=0),
		);

		$layout = array('header' 	=> $this->load->view('_layout/_header', $data, TRUE),
						'navbar'	=> $this->load->view('_layout/_navbar', '', TRUE),
						'sidebar' 	=> $this->load->view('_layout/_sidebar', '', TRUE),
						'index'  	=> $this->load->view('master/owner/index', '', TRUE),
						'footer' 	=> $this->load->view('_layout/_footer', $data, TRUE),
						);

		$this->load->view('_layout/_main', $layout);
	}

	public function add()
	{
		$data = $this->load->view('master/owner/add', '', TRUE);
		echo $data;
	}

	public function main()
	{
		$data = $this->load->view('master/owner/main', '', TRUE);
		echo $data;
	}

	public function getDataTables()
	{
		$list = $this->MasterOwner->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $listowner) {
        	$no++;
        	$row = array();
        	$row[] = $no;
            $row[] = $listowner->ownercode;
            $row[] = $listowner->ownername;
            $row[] = $listowner->address;
            $row[] = $listowner->createdby;
            $row[] = $listowner->createdon;

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->MasterOwner->count_all(),
                        "recordsFiltered" => $this->MasterOwner->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

	public function save()
	{
		$data = array('ownercode' => $this->input->post('ownercode'), 
					  'ownername' => $this->input->post('ownername'), 
					  'address' => $this->input->post('ownername'), 
					  'createdby' => 'ADMIN', 
					  'createdon' => date('Y-m-d H:i:s'), 
					  'updatedby' => 'ADMIN', 
					  'updatedon' => date('Y-m-d H:i:s'), 
					);

		$query = $this->db->insert('ms_owner', $data);

		$is_success = $this->db->affected_rows();

		echo json_encode($is_success);
	}
}