<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/assets/ico/favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>/assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <div class="starter-template">
        <h1>Estendendo plugin "pagination" codeIgniter</h1>
        <div class="table-responsive">
	      <table class="table table-bordered">
	        <thead>
	          <tr>
	            <th  class="text-center"><a href="<?php echo current_url().'?cli_cod='.(int)$this->input->get('cli_cod').'&order_by=1'.'&per_page='.(int)$this->input->get('per_page'); ?>">Código <span class="caret"></span></a></th>
              <th  class="text-center"><a href="<?php echo current_url().'?cli_cod='.(int)$this->input->get('cli_cod').'&order_by=2'.'&per_page='.(int)$this->input->get('per_page'); ?>">Nome <span class="caret"></span></a></th>
	            <th  class="text-center"><a href="<?php echo current_url().'?cli_cod='.(int)$this->input->get('cli_cod').'&order_by=3'.'&per_page='.(int)$this->input->get('per_page'); ?>">Sigla <span class="caret"></span></a></th>
	          </tr>
	        </thead>
	        <tbody>
	          <?php 
              foreach ($estados as $key => $estado) {
                echo "<tr>";
                  echo "<td>".$estado->ID."</td>";
                  echo "<td>".$estado->NOME."</td>";
                  echo "<td>".$estado->SIGLA."</td>";
                echo "</tr>";
              }
            ?>
	        </tbody>
	      </table>
	    </div>
      <?php echo $pagination; ?>
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>
  </body>
</html>
