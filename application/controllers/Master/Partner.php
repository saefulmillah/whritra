<?php 
/**
 * 
 */
class Partner extends CI_Controller
{
	var $path = 'master/partner/';
	function __construct()
	{
		parent::__construct();
		$this->load->model('MasterPartner_model', 'MasterPartner');
	}

	public function index()
	{
		// layout
		$data = array(
			'title' => 'Master Partner',
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
						'footer' 	=> $this->load->view('_layout/_footer', $data, TRUE),
						);

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
		$list = $this->MasterPartner->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $listpartner) {
        	$no++;
        	$row = array();
        	$row[] = $no;
            $row[] = $listpartner->partnercode;
            $row[] = $listpartner->partnername;
            $row[] = $listpartner->address;
            $row[] = $listpartner->createdby;
            $row[] = $listpartner->createdon;

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->MasterPartner->count_all(),
                        "recordsFiltered" => $this->MasterPartner->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

	public function save()
	{
		$data = array('partnercode' => $this->input->post('partnercode'), 
					  'partnername' => $this->input->post('partnername'), 
					  'address' => $this->input->post('partneraddress'), 
					  'createdby' => 'ADMIN', 
					  'createdon' => date('Y-m-d H:i:s'), 
					  'updatedby' => 'ADMIN', 
					  'updatedon' => date('Y-m-d H:i:s'), 
					);

		$query = $this->db->insert('ms_partner', $data);

		$is_success = $this->db->affected_rows();

		echo json_encode($is_success);
	}
}