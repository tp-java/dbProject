<!DOCTYPE html>
<html>
  <head>
  	<meta charset="utf-8">
    <title>Личный кабинет</title>
    <link href="../static/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="../static/css/user.css">
  </head>
  <body style="padding-top: 40px;">
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">	
			<div class="container">
				<ul class="nav pull-right">
				<li class="divider-vertical"></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php $_SESSION['initials'] ?><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="/logout.php">выйти</a></li>
					</ul>
				</li>
				</ul>
			</div>
		</div>	
	</div>
	<div class="title">
	    <h1>Клиенты</h1>
	</div>
	<div class="row-fluid">
		<div class="span8 offset2">
			<table class="table table-striped">
				<thead>
					<tr>
						<th class="table__cell table__cell_fio">Фамилия</th>
						<th class="table__cell table__cell_fio">Имя</th>
						<th class="table__cell table__cell_fio">Отчество</th>
						<th class="table__cell table__cell_address">Адрес</th>
						<th class="table__cell table__cell_comment">Комментарий</th>
						<th class="table__cell table__cell_status">Статус</th>		
					</tr>
				</thead>
          <tbody>
          <?php
            foreach ($clients as $client) {
              include('user_client_row_tpl.php');              
            }
          ?>
          </tbody>
			</table>
		</div>
	</div>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../static/js/bootstrap.min.js"></script>
    <script src="../static/js/user.js"></script>
  </body>
</html>
					