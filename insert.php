<?php
session_start();
?>

<!DOCTYPE html>
<htmL>
<head>
<title>ADD BOOKS</title>

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
<form name="update" action="insert.php" method="POST" enctype="multipart/form-data">
	<div class="row">
        <div class="col-sm-12">
		<div class="jumbotron">
            <h1>ADD BOOKS</h1>
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

				<textarea name="description" rows=5 style="width:100%" required maxlength=250></textarea>
			
			<br><br>
				                    <?php
					$conn = oci_connect("BOOKS", "oracle", "localhost/XE");
$sql111 = "SELECT genre_id,gen_name FROM genre";
$compiled111 = oci_parse($conn, $sql111);
	oci_execute($compiled111);

?><select name='genre' style="width:250px;height:30px" required><?php
while ($row = oci_fetch_array($compiled111,OCI_BOTH)) {
    echo "<option value='" . $row[0] ."'>" . $row[1] ."</option>";
}
echo "</select>";
oci_close($conn);
					?>

			
			<br><br>
			
            <div class="row">
                <div class="col-xs-12">
                    <hr style="border:1px dashed #dddddd;">
                    <input type="submit" class="btn btn-primary btn-block" name="upload" value="UPLOAD">
                </div>                
            </div>
        </div>
	</div>
	</form>
</div>

	<center>

<form name="Back1" action="admin_iud.php" method="POST">
<input type="submit" class="btn btn-lg btn-block btn-signin" name="Back1" value="BACK" style="width:30%">
</form>
<br><br><br>
</center>


<?php

if(isset($_POST['upload']))
{
	
	$book=$_POST["book_name"];
	$author=$_POST["author_name"];
	$description=$_POST["description"];
	$gen_select=$_POST["genre"];

	
	$target="uploads/".basename($_FILES['image']['name']);
	$image=$_FILES['image']['name'];
	
	$conn = oci_connect("BOOKS", "oracle", "localhost/XE");
	$dupesql = "SELECT id FROM book where (book_name='$book' and author_name='$author')";
	
	
	
	$compile = oci_parse($conn, $dupesql);
	
	oci_execute($compile);
	$numrows = oci_fetch_all($compile, $res);
	


	
	
	
	
	if ( $numrows==0) {
	
	$sql = "insert into book values(book_seq.nextval,'$book','$author','$image','$description','$gen_select')";
	$compiled = oci_parse($conn, $sql);
	oci_execute($compiled);
	
	
	
		if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
		
		?><div id="d1" class="alert alert-success"><center><p>Uploaded</p></center></div>
		<?php
	}
	else{
		?>
		<div id="d1" class="alert alert-danger"><center><p>Cannot Upload</p></center></div>
	<?php
	}
		
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





