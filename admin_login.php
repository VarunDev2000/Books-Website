 <?php
 session_start();
 ?>
 
 
 <!DOCTYPE HTML>
 <html>
 <head><title>Admin Login</title>
 <link rel="stylesheet" href="admin_login.css">
 
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">


window.setTimeout("closeDiv();", 2000);

function closeDiv(){
document.getElementById("d2").style.display=" none";
}

</script>

 </head>

<body>
<div class="container h-80">
<div class="row align-items-center h-100">
    <div class="col-3 mx-auto">
        <div class="text-center">
            <img id="profile-img" class="rounded-circle profile-img-card" src="https://i.imgur.com/6b6psnA.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form  class="form-signin" name="admin" action ="admin_login.php" method="POST">
                
            <input type="text" class="form-control form-group" name="username" value="Varun" required  autofocus>
                <input type="password" id="inputPassword" class="form-control form-group" placeholder="Password" name="pass" required autofocus>
                <input type="submit" class="btn btn-lg btn-primary btn-block btn-signin" name="go" value="LOG IN">
            </form>
			<br>
			<form name="Back5" action="main.php" method="POST">

<input type="submit" class="btn btn-lg btn-default btn-block btn-signin" name="Back5" value="HOME PAGE" >
</form>

<br>
        </div>
    </div>
</div>
</div>




 <?php
if(isset($_POST['go']))
{
 
  $user=$_POST["username"];
  $pass=$_POST["pass"];
  
  if($user=="Varun" && $pass=="oracle")
  {
		 $_SESSION['logged']=True;
		header("Location: admin_iud.php");
  }
	else{
		?>
		<div id=d2 class="alert alert-info">
		<strong>
		<center>
			USERNAME or PASSWORD is WRONG !!!
		</center>
		</strong>
		</div>
		<?php
		

	}
	
	
	

}
  ?>

</body>
</html>













<!------ Include the above in your HEAD tag ---------->














