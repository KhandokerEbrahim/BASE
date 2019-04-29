<?php

   $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "train";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

mysql_connect($host,$user,$password);
mysql_select_db($db);

if(isset($_POST['username'])){

    $uname=$_POST['username'];
    $password=$_POST['password'];

    $sql="select * from loginform where user='".$uname."'AND Pass='".$password."' limit 1";
    
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $Email);
     $stmt->execute();
     $stmt->bind_result($Email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

}
?>

<!DOCTYPE html>
<html>
<head>

  <title> Admin login</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script src="js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <script language="JavaScript" type="text/javascript" src="js/bootstrap.min.js"></script>
  <script language="JavaScript" type="text/javascript">
  $(document).ready(function(){
    $('.carousel').carousel({
      interval: 2000
    })
  });
</script>
</head>
<body>


<div class="jumbotron " style="margin: 40px">
<div class="container">
  <div class="col-lg-4"></div>
  <div class="col-lg-4">
  <div class="jumborton" style="margin-top: 50px ">
  <h1 style="color:blue;" >Admin login</h1>
  <form method="post" action="#">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

  <div class="checkbox">
    <label>
      <input type="checkbox"> Check me out
    </label>
  </div>

    <input type="submit" name="submit" value="LOGIN" class="btn-login">
    <button type="button" class="btn btn-primary btn-lg">Back</button>
</form>
</form>
</div>



</body>
</html>