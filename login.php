<!doctype html>
<html>
<head>
<title>Experiment 2</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
body, html {
  /* height: 100%; */
}
.bg {
  background-image: radial-gradient(circle, #ffffff,#e1e5eb, #9ea2b5);
  background-position: center;
  background-size: cover;
  height: 100%;
  width: 100%;
  background-attachment: fixed;
  margin: auto;
}
form{
  border: 5px solid #7c8694;
  padding: 4%;
  background: radial-gradient(circle,  #9ea2b5,#7c8694);
  background-clip: padding-box;
  border-radius: 10px 10px 10px 10px;
  font-size: 20px;
  /* border-radius: 25px; */
  box-shadow: 5px 5px 5px 5px rgba(0, 0, 0, 0.2);
  margin:auto;
  margin-top: 70px;
  margin-bottom: 50px;
  padding-top: 50px;
  padding-bottom: 35px;
  color: white;
  width:40%;
}
img{
  width:25%;
  height:25%;
  margin-left: 40%;
  margin-right: 35%;
  margin-top: 10px;
}
input{
  background: #e1e5eb;
  border-radius: 5px;
  border-width: 2px;
  /* font-size: 20px; */
  /* font-family: serif; */
  margin-top: 5px;
  padding-left: 10px;
  padding-top: 10px;
  padding-bottom: 10px;
  padding-right: 10px;
  width: 100%;
  height: 5%;
}
canvas{
  /*prevent interaction with the canvas*/
  pointer-events:none;
}
input, placeholder{
  font-size: 16px;
  color: black;
}
#login{
  border-radius: 2px 2px 2px 2px;
  border: #5394f5;
  background-color: #5394f5;
  color: white;
  /* font-size: 20px; */
  /* font-family: serif; */
  width: 100%;
  padding: 10px 165px 10px 165px;
}
#login:hover{
  color: black;
  background: #e1e5eb;
}

body{
  margin-top: 5%;
  margin-bottom: 5%;
}
a{
  text-decoration: underline;
  text-decoration-color: white;
  color: white;
}
label{
  font-weight: normal;
}

</style>

</head>
<body class="bg">


<form action="" method="post">

  <img src="icons/logo-3.png" alt="" />

  <br><br>
  <div class="form-group">
    <label for="user">Username: </label>
    <input name="user" type="text" placeholder="Enter username" required="Please fill this"/>
  </div>
  <div class="form-group">
    <label for="pass">Password: </label>
    <input name="pass" type="password" placeholder="Password" required="Please fill this"/><br><br>

  </div>
  <!-- <div class="form-group">
    <div id="captcha">
    </div>
    <input type="text" placeholder="Captcha" id="cpatchaTextBox"/>
    <button type="submit" style="margin-top:15px">Submit</button>
    </div> -->
  <div class="form-group">
    <p>Don't have an account? <a href="register.php"> Register</a></p>
  </div>
  <div class="form-group">
    <input id="login" type="submit" name="submit" value="Login"/>
  </div>
</form>
<?php
if(isset($_POST["submit"])){

if(!empty($_POST['user']) && !empty($_POST['pass'])) {
    $user=$_POST['user'];
    $pass=$_POST['pass'];

    $con=mysqli_connect('localhost','root','') or die(mysql_error());
    mysqli_select_db($con,'db_contact') or die("cannot select DB");

    $query=mysqli_query($con,"SELECT username,password FROM login WHERE username='".$user."' AND password='".$pass."'");
    $numrows=mysqli_num_rows($query);
    if($numrows!=0)
    {
    while($row=mysqli_fetch_assoc($query))
    {
    $dbusername=$row['username'];
    $dbpassword=$row['password'];
    }

    if($user == $dbusername && $pass == $dbpassword)
    {
    session_start();
    $_SESSION['sess_user']=$user;

    /* Redirect browser */
    header("Location: homepage.html");
    }
    } else {
    echo "Invalid username or password!";
    }

} else {
    echo "All fields are required!";
}
}
?>

</body>
</html>
