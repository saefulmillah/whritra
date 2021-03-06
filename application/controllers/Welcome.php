<?php 
/**
 * 
 */
class Welcome extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('MasterHub_model', 'MasterHub');
	}

	public function index()
	{
		// layout
		$data = array(
			'title' => 'Master Hub',
			'css'	=> array('css/dataTables.bootstrap4.min.css'),
			'js'	=> array(
							 	'js/jquery.dataTables.min.js',
							 	'js/dataTables.bootstrap4.min.js',
								'master/hub/script.js',
							),
			// 'multilevel' => $this->menu->get_menu_for_level($parent=0),
		);

		$layout = array('header' 	=> $this->load->view('_layout/_header', $data, TRUE),
						'navbar'	=> $this->load->view('_layout/_navbar', '', TRUE),
						'sidebar' 	=> $this->load->view('_layout/_sidebar', '', TRUE),
						'index'  	=> $this->load->view('master/hub/index', '', TRUE),
						'footer' 	=> $this->load->view('_layout/_footer', $data, TRUE),
						);

		$this->load->view('_layout/_main', $layout);
	}

	public function add()
	{
		$data = $this->load->view('master/hub/add', '', TRUE);
		echo $data;
	}

	public function main()
	{
		$data = $this->load->view('master/hub/main', '', TRUE);
		echo $data;
	}

	public function getDataTables()
	{
		$list = $this->MasterHub->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $listhub) {
        	$no++;
        	$row = array();
        	$row[] = $no;
            $row[] = $listhub->hubcode;
            $row[] = $listhub->hubname;
            $row[] = $listhub->createdby;
            $row[] = $listhub->createdon;

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->MasterHub->count_all(),
                        "recordsFiltered" => $this->MasterHub->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

	public function save()
	{
		$data = array('hubcode' => $this->input->post('hubcode'), 
					  'hubname' => $this->input->post('hubname'), 
					  'createdby' => 'ADMIN', 
					  'createdon' => date('Y-m-d H:i:s'), 
					  'updatedby' => 'ADMIN', 
					  'updatedon' => date('Y-m-d H:i:s'), 
					);

		$query = $this->db->insert('ms_hub', $data);

		$is_success = $this->db->affected_rows();

		echo json_encode($is_success);
	}
}