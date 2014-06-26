<?php
/**
 *	New Pagination
 * 
 *	@author Kaio Cesar <tecnico.kaio@gmail.com> 
 * 	@todo Primeira páginação dinamica
 * 	@version 0.0.1
 * 	
 */


class Newpagination {
	
	/**
	 *	Items de configuração da páginação
	 */
	public $total_rows = 0;
	public $per_page = 0;
	public $qtd_links = 0;
	public $links = "";
	public $concat_char="?";
	public $url = "";
	public $url_order = "";
	public $site_url = "";
	public $txt_per_page = "per_page";
	public $txt_order_by = "order";
	public $limit_links = 3;



	/**
	 *	init
	 *	@author Kaio Cesar 
	 *	@return void
	 */
	public function init($args=array()) {

		if (count($args)) {
			foreach ($args as $key => $value) {
				switch ($key) {
					case 'total_rows':
						$this->total_rows = $value;
					break;
					case 'per_page':
						$this->per_page = $value;
					break;
					case 'site_url':
						$this->site_url = $value;
					break;
				}		
			}	

		}

		// initializate
		if ($this->per_page > 0 && $this->total_rows > 0) {
			$this->qtd_links = ceil($this->total_rows / $this->per_page);
			$this->make_pagination();
		}

		// set active link
		if (isset($_GET['per_page'])) {

		}

		// set active link
		if (isset($_GET['per_page'])) {

		}		
	}


	/**
	 *	make_pagination
	 *	@author Kaio Cesar 
	 *	@return void
	 */
	public function make_pagination() {

		if (! $_SERVER['QUERY_STRING'] == null ) {
			$this->handler_url($_SERVER['QUERY_STRING'], array($this->txt_per_page));			
		}
		
		$per_page=(isset($_GET['per_page']))? (int)$_GET['per_page'] : 0;

		//1- Generate links
		$links="";
		$count=0;
		$d=0;
		for ($c=0; $c < $this->qtd_links; $c++) { 
			if ($c >= $this->limit_links) {
				break;
			}
			$active = ($per_page==$count) ? ' class="active" ' : "";
			$links .= '<li '.$active.' ><a href="'.$this->site_url . $this->url.$this->concat_char.$this->txt_per_page.'='.$count.'">'.($c+1).'</a></li>';
			$count += $this->per_page;
			

			$d++;
		}

		$this->links = '<ul class="pagination">';
		$this->links .= '<li><a href="'.$this->site_url . $this->url.$this->concat_char.$this->txt_per_page.'=0">&lt;&lt;</a></li>';
		$this->links .= $links;
		$this->links .= '<li><a href="'.$this->site_url . $this->url.$this->concat_char.$this->txt_per_page.'='.(2* $per_page).'">&gt;</a></li>';
		$this->links .= '<li><a href="'.$this->site_url . $this->url.$this->concat_char.$this->txt_per_page.'='.($this->qtd_links*$this->per_page-$this->per_page).'">&gt;&gt;</a></li></ul>';
	}


	/**
	 *	handler_url
	 *	@author Kaio Cesar 
	 *	@todo Tratamento da query string vinda da url (Evita que perdemos os parametros GET)
	 *	@access private
	 *	@return void
	 */
	private function handler_url($qry_string=null,$restrict=array()) {
		if (empty($qry_string) || is_null($qry_string)) {
			return "";
		}
		$params_get = explode("&", str_replace("?","", $qry_string));
		$params = $this->restrict_items_url($params_get, $restrict);
		$this->url = (count($params)) ? "?". implode("&", $params) : "";
		$this->concat_char = (count($params)) ? "&" : "?";
	}

	/**
	 *	restrict_items_url
	 *	@author Kaio Cesar 
	 *	@todo Tratamento dos parametos que apareceram na url final.
	 *	@access private
	 *	@return string
	 */
	private function restrict_items_url($list=null,$items=array()) {

		$params = array();
		foreach ($list as $key => $get) {
			$exp_get = explode("=", $get);
			if (count($exp_get)) {				
				if ( ! in_array($exp_get[0], $items) ) {
					$params[] = $exp_get[0].'='.$exp_get[1];				
				}
			}
		}		
		return $params;
	}


	/**
	 *	make_link_orderby
	 *	@author Kaio Cesar 
	 *	@todo 
	 *	@return string
	 */
	public function make_link_orderby($value=null){
		if (is_null($value)) {
			return "";
		}
		$url_order = site_url();		
		$this->handler_url($_SERVER['QUERY_STRING'], array($this->txt_order_by)); 
		$url_order .= $this->url . $this->concat_char;
		return  $url_order . $this->txt_order_by . "=".$value;
	}


} // end class Newpagination