<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{

		// Carregamento das libs e helpers
		$this->load->helper('url');
		$this->load->helper('file');
		$this->load->library('newpagination');


		// Obtenhos os dados
		$offset=isset($_GET['per_page']) ? (int)$_GET['per_page'] : 0;

		$this->db->select('*');
		$this->db->from('estados');
		$this->db->order_by("NOME", "ASC");
		$this->db->limit(4, $offset); // (LIMIT POR PÁGINA, id INDEX)
		$query=$this->db->get();
		$result=$query->result();

		// workround $total
		$sel="SELECT count(*) as total FROM estados";
		$res=$this->db->query($sel)->result();
		$total=$res[0]->total;

		$this->newpagination->init(
				array(
					'per_page'		=> 4,
					'total_rows'	=> $total,
					'site_url'		=> site_url()
				)
		);

		$data['pagination'] = $this->newpagination->links;


		$data['estados']= $result;

		$this->load->view('welcome_message', $data);
	}
}