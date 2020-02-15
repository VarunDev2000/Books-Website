<?php
session_start();
?>



<!DOCTYPE html>
<html>
<head>
<title>BOOKS IN DATABASE</title>

  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  
</head>
<body>

<br><br>
<center>
<?php
if($_SESSION['logged']==True)
{
	include 'navbar.php';
	?>

<div class="container">

      <div class="jumbotron">
	  <center>
        <h2>BOOKS IN YOUR DATABASE</h2></center><br><br>
		<form name="genre_display" action="admin_view_books.php" method="POST">
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
										<form action="admin_iud.php">
					<input type="submit" class="btn btn-primary" name="back" value="Back" style="width:200px;float: right;"><br><br>
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
	$sql = "SELECT image,description FROM book order by id desc";
	$compile = oci_parse($conn, $sql);
	
	oci_execute($compile);
	while($row = oci_fetch_array($compile,OCI_NUM))
	{
			?>
			 <div class="col-sm-3">
		<div class="thumbnail" >
          
		  <img src="<?php echo 'uploads/'.$row[0];?>" alt='<?php echo $row[0] ?>' style="width:100%;height:350px"/>
          <div class="caption">
            <p style="font-family:Comic Sans MS;"><?php echo $row[1];?></p>
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
	$sql1 = "SELECT image,description FROM book where genre=$g_select order by id desc";
	$compile1 = oci_parse($conn, $sql1);
	
	oci_execute($compile1);
	while($row1 = oci_fetch_array($compile1,OCI_NUM))
	{
			?>
			 <div class="col-sm-3">
		<div class="thumbnail">
          
		  <img src="<?php echo 'uploads/'.$row1[0];?>" alt='<?php echo $row1[0] ?>' style="width:100%;height:350px"/>
          <div class="caption">
            <p style="font-family:Comic Sans MS;"><?php echo $row1[1];?></p>
			<br>
          </div>
		  </div>
     
      </div>
			
		<?php
	}
	?></div></div><?php
	oci_close($conn);
}
}
}


else
{
	
	echo "Something went wrong Please Try again Later !!!!!";

	?>
<br><br><br>
<form name="Admin_page5" method="POST">
<input type="submit" name="Admin_page5" value="Admin_page">
</form>
</center>

<?php
if(isset($_POST['Admin_page5']))
{
	$_SESSION['logged']=False;
	header("Location: admin_login.php");
}
}
?>


</body>
</html>





