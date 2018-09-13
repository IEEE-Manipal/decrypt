<?php
         if(!isset($_GET['err']))
            header("Location: logout.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign Up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
     html
            {
                height: 100%;
            }
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
                font-size: 25px;
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
                width: 90%;
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
              padding-top: 4%;
              z-index: 10;
            }
            .button {
      background-color: transparent;
      border:3px solid white;
      border-radius:  2px;
      color: white;
      padding: 10px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      cursor: pointer;
    }
    
.button:active{
  background-color: white; 
}
  </style>
  <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
  <div class="container">
    <div class="containerdiv">
  <div id="particles-js"></div>
  <div id="info">
        <div class="col-lg-4 col-xs-0">
        </div>
        <div class="col-lg-4 col-xs-12">
   <h1 align="center" class="heading" style="color: white; font-size: 35px; font-weight: bold">D Ǝ C R Y P T</h1>
   <div class="tab-content">
<div class="borderreg"> 
                    <form action="regcheck.php" method="post" style="padding-top: 3%; padding-bottom: 2%">
                        <div class="form-group" style="padding-left: 12%">
                        <label style="color: white; font-size: 17px" >Name :</label><input type="text" class="form-control" style="width: 85%" placeholder="Enter name" name="username">
                        
                        </div>
                        <div class="form-group" style="padding-left: 12%">
                        <label style="color: white; font-size: 17px">Registration Number :</label><input type="number" style="width: 85%" class="form-control" placeholder="Enter Registration No." name="regno">
                        
                        </div>
                        <div class="form-group" style="padding-left: 12%">
                        <label style="color: white; font-size: 17px">Mobile Number :</label><input type="number" style="width: 85%" class="form-control" placeholder="Enter Number" name="num">
                        
                        </div>
                        <div class="form-group" style="padding-left: 12%">
                        <label style="color: white; font-size: 17px">Email Id :</label><input type="email" class="form-control" style="width: 85%" placeholder="Enter email" name="email">
                        
                        </div>
                        <div class="form-group" style="padding-left: 12%">
                        <label style="color: white; font-size: 17px">Password :</label><input type="password" class="form-control" style="width: 85%" placeholder="Enter password" name="password">
                        </div>
                        <div style="color: white; padding-left: 2%; padding-right: 1%">
                        <?php
                            if($_GET['err']==1)
                            {
                                echo "Registration number already taken";
                            }
                            if($_GET['err']==2)
                            {
                                echo "NAME FIELD CANNOT BE EMPTY";
                            }
                            if($_GET['err']==3)
                            {
                                echo "Registration number invalid";
                            }
                             if($_GET['err']==4)
                            {
                                echo "REGISTRATION NO. FIELD CANNOT BE EMPTY";
                            }
                             if($_GET['err']==5)
                            {
                                echo "EMAIL ID FIELD CANNOT BE EMPTY";
                            }
                             if($_GET['err']==6)
                            {
                                echo "PASSWORD FIELD CANNOT BE EMPTY";
                            }
                             if($_GET['err']==7)
                            {
                                echo "NUMBER FIELD CANNOT BE EMPTY";
                            }
                            if($_GET['err']==8)
                            {
                                echo "NUMBER MUST BE 10 DIGITS";
                            }
                            if($_GET['err']==9)
                            {
                                echo "PASSWORD MUST BE ATLEAST 6 CHARACTERS LONG";
                            }
                            if($_GET['err']==11)
                            {
                                echo "CAPTCHA IS WRONG";
                            }
                        ?>
                        <div class="g-recaptcha" data-sitekey="6Le82m4UAAAAAFAqZQeiz9nPWOg9fgGypyeek3W2"></div>
                        <!-- </div> -->
                        <center>
                        <button type="submit" class="button" style="width: 40%">Submit</button>
                        </center>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
<script type="text/javascript" src="assets/js/particles.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
</body>
</html>
