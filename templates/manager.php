<!DOCTYPE html>
<html>
  <head>
  	<meta charset="utf-8">
    <title>Личный кабинет</title>
    <link href="../static/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="../static/css/user.css">
  </head>
  <body style="padding-top: 40px;">

  	<a href="#myModal" role="button" class="btn" data-toggle="modal">Launch demo modal</a>
 


	<div class="modal fade-in hide overlay" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width: 70%;left: 450px">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h3 id="myModalLabel" class="title">Звонок</h3>
	  </div>
	  <div class="modal-body">
	  	<div class="title">
	  		<h4>Фамилия Имя Отчество</h4>
	  	</div>
	  	<div class="form-horizontal call__body">
	  		<div class="control-group">
				<label class="control-label lead" for="inputWarning">телефон:</label>
				<div class="controls lead value">
					+7 934 23 23 322
				</div>
			</div>	

			<div class="control-group">
				<label class="control-label lead" for="inputWarning">Адрес:</label>
				<div class="controls lead value">
					ул. Подбельского д. 4 кв. 228
				</div>
			</div>	
			<div class="control-group">
				<label class="control-label lead" for="inputWarning">Адрес:</label>
				<div class="controls">
					<input class="input-xlarge" type="text">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label lead" for="inputWarning">Адрес:</label>
				<div class="controls">
					<select name="result">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
			</div>
			  <div class="control-group">
    <label class="control-label" for="inputPassword">Пароль</label>
    <div class="controls">
      <input type="password" id="inputPassword" placeholder="Пароль">
    </div>
  </div>
			
	  	</div>
	    
	  </div>
	  <div class="modal-footer">
	    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	    <button class="btn btn-primary">Save changes</button>
	  </div>
	</div>



  	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">	
			<div class="container">
				<ul class="nav pull-right">
				<li class="divider-vertical"></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Имя Фамилия Звонилки <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#">выйти</a></li>
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

		<div class="span3 bs-docs-sidebar ">
			<div class="sidebar-container">
			<ul class="nav nav-list bs-docs-sidenav mysidebar">
				<li class="active"><a href="#"><i class="icon-chevron-right"></i> Мои клиенты</a></li>
        <?php
          foreach ($users as $user) {
            include('manager_user_row_tpl.php');              
          }
        ?>
			</ul>
			</div>
		</div>

		<div class="span8">
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