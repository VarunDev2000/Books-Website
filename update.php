<?php
session_start();
?>

<!DOCTYPE html>
<htmL>
<head>
<title>UPDATE BOOK</title>

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

?>
			 <?php
include 'navbar.php';
?> 
  <div class="container">
<form name="update" action="update.php" method="POST" enctype="multipart/form-data">
	<div class="row">

        <div class="col-sm-12">
		

		<div class="jumbotron">
            <h1>UPDATE BOOK</h1>
			<br>
			</div>
			<hr style="height:10px">
			
        </div>
		<br>
        <!-- panel preview -->
        <div class="col-sm-5">
      
            <div class="panel panel-default">
                <div class="panel-body form-horizontal payment-form">
<br><br>
                    <div class="form-group">
                        <label for="book name" class="col-sm-3 control-label">BOOKNAME:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"  name='book_name' required>
                        </div>
                    </div>
					<br><br>
                    <div class="form-group">
                        <label for="author name" class="col-sm-3 control-label">AUTHORNAME:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name='author_name' required>
                        </div>
                    </div> 
					<br><br>
                    <div class="form-group">
                        <label for="image" class="col-sm-3 control-label">IMAGEFILE:</label>
                        <div class="col-sm-9">
							<input type="file" class="form-control" name="image" accept="image/*" required>
                           
                        </div>
                    </div>
					<br>
                </div>
            </div>            
        </div> <!-- / panel preview -->
        <div class="col-sm-7">
            <h4>Book Description:</h4>

			  <textarea name="description" rows=5 style="width:100%" maxlength=250 required></textarea>
			
			
            <div class="row">
                <div class="col-xs-12">
                    <hr style="border:1px dashed #dddddd;">
                    <input type="submit" class="btn btn-primary btn-block" name="update" value="UPDATE">
                </div>                
            </div>
        </div>
	</div>
	</form>
</div>

	<center>

<form name="Back2" action="admin_iud.php" method="POST">
<input type="submit" class="btn btn-lg btn-block" name="Back2" value="BACK" style="width:30%">
</form>
<br><br><br>
</center>

<?php

if(isset($_POST['update']))
{
	
	$book=$_POST["book_name"];
	$author=$_POST["author_name"];
	$description=$_POST["description"];

	
	$target="uploads/".basename($_FILES['image']['name']);
	$image=$_FILES['image']['name'];
	$conn = oci_connect("BOOKS", "oracle", "localhost/XE");
	
	$dupesql = "SELECT id FROM book where (book_name='$book')";
	
	
	
	$compile1 = oci_parse($conn, $dupesql);
	
	oci_execute($compile1);
	$numrows = oci_fetch_all($compile1, $res);
	


	
	
	
	
	if ( $numrows==1) {
	
	
	$sql2 = "update book set author_name='$author' where book_name='$book'";
	$sql3 = "update book set image='$image' where book_name='$book'";
	$sql4="update book set description='$description' where book_name='$book'";
	$compile2 = oci_parse($conn, $sql2);
	$compile3 = oci_parse($conn, $sql3);
	$compile4 = oci_parse($conn, $sql4);
	oci_execute($compile2);
	oci_execute($compile3);
	oci_execute($compile4);
	
	
	
	
	move_uploaded_file($_FILES['image']['tmp_name'],$target);
		
	}
	else
	{
		?>
		<div id="d1" class="alert alert-danger"><center><p>The BOOK cannot be found in database</p></center></div>
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
<form name="Admin_page3" method="POST">
<input type="submit" name="Admin_page3" value="Admin_page">
</form>
</center>

<?php
if(isset($_POST['Admin_page3']))
{
	$_SESSION['logged']=False;
	header("Location: admin_login.php");
}
}
?>
</body>
</html>




































