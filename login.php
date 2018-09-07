<?php
	require_once("config.php");
	require_once("validation_functions.php");
	session_start();
    session_unset();
    session_destroy();
    session_start();
    if(!isset($_POST['success']))
            $_POST['success']=0;
	$errors=[];

	$message="";
        if (isset($_POST["submit"])) {
        $user=trim($_POST["username"]);
        $pass=trim($_POST["password"]);
        $user=mysqli_real_escape_string($connection,$user);
        $pass=mysqli_real_escape_string($connection,$pass);
        
        $fields_required=["username","password"];
        foreach ($fields_required as $field) {
            if(!has_presence(trim($_POST[$field]))){
                $errors[$field]= $field . " can't be empty";
            }
        }
        if(empty($errors)){
            $query="SELECT UID FROM login WHERE UID='$user' AND PASS='$pass'";
            $result=mysqli_query($connection,$query);
            $row=mysqli_fetch_assoc($result);
            $query1="SELECT * FROM login WHERE UID='$user'";
            $r1=mysqli_query($connection,$query1);
            $row1=mysqli_fetch_assoc($r1);
            $count = mysqli_num_rows($result);
        if($count==1){
        $_SESSION['log']=911;
        $_SESSION['userid']=$user;
        header("Location: home.php?ans=1");
        }
        elseif ($row1['UID']==$user) {
            $message="Wrong Password";
        }
        else{
            $message="Wrong Username and Password";
            $user="";
        }
    }
        else{
            $message="There are some errors";
        }
    }
        else{
            $user="";
            $message="Log in";
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Raleway" type="text/css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:100" type="text/css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display" type="text/css" rel="stylesheet" />

  <style type="text/css">
  html
            {
                height: 100%;
            }
            /*body{
                background-image: url("https://t4.ftcdn.net/jpg/01/12/88/43/240_F_112884300_0SFOzIrZEK0LDeKXw02u50lH4gM4QToG.jpg");
                background-repeat: no-repeat;
                padding-top: 2%;
                background-size: 100% 100%;
                background-attachment: fixed;   
            }*/
            body {
  width: 100%;  
  height: 100%;
  color: #fff;
  background: linear-gradient(-45deg, #000000, #3A3B3A, #0D1B5C, #020933);
  background-size: 400% 400%;
  -webkit-animation: Gradient 15s ease infinite;
  -moz-animation: Gradient 15s ease infinite;
  animation: Gradient 15s ease infinite;
}
@-webkit-keyframes Gradient {
  0% {
    background-position: 0% 50%
  }
  50% {
    background-position: 100% 50%
  }
  100% {
    background-position: 0% 50%
  }
}

@-moz-keyframes Gradient {
  0% {
    background-position: 0% 50%
  }
  50% {
    background-position: 100% 50%
  }
  100% {
    background-position: 0% 50%
  }
}

@keyframes Gradient {
  0% {
    background-position: 0% 50%
  }
  50% {
    background-position: 100% 50%
  }
  100% {
    background-position: 0% 50%
  }
}
            .data_entered{
                color: #000000;
                font-weight: bold;
                font-size: 1.125em;
                height: 1.4em;
                width: 60%;
                
            }
            .label{
                color: white;
                font-size: 17px;
                line-height: 2em;
            }
            .message{
                color: white;
                font-weight: bold;
                font-size: 15px;
                text-transform: uppercase;
                text-align: center;
                height: 10%;
                padding-bottom: 2%;
                padding-top: 2%;
                }
            .error{
                color: white;
                font-weight: bold;
                font-style: italic;
                font-size: 17px;
            }
            .submit{
                color: black;
                font-weight: bold;
                font-size: 1.5em;
                text-transform: uppercase;
                text-align: center;
                width: 50%;
                word-spacing: 0.2em;
            }   
            .border{
                background: #030321;
                width: 80%;
                min-width: 25%;
                margin: auto;
                height: 23;
                overflow: auto;
                border-radius: 4px;
            }
            .borderreg{
                background: #030321;
                width: 80%;
                min-width: 25%;
                margin: auto;
                height: 23;
                overflow: auto;
                border-radius: 4px; 
            }
            .heading{
                font-style: Playfair Display;
                font-size: 50px;
                padding-bottom: 2%;
                color: black;
            }
            .containerdiv {
            	width: 100%;
            	height: 100%;
            	position: relative;
            }
            #particle-js, #info {
            	width: 100%;
            	height: 100%;
            	position: absolute;
            	top: 0;
            	left: 0;
            }
            #info {
            	padding-top: 10%;
            	z-index: 10;
            }
  </style>
</head>
<body>
	<div class="container">
	<div class="containerdiv">
		<div id="particles-js"></div>
		<div id="info"><div class="col-lg-4 col-xs-0">
        </div>
        <div class="col-lg-4 col-xs-12">
   <h1 align="center" class="heading" style="color: white; font-size: 35px; font-weight: bold">D Ǝ C R Y P T</h1>
<div class="border">
    <?php 
            if($_POST['success']==1)
                echo "
            <div class=\"alert alert-success\" >
                            <center>
                          <strong>Registration Successful</strong>
                          </center>   
                        </div>";
    ?>
    <div class="message">
        <?php echo $message; ?>
    </div>
    <form action="login.php?success=0" class="form" method="POST">
        <div class="form-group" style="padding-left: 12%">
        <label class="label">User Id:</label><input type="text" name="username" class="form-control" style="width: 85%" placeholder="Enter Registration No." value="<?php echo $user; ?>">
        </div>
        <div class="form-group" style="padding-left: 12%">
        <label class="label">Password:</label><input type="password" name="password" class="form-control" style="width: 85%" placeholder="Enter Password" value="">
        </div>
        <br />
    	<center>
         <button class="btn btn-success" type="submit" name="submit" class="submit" value="Log in" style="width: 40%">LOGIN</button>   
        </center>
    </form>
    <br />
    <div class="error">
    <?php echo error_report($errors);?>
    </div>
    <br>
	<p style="display: inline-block; padding-left: 30px;">New User?</p>
	<a href="register.php?err=0" style="display: inline-block; margin-left: 10px;"><button class="btn btn-warning">Register</button></a>
	</div>
    </div>		
	</div>
</div>
</div>
  
        <script type="text/javascript" src="assets/js/particles.js"></script>
        <script type="text/javascript" src="assets/js/app.js"></script>
</body>
</html>
