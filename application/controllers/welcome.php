<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{


		$this->load->library('newpagination');
$this->load->helper('url');
		$this->newpagination->init(
				array(
					'per_page'		=>20,
					'total_rows'	=>100,
					'site_url'		=> site_url()
				)
		);

		echo $this->newpagination->links;


		exit;
		$this->load->helper('url');
		$this->load->helper('file');
		$this->load->library('pagination');


		// Getting datas
		$offset= (int)$_GET['per_page'];
		// items per page
		$select = 'select * from estados limit '.$offset.', 4';
		$result = $this->db->query( $select )->result();
		// total
		$select = 'select count(*) as total from estados';
		$total = $this->db->query( $select )->result();

		
		// Pagination
		$config['base_url'] = base_url() . "index.php?cli_cod=1";
        $config['total_rows'] = $total[0]->total;
        $config['per_page'] = 5;
        $config['page_query_string'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination pagination-lg">';
        $config['full_tag_close'] = '</ul>';
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        
        $data['objpag'] = $this->pagination;

		$data['estados']= $result;

		$this->load->view('welcome_message', $data);
	}
}