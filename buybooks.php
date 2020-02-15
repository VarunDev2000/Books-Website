<!DOCTYPE html>
<html>
<head>
<title>PURCHASE BOOKS</title>

  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  
</head>
<body>
<div class="container">

      <div class="jumbotron">
	  <center>
        <h2>BUY BOOKS</h2></center><br><br>
		<form name="genre_display" action="buybooks.php" method="POST">
						             <?php
					$conn = oci_connect("BOOKS", "oracle", "localhost/XE");
$sql111 = "SELECT genre_id,gen_name FROM genre";
$compiled111 = oci_parse($conn, $sql111);
	oci_execute($compiled111);

?><select name='genre' style="width:100%;height:30px" required>
<option value="def" disabled selected>Select genre</option>
<option value="all">ALL BOOKS</option>
<?php
while ($row = oci_fetch_array($compiled111,OCI_BOTH)) {
    echo "<option value='" . $row[0] ."'>" . $row[1] ."</option>";
}
echo "</select>";
oci_close($conn);
					?>
					<br><br><center>
					<input type="submit" class="btn btn-primary" name="select" value="Select" style="width:200px">
					</center>
					</form>
					
      </div>
	  					
										<br>
										<form action="main.php">
					<input type="submit" class="btn btn-primary" name="Home" value="Home Page" style="width:200px;float: right;"><br><br>
					<hr style="height:1px;border:none;color:#333;background-color:#333;" /><br>
					</form>
					</div>
		
	
<?php

if(isset($_POST['select']))
{

$g_select=$_POST["genre"];

if($g_select=='all')
{
	$conn = oci_connect("BOOKS", "oracle", "localhost/XE");
	$sql = "SELECT image,description ,book_name,author_name FROM book order by id desc";
	$compile = oci_parse($conn, $sql);
	
	oci_execute($compile);
	while($row = oci_fetch_array($compile,OCI_NUM))
	{
			?>
			 <div class="col-sm-3">
		<div class="thumbnail" >
          <h4 style="font-family:Garamond"><?php echo $row[2].'<strong>'. " by " .'</strong>'.$row[3]?> </h4><hr style="height:1px;border:none;color:#333;background-color:#333;" />
		  <img src="<?php echo 'uploads/'.$row[0];?>" alt='<?php echo $row[0] ?>' style="width:100%;height:350px"/>
          <div class="caption">
            <p style="font-family:Comic Sans MS;"><?php echo $row[1];?></p>
			<br>
			<a href="uploads/<?php echo $row[0];?>" download><input type="submit" class="btn btn-primary" name="download" value="Download-->" style="width:100%;float: center;"></button>
			</a>
          </div>
		  </div>
     
      </div>
			
		<?php
	}
	
	oci_close($conn);
}

else
{
		$conn = oci_connect("BOOKS", "oracle", "localhost/XE");
	$sql1 = "SELECT image,description,book_name,author_name FROM book where genre=$g_select order by id desc";
	$compile1 = oci_parse($conn, $sql1);
	
	oci_execute($compile1);
	while($row1 = oci_fetch_array($compile1,OCI_NUM))
	{
			?>
			 <div class="col-sm-3">
		<div class="thumbnail">
          <h4 style="font-family:Garamond"><?php echo $row1[2].'<strong>'. " by " .'</strong>'.$row1[3]?> </h4><hr style="height:1px;border:none;color:#333;background-color:#333;" />
		  <img src="<?php echo 'uploads/'.$row1[0];?>" alt='<?php echo $row1[0] ?>' style="width:100%;height:350px"/>
          <div class="caption">
            <p style="font-family:Comic Sans MS;"><?php echo $row1[1];?></p>
			<br>
					<a href="uploads/Book.txt" download><input type="submit" class="btn btn-primary" name="download" value="Download-->" style="width:100%;float: center;"></button>
			</a>
          </div>
		  </div>
     
      </div>
			
		<?php
	}
	?></div></div><?php
	oci_close($conn);
}
}
?>

</body>
</html>





