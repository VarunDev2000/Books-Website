<?php
session_start();
?>

<!DOCTYPE html>
<htmL>
<head>
<title>ADD GENRE</title>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<script type="text/javascript">


window.setTimeout("closeDiv();", 4000);

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
<form name="insert_genre" action="insert_genre.php" method="POST" enctype="multipart/form-data">
	<div class="row">
        <div class="col-sm-12">
		<div class="jumbotron">
            <h1>ADD GENRE</h1>
			<br>
			</div>
			<hr style="height:10px">
        </div>
		<br>
        <div class="col-sm-12">
      
            <div class="panel panel-default">
                <div class="panel-body form-horizontal payment-form">
<br><br>
                    <div class="form-group">
                        <label for="book name" class="col-sm-3 control-label">GENRENAME:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"  name='genre_name' required>
                        </div>
                    </div>
					<br><br>
             
                           
                        </div>
                    </div>
					<br>
                </div>
				
				 <div class="col-sm-4"></div>
>				 
                <div class="col-sm-4">
                  
					<center>
                    <input type="submit" class="btn btn-primary btn-block" name="upload" value="ADD">
					</center>
                </div>     
<div class="col-sm-4"></div>				
          
			
            </div>            
        </div> <!-- / panel preview -->
	</form>
</div>

	<center>

<form name="Back0" action="admin_iud.php" method="POST">
<br><br>
<input type="submit" class="btn btn-lg btn-block btn-signin" name="Back0" value="BACK" style="width:30%">
</form>
<br><br><br>
</center>

<?php

if(isset($_POST['upload']))
{
	
	$g_name=$_POST["genre_name"];
		$conn = oci_connect("BOOKS", "oracle", "localhost/XE");
	$dupesql = "SELECT genre_id FROM genre where (gen_name='$g_name')";
	
	
	
	$compile = oci_parse($conn, $dupesql);
	
	oci_execute($compile);
	$numrows = oci_fetch_all($compile, $res);
	
	


	if ( $numrows==0) {
	$sql = "insert into genre values(genre_seq.nextval,'$g_name')";
	$compiled = oci_parse($conn, $sql);
	oci_execute($compiled);
	
	}
	
		else{
		?>
		<div id="d1" class="alert alert-danger"><center><p>Genre already Available</p></center></div>
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
<form name="Admin_page0" action="admin_login.php" method="POST">
<input type="submit" name="Admin_page3" value="Admin_page">
</form>
</center>

<?php
if(isset($_POST['Admin_page0']))
{
	$_SESSION['logged']=False;
	header("Location: admin_login.php");
}
}
?>
</body>
</html>





