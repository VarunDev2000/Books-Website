<?php
session_start();
?>

<!DOCTYPE html>
<htmL>
<head>
<title>DELETE GENRE</title>


<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<script type="text/javascript">


window.setTimeout("closeDiv();", 2000);

function closeDiv(){
document.getElementById("d1").style.display=" none";
}

</script>

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
            <h1>DELETE GENRE</h1>
			<br>
			</div>

			<form name="delete_genre" action="delete_genre.php" method="POST" enctype="multipart/form-data">
            <div class="panel panel-default">
                <div class="panel-body form-horizontal payment-form">
<br><br>
                    <div class="form-group">
                        <label for="genre name" class="col-sm-2 control-label">GENRE TO DELETE :</label>
                        <div class="col-sm-9">
                            				                    <?php
					$conn = oci_connect("BOOKS", "oracle", "localhost/XE");
$sql111 = "SELECT gen_name FROM genre";
$compiled111 = oci_parse($conn, $sql111);
	oci_execute($compiled111);

?><select name='genre' style="width:850px;height:30px" required><?php
while ($row = oci_fetch_array($compiled111,OCI_BOTH)) {
    echo "<option value='" . $row[0] ."'>" . $row[0] ."</option>";
}
echo "</select>";
oci_close($conn);
					?>
                        </div>
                    </div>
					
					<br>
				<div class="col-xs-12">
                    <hr style="border:1px dashed #dddddd;width:70%" >
                    <input type="submit" class="btn btn-primary btn-block" name="delete" value="DELETE" style="width:50%">
                <br>
				</div>                
				
       

                </div>
            </div> 
	   
	   </form> 
<br>
<form name="Back11" action="admin_iud.php" method="POST">
<input type="submit" class="btn btn-lg  btn-block btn-signin" name="Back11" value="BACK" style="width:40%">

</form>
<br><br>

 
		</div>







<?php

if(isset($_POST['delete']))
{
	
	$g_name=$_POST["genre"];

	$conn = oci_connect("BOOKS", "oracle", "localhost/XE");
	
	$dupesql = "SELECT genre_id FROM genre where (gen_name='$g_name')";
	
	
	
	$compile1 = oci_parse($conn, $dupesql);
	
	oci_execute($compile1);
	$numrows = oci_fetch_all($compile1, $res);
	


	
	
	
	
	if ( $numrows==1) {
	
	
	$sql = "delete from genre where gen_name='$g_name'";
	$compile = oci_parse($conn, $sql);

	oci_execute($compile);
	
		
	}
	else
	{
		?>
		<div id="d1"><center><p>The GENRE cannot be found in database</p></center></div>
		<?php
	}
	
	

oci_close($conn);
	
}
}

else
{
	echo "Something went wrong Please Try again Later !!!!!";
	?>
<br><br><br>
<form name="Admin_page4" method="POST">
<input type="submit" name="Admin_page4" value="Admin_page">
</form>
</center>

<?php
if(isset($_POST['Admin_page4']))
{
	$_SESSION['logged']=False;
	header("Location: admin_login.php");
}
}
?>
</body>
</html>
	
	
	
	
	
	
	
	
	
	
		






















