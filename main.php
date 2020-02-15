<!DOCTYPE html>
<html lang="en">
<head>
  <title>BOOK LIBRARY</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="main.css">
  

</head>
<body>
<div class="container">

<br>
<div class="jumbotron">
<?php
include 'navbar.php';
?> 
<br>
<center>
  <h1>BOOK LIBRARY</h1> 
  <br><br>
  <form>
    <div class="input-group">
      <input type="email" class="form-control" size="50" placeholder="Email Address" required>
 <br>
        <button type="button" class="btn btn-block" style="width:30%;background-color: #555555;color: white;">Subscribe</button>

    </div>
  </form>
</center>
</div>
<br>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="book1.jpg" alt="Books">
        <div class="carousel-caption">
          <h3>Books For Sale</h3>
          <p>Low COST</p>
        </div>      
      </div>

      <div class="item">
        <img src="book2.jpg" alt="Study">
        <div class="carousel-caption">
          <h3>All Genre Available</h3>
       
        </div>      
      </div>
    </div>


    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>


<div class="container text-center">    
<br><br><br><br><br><br>
  <div class="row">
    <div class="col-sm-6">
      <a href="buybooks.php"><img src="buybook.svg" class="img-rounded" style="width:65%;height:300px" alt="Buy books"></a>
<h3>BUY BOOKS</h3>
    </div>
    <div class="col-sm-6"> 
      <a href="admin_login.php"><img src="admin.png" class="img-rounded" style="width:65%;height:300px" alt="Admin"></a>
  <h3>ADMIN</h3>
    </div>
  </div>
</div><br><br>
<hr><br><br>

<center>
<div class="container">
  <div class="row">
    <div class="col-sm-8">
      <h2>About Book Library</h2><br>
      <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4><br>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
	
	    <div class="col-sm-4">
		<br><br>
		<img src="lib.png" class="img-rounded" style="width:70%;height:250px" alt="Library">
		</div>
  </div>
</div>
</center>

<br><br><br><br>


</div>
<footer class="container-fluid text-center">

<div id="contact" class="container-fluid bg-grey">

<font size=6><p class="text-center">CONTACT</p></font>
  <div class="row">
    <div class="col-sm-5">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Paris,Chennai</p>
      <p><span class="glyphicon glyphicon-phone"></span> 9884216122</p>
      <p><span class="glyphicon glyphicon-envelope"></span> bookLibrary@gmail.com</p>
    </div>
    <div class="col-sm-7 slideanim">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
  </div>
</div>



</footer>

</body>
</html>
