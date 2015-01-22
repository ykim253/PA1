<?php
	require_once 'php/connect.php';
	$conn = dbConnect();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>NBA Player Database</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/main.css">
	</head>
	<body>
		<h1>Welcome to the NBA Player Database</h1>
		<div class="mainContent">
			<form class="form-horizontal" role="form" method="get">
				<div class="form-group">
					<label class="col-sm-2 control-label" for="name">Database Search</label>
					<div class="input-group col-sm-9">
						<input id="name" name="name" type="text" class="form-control" placeholder="Type a player's name" />
						<span class="input-group-btn">
								<button type="button" class="btn btn-default btnSearch">
									<span class="glyphicon glyphicon-search">Search</span>
								</button>
						</span>
					</div>
				</div>
			</form>
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
            
                <table id="resultTable" class="table table-striped table-hover">
                    <thead>
                        <th>id</th>
                        <th>Player's Name</th>
                        <th>GP</th>
                        <th>FGP</th>
                        <th>TPP</th>
                        <th>FTP</th>
                        <th>PPG</th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
		</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript">
    	jQuery(document).ready(function($) {
    		$('.btnSearch').click(function(){
    			makeRequest();
    		});

            $('form').submit(function(e){
                e.preventDefault();
                makeRequest();
                return false;
            });

            function makeRequest() {
                $.ajax({
                    url: 'php/search.php',
                    type: 'get',
                    data: {name: $('input#name').val()},
                    success: function(response) {
                        $('table#resultTable').show();
                        $('table#resultTable tbody').html(response);
                    }
                });
            }
    	});
    </script>
	</body>
</html>