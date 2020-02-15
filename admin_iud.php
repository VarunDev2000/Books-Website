<?php
session_start();
?>

<!DOCTYPE html>
<head>
<title>Book DATABSE</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/1-col-portfolio.css" rel="stylesheet">
	
</head>
<body>



<?php 
if($_SESSION['logged']==True)
{
include 'navbar.php';
	?>
	
	<br>
<div class="container">
<div class="row">
            <div class="col-lg-12">
			<div class="jumbotron"><center>
                <h1>MODIFY YOUR DATABASE HERE :
             
                </h1>
				</center>
				<br>
				<br>
				</div>
				<br>
				
<div align="right">
<form name="Log_out" method="POST">
<input type="submit" class="btn btn-default" name="Log_out" value="Log Out" style="width:30%" >
</form>
</div>
<br><hr><br>



            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-7">
                <a href="insert.php">
                    <img class="img-responsive" src="genre.jpg" alt="Add Genre">
                </a>
            </div>
            <div class="col-md-5">
                <h3>ADD GENRE</h3>
        <br><br>
                <p>Add different genre to Database</p>
				<br><br>
                <a class="btn btn-primary" href="insert_genre.php">ADD<span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
		
		<hr>
		        <div class="row">
            <div class="col-md-7">
                <a href="insert.php">
                    <img class="img-responsive" src="gen_del.png" alt="Delete Genre">
                </a>
            </div>
            <div class="col-md-5">
                <h3>DELETE GENRE</h3>
        <br><br>
                <p>Delete genre from database here</p>
				<br><br>
                <a class="btn btn-primary" href="delete_genre.php">DELETE<span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
		
        <!-- /.row -->

        <hr>
        <!-- Project One -->
        <div class="row">
            <div class="col-md-7">
                <a href="insert.php">
                    <img class="img-responsive" src="addbooks.jpg" alt="Add Books">
                </a>
            </div>
            <div class="col-md-5">
                <h3>ADD BOOKS</h3>
        <br><br>
                <p>Add Books to Your Database Here</p>
				<br><br>
                <a class="btn btn-primary" href="insert.php">ADD<span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Project Two -->
        <div class="row">
            <div class="col-md-7">
                <a href="update.php">
                    <img class="img-responsive" src="updatebooks.jpg" alt="update books">
                </a>
            </div>
            <div class="col-md-5">
                <h3>UPDATE</h3>
				<br><br>
                <p>Update Books in your database Here</p>
				<br><br>
                <a class="btn btn-primary" href="update.php">UPDATE<span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Project Three -->
        <div class="row">
            <div class="col-md-7">
                <a href="delete.php">
                    <img class="img-responsive" src="deletebooks.jpg" alt="delete books">
                </a>
            </div>
            <div class="col-md-5">
                <h3>DELETE</h3>
                <br><br>
                <p>Delete Books in Your Database</p>
				<br><br>
                <a class="btn btn-primary" href="delete.php">DELETE<span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
		
		
		        <hr>

        <!-- Project Three -->
        <div class="row">
            <div class="col-md-7">
                <a href="admin_view_books.php">
                    <img class="img-responsive" src="view_books.png" alt="view books" style="height:250px;width:200px">
                </a>
            </div>
            <div class="col-md-5">
                <h3>VIEW BOOKS</h3>
                <br><br>
                <p>See Books Available in Your Database</p>
				<br><br>
                <a class="btn btn-primary" href="admin_view_books.php">VIEW<span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>


 <br><br><hr><br>


</div>


<?php
if(isset($_POST['Log_out']))
{
	$_SESSION['logged']=False;
	echo("<script>location.href = 'admin_login.php?msg=$msg';</script>");
}

}
else
{
	?><br><br><center><?php
	echo "Something went wrong Please Try again Later !!!!!";
	?>
<br><br><br>
<form name="Admin_page1" method="POST">
<input type="submit" name="Admin_page1" value="Admin_page">
</form>
</center>

<?php
if(isset($_POST['Admin_page1']))
{
	$_SESSION['logged']=False;
	header("Location: admin_login.php");
	
}
}
?>
	


</body>
</html>