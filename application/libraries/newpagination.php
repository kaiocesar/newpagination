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
	
	// Items confi pagination
	public $total_rows = 0;
	public $per_page = 0;
	public $qtd_links = 0;
	public $links = "";
	public $url = "?";
	public $site_url = "";

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

		if ($this->per_page > 0 && $this->total_rows > 0) {
			$this->qtd_links = ceil($this->total_rows / $this->per_page);
			$this->make_pagination();
		}

	}


	/**
	 *	make_pagination
	 *	@author Kaio Cesar 
	 *	@return void
	 */
	public function make_pagination() {

		if (! $_SERVER['QUERY_STRING'] == null ) {
			$this->handler_url($_SERVER['QUERY_STRING']);			
		}
		
		//1- Generate links
		$links="";
		$count=0;
		

		for ($c=0; $c < $this->qtd_links; $c++) { 
			$count += $this->per_page;
			$links .= '<a href="'.$this->site_url . $this->url.'per_page='.$count.'">'.($c+1).'</a>';
		}

		$this->links = $links;

	}

	/**
	 *	handler_url
	 *	@author Kaio Cesar 
	 *	@todo Tratamento da query string vinda da url (Evita que perdemos os parametros GET)
	 *	@access private
	 *	@return void
	 */
	private function handler_url($qry_string=null) {
		if (is_null($qry_string)) {
			return false;
		}

		$p_get = explode("&", str_replace("?","", $_SERVER['QUERY_STRING']));
		$params = array();

		foreach ($p_get as $key => $get) {
			$exp_get = explode("=", $get);
			if ($exp_get[0] != 'per_page') {
				$params[] = $exp_get[0].'='.$exp_get[1];				
			}
		}

		$this->url = (count($params)) ? "?". implode("&", $params) ."&" : "?";

	}




} // end class Newpagination