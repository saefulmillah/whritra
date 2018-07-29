<?php 

/**
 * 
 */
class Warehouse extends CI_Controller
{
	var $path = 'master/warehouse/';
	function __construct()
	{
		parent::__construct();
		$this->load->model('MasterWarehouse_model', 'MasterWarehouse');
	}

	public function index()
	{
		// layout
		$data = array(
			'title' => 'Master Warehouse',
			'css'	=> array('css/dataTables.bootstrap4.min.css'),
			'js'	=> array(
							 	'js/jquery.dataTables.min.js',
							 	'js/dataTables.bootstrap4.min.js',
								$this->path.'script.js',
							),
			// 'multilevel' => $this->menu->get_menu_for_level($parent=0),
		);

		$layout = array('header' 	=> $this->load->view('_layout/_header', $data, TRUE),
						'navbar'	=> $this->load->view('_layout/_navbar', '', TRUE),
						'sidebar' 	=> $this->load->view('_layout/_sidebar', '', TRUE),
						'index'  	=> $this->load->view($this->path.'index', '', TRUE),
						'footer' 	=> $this->load->view('_layout/_footer', $data, TRUE));

		$this->load->view('_layout/_main', $layout);
	}

	public function add()
	{
		$data = $this->load->view($this->path.'add', '', TRUE);
		echo $data;
	}

	public function main()
	{
		$data = $this->load->view($this->path.'main', '', TRUE);
		echo $data;
	}

	public function getDataTables()
	{
		$list = $this->MasterWarehouse->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $listwarehouse) {
        	$no++;
        	$row = array();
        	$row[] = $no;
            $row[] = $listwarehouse->whcode;
            $row[] = $listwarehouse->whname;
            $row[] = $listwarehouse->address;
            $row[] = $listwarehouse->createdby;
            $row[] = $listwarehouse->createdon;

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->MasterWarehouse->count_all(),
                        "recordsFiltered" => $this->MasterWarehouse->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

	public function save()
	{
		$data = array('whcode' => $this->input->post('whcode'), 
					  'whname' => $this->input->post('whname'), 
					  'address' => $this->input->post('whaddress'), 
					  'createdby' => 'ADMIN', 
					  'createdon' => date('Y-m-d H:i:s'), 
					  'updatedby' => 'ADMIN', 
					  'updatedon' => date('Y-m-d H:i:s'), 
					);

		$query = $this->db->insert('ms_warehouse', $data);

		$is_success = $this->db->affected_rows();

		echo json_encode($is_success);
	}
}