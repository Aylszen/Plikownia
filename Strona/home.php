<?php

session_start();

if (!isset($_SESSION['zalogowany']))
{
	header('Location: index.php');
	exit();
}
if(!isset($_SESSION['startDirection']))
{
	$_SESSION['startDirection']="FILES/".$_SESSION['user']."/";
	//echo $_SESSION['startDirection'];
}

?>
<!DOCTYPE HTML>
<html lang="pl">
	<head>
		<meta charset="utf-8" />
		<!--strona dopasowuje się do szerokości ekranu w pikselach niezależnych od urządzenia.
		Atrybut initial-scale=1 poleca przeglądarce ustanowić relację 1:1 między pikselami CSS a pikselami niezależnymi od urządzenia, bez względu na jego orientację. 
		To pozwala wykorzystać pełną szerokość strony w trybie poziomym.-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Plikownia</title>
		<link rel="icon" href="/img/ico/favicon.ico">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<link rel="stylesheet" href="css/home.css" type=text/css media="all">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
			 function pagination(){
					var req_num_row=4;
					var $tr=jQuery('tbody tr');
					var total_num_row=$tr.length;
					var num_pages=0;
					if(total_num_row % req_num_row ==0){
						num_pages=total_num_row / req_num_row;
					}
					if(total_num_row % req_num_row >=1){
						num_pages=total_num_row / req_num_row;
						num_pages++;
						num_pages=Math.floor(num_pages++);
					}
					for(var i=1; i<=num_pages; i++){
						jQuery('#pagination').append("<span>"+i+"</span>");
					}
					$tr.each(function(i){
						jQuery(this).hide();
						if(i+1 <= req_num_row){
							$tr.eq(i).show();
						}
					
					});
					jQuery('span').click(function(e){
						e.preventDefault();
						$tr.hide();
						var page=jQuery(this).text();
						var temp=page-1;
						var start=temp*req_num_row;
						//alert(start);
						$('span').removeClass("active");
						$(this).addClass("active");
						for(var i=0; i< req_num_row; i++){
							
							$tr.eq(start+i).show();
						
						}
					});
				}
			jQuery('document').ready(function(){
				pagination();

			}); 
				
</script>
		
	</head>

	<body>
		<main>
		<section class="sec">
			
			<div class="container">
				<div class="myrow row" >
					
					<div class="c0 col-md-4 rounded-left"><?php

					echo "<p>Witaj <b>".$_SESSION['user'].'</b>! [ <a href="logout.php">Wyloguj się!</a> ]';
					
					?></div>
					<div class="c0 col-md-8 rounded-right " style="text-align:center;"><?php

					echo "<p id='currentFolder'> Your current folder: <b>".$_SESSION['startDirection']."</b></p>";
					
					?></div>
					</div>
					<div class="row">
					<div class="folder col-md-4 rounded"><?php 
						require_once "connect.php";

						$conn = @new mysqli($host, $db_user, $db_password, $db_name);
						include_once("functions.php");
						include_once("viewFunction.php");
						?>
						<link rel="stylesheet" href="css/home.css" type="text/css" media="all">
						<?php
						$sql = "SELECT id, label, link, parent FROM menus WHERE user = '".$_SESSION['user']."' ORDER BY parent, sort, label ";
						$result = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
						//$ilu_userow= $result->num_rows;
						//echo $ilu_userow;
						// Create an array to conatin a list of items and parents
						$menus = array(
							'items' => array(),
							'parents' => array()
						);
						// Builds the array lists with data from the SQL result
						while ($items = mysqli_fetch_assoc($result)) {
							// Create current menus item id into array
							$menus['items'][$items['id']] = $items;
							// Creates list of all items with children
							$menus['parents'][$items['parent']][] = $items['id'];
						}
						// Print all tree view menus 
						echo createTreeView(0, $menus);
						?></div>
					<div class="folderView col-md-8 rounded table-responsive">
						<div class="row">
						<table id="tableView" class="table table-hover">
						<thead>
						  <tr>
							<th width="60%">Nazwa Pliku</th>
							<th width="20%">Typ Pliku</th>
							<th width="20%">Wielkosc Pliku</th>
						  </tr>
						</thead>
						<tbody id="table_content">
							<?php
								$dirPath=$_SESSION['startDirection'];
								echo viewFolder($dirPath);
							?>
							
						</tbody>
					  </table>
						</div>
						
						<div id="pagination" class="row"></div>
						
					</div>
					<div class="c3 col-sm-12 rounded">
						<form action="upload.php" method="post" enctype="multipart/form-data">
							Select image to upload:
							<input type="file" name="fileToUpload" id="fileToUpload">
							<input type="submit" value="Upload Image" name="submit">
						</form>
					</div>
				</div>
			</div>
		
		</section>
		<script> 
			function viewFolderOnClick(dirPath)
			{	document.getElementById("pagination").innerHTML ="";
				if (dirPath.length == 0) 
				{
					return;
				} 
				else 
				{
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) 
						{
							document.getElementById("table_content").innerHTML =this.responseText;
							pagination();
						}
					};
					xmlhttp.open("GET", "viewFunctionLater.php?q=" + dirPath, true);
					xmlhttp.send();
					
				}
				document.getElementById("currentFolder").innerHTML = "Your current folder: <b>"+dirPath;
				
			}
		</script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
		</main>
	</body>
</html>
<?php
if(isset($_SESSION['alertsControl']))
{
	echo "<script>alert('".$_SESSION['alertsMessage']."')</script>";
	unset($_SESSION['alertsControl']);
}

?>