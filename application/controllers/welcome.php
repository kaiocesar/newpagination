<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index() {

		//Get
		$offset=isset($_GET['per_page']) ? (int)$_GET['per_page'] : 0;
		$order=isset($_GET['order']) ? (int)$_GET['order'] : 0;

		$order_arr = array(
			0 => array('ID','DESC'),
			1 => array('NOME','ASC'),
			2 => array('SIGLA','ASC'),
		);

		// Carregamento das libs e helpers
		$this->load->helper('url');
		$this->load->helper('file');
		$this->load->library('newpagination');


		// Obtenhos os dados		
		$this->db->select('*');
		$this->db->from('estados');
		$this->db->order_by($order_arr[$order][0], $order_arr[$order][1]);
		$this->db->limit(3, $offset); // (LIMIT POR PÁGINA, id INDEX)
		$query=$this->db->get();
		$result=$query->result();

		// workround $total
		$sel="SELECT count(*) as total FROM estados";
		$res=$this->db->query($sel)->result();
		$total=$res[0]->total;

		$this->newpagination->init(
				array(
					'per_page'	 => 3,
					'total_rows' => $total,
					'site_url'	 => site_url()
				)
		);

		$data['pagination'] = $this->newpagination->links;
		$data['pagination_url'] = $this->newpagination;
		$data['estados']= $result;

		$this->load->view('welcome_message', $data);
	}


}