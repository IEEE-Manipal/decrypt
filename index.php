<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>D 3 C R Y P T</title>
  <meta name="description" content="particles.js is a lightweight JavaScript library for creating particles.">
  <meta name="author" content="IEEE - SBM" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="assets/js/randtext.js"></script>

<script>
$(document).ready(function(){
    $(".button1").click(function(){
      $(".button1").fadeOut(1500);
      $("#login").fadeIn(2000);
      $("#register").fadeIn(2000);
      $("#div1").fadeIn(2000);
      randtext(div1,100);
      setInterval(randtext,4000,div1,100);
    });
});
</script>
<style type="text/css">
  body , #particles-js {
  width: 100%;
  height: 100%;
  color: #fff;
  background: linear-gradient(-45deg, #000000, #3A3B3A, #0D1B5C, #020933);
  background-size: 400% 400%;
  -webkit-animation: Gradient 15s ease infinite;
  -moz-animation: Gradient 15s ease infinite;
  animation: Gradient 15s ease infinite;
  z-index: 10;
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
</style>

</head>
<body>

<!-- particles.js container -->
<div style="position: relative;" id="particles-js">
  <button class="button button1" id="Enter"></button>
  <script type="text/javascript">
    randtext(Enter,100);
    setInterval(randtext,4000,Enter,100);
  </script>
  <div id="div1"></div>
  <a href="login.php"><button class="button" id="login">Log In</button></a>
  
  <a href="register.php?err=0"><button class="button"  id="register">Sign Up</button></a>

  <div class="footer"  style="position: absolute; left: 50% ; top: 90%; transform: translate(-50%,0);   display: block; color: white; z-index: 1;">By IEEE</div>

</div>

<!-- scripts -->
<script src="assets/js/particles.min.js"></script>
<script src="assets/js/app.js"></script>

</body>
</html>