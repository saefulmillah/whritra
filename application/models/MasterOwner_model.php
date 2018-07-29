<?php 

/**
 * 
 */
class MasterOwner_model extends CI_Model
{
	var $select = "*";
  	var $table 	= "ms_owner";
	var $column_order 	= array('ownercode', 'ownername', 'createdby', 'createdon');
	var $column_search 	= array('ownercode', 'ownername', 'createdby', 'createdon');
	var $order = array('ownercode' => 'asc');
	
	function __construct()
	{
		parent::__construct();
	}

	public function getDataExport($startdate)
	{
	    $this->db->select($this->select);
	    $this->db->from($this->table);
	    $query = $this->db->get();
	    return $query->result_array();
	}

	private function _get_datatables_query()
	{
	    //add custom filter here
	    // if($this->input->post('start_date'))
	    // {
	    //     $this->db->where("DATE_FORMAT(`Waktu`,'%Y-%m-%d')", $this->input->post('start_date'));
	    // } else {
	    //     $this->db->where("DATE_FORMAT(`Waktu`,'%Y-%m-%d') >= CURDATE()");
	    // }

	    $this->db->select($this->select);
		$this->db->from($this->table);

	    $i = 0;
	 
	    foreach ($this->column_search as $item) // loop column 
	    {
	        if($_POST['search']['value']) // if datatable send POST for search
	        {
	             
	            if($i===0) // first loop
	            {
	                $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
	                $this->db->like($item, $_POST['search']['value']);
	            }
	            else
	            {
	                $this->db->or_like($item, $_POST['search']['value']);
	            }

	            if(count($this->column_search) - 1 == $i) //last loop
	                $this->db->group_end(); //close bracket
	        }
	        $i++;
	    }
	     
	    if(isset($_POST['order'])) // here order processing
	    {
	        $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	    } 
	    else if(isset($this->order))
	    {
	        $order = $this->order;
	        $this->db->order_by(key($order), $order[key($order)]);
	    }
	}

	function get_datatables()
	{
	    $this->_get_datatables_query();
	    if($_POST['length'] != -1)
	    $this->db->limit($_POST['length'], $_POST['start']);
	    $query = $this->db->get();
	    return $query->result();
	}

	function count_filtered()
	{
	    $this->_get_datatables_query();
	    $query = $this->db->get();
	    return $query->num_rows();
	}

	public function count_all()
	{
	    $this->db->select($this->select);
	    $this->db->from($this->table);
	    return $this->db->count_all_results();
	}
}