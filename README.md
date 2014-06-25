New Pagination
=============

Author - Kaio Cesar

New Pagination - É uma librarty php para páginação no CodeIgniter.

### Instalação
1º adicione o arquivo /application/library/newpagination.php

2º adicione a "library" ao sistema, dinamicamente(./application/config/autoloader.php) ou estáticamente(ou na action do controller).

3º inicialização 
```
$this->newpagination->init(
	array(
		'per_page'		=> 4, 
		'total_rows'	=> $total,  // total de resultados obtidos (Tome cuidado com o "limit")
		'site_url'		=> site_url() // necessario que se carregue o modulo helper de url
	)
);
```



### change log
24/06/2014  - links de paginação estática por GET
			- links para ordenação de resultados estático por GET




