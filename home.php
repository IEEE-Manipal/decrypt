<?php
include("session.php");
if(!isset($_GET['ans'])) {
  header("Location: logout.php");
}

?>
<?php 
	$uid=$_SESSION["userid"];
	$status_query="SELECT status FROM login WHERE UID=$uid";
	$status_result=mysqli_query($connection,$status_query);
	$status_row=mysqli_fetch_assoc($status_result);
	$that_query="SELECT UID,name FROM login WHERE UID=$uid";
	$that_result=mysqli_query($connection,$that_query);
	$that_row=mysqli_fetch_assoc($that_result);
	if($status_row['status']==30)
		header("Location: win.html");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>D3CRYPT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/home.css">
  
  <style type="text/css">
    .table2{
    border-radius: 20px 20px;
    padding-bottom: 5%;
    background: linear-gradient(to bottom right, #dedce8, #f9f9f9,#1111);
    opacity: 0.8;
    width: 100%;
}
.button {
      background-color: black;
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
</head>
<body>
      <nav class="nav navbar-inverse">
	  		<div class="container">
	  			<div class="navbar-header">
	  				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span> 
				      </button>
	  				<button class="btn  navbar-btn button1">DƎCRYPT</button>
	  			</div>
	  			 <div class="navbar-collapse collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-left">
                     <li><button class="btn navbar-btn button" data-toggle="modal" data-target="#Modalleaderboard"> LEADERBOARD</button>
	  			<li><button class="btn navbar-btn button" data-toggle="modal" data-target="#Modalrules">RULES</button>
                     </ul>
                     <ul class="nav navbar-nav navbar-right">     
                         <p class="navbar-text" style="color: white"><?php echo "LOGGED IN AS : {$that_row['name']}&nbsp&nbsp&nbsp"; ?></p>
	  			<li><button class="btn  navbar-btn button " data-toggle="modal" data-target="#Modallogout"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</button>
              </ul>	
            </div>
	  		</div>
	  	</nav>
    <div id="main">
        <div class="container">
            <div class="row row1">
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <div class="question-back">
                    	<?php 
						$state=$status_row["status"];
						$question_query="SELECT question,UID,hint,qid from questions,login WHERE qid='$state' AND UID='$uid'";
						$question_result=mysqli_query($connection,$question_query);
						$question_row=mysqli_fetch_assoc($question_result);
						$img_query="SELECT img1,img2,img3,img4,imgcount FROM questions WHERE qid='$state'";
						$img_result=mysqli_query($connection,$img_query);
						$img_row=mysqli_fetch_assoc($img_result);
					if($_GET['ans']==2)
						{
							echo "<div class=\"alert alert-success\">
							  <strong>Success!</strong> You have advanced one level
							</div>";
						}
					if($_GET['ans']==0)
						{
							echo "<div class=\"alert alert-danger\"
								<strong>Your answer is wrong</strong>
								</div>";
						}
					?>
                        <div class="question">
                            <?php
                            echo "<h3 style=\"color: black\">QUESTION {$question_row['qid']}</h3>";
							$question=$question_row['question'];
							echo "<h3 style=\"color: black\">{$question}</h3>";
							?>
							<?php if($img_row['imgcount']>0) { ?>
              <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><img src="assets/images/<?php echo $img_row['img1']; ?>";" class="img-responsive" style="width: 100%" /></div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><img src="assets/images/<?php echo $img_row['img2']; ?>";" class="img-responsive" style="width: 100%" /></div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
              </div>
              <br>
              <?php } ?>
							<br>
							<?php if ($img_row['imgcount']==3) { ?>
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><img src="assets/images/<?php echo $img_row['img3']; ?>";" class="img-responsive" style="width: 100%" /></div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
							</div>
							<?php } ?>
							<?php if ($img_row['imgcount']==4) { ?>
							<div class="row">
								<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><img src="assets/images/<?php echo $img_row['img3']; ?>";" class="img-responsive" style="width: 100%" /></div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><img src="assets/images/<?php echo $img_row['img4']; ?>";" class="img-responsive" style="width: 100%" /></div>
								<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
							</div>
							<?php } ?>
                            <fieldset class="qinput"></fieldset>                       
                        </div>
                        <center>
                        <button class="button <?php if($question_row['hint']=="") echo "hidden"; ?>" data-toggle="collapse" data-target="#hint">HINT</button>
          <div id="hint" class="collapse">
            <h4 style="color: black"><?php echo ucfirst($question_row['hint']);  ?></h4>
            <br />  
          </div>
        </center>
                        <div class="answer">
                               <div class="ans">
                                <h2>Answer</h2>
                                </div>
                                    <form action="processing.php" method="POST">
                                    	<div class="form-group field col-lg-12">
                                        <input type="text" class="form-control" id="answer" placeholder="Enter Answer" name="ans">
                                    </div>
						<!-- <input type="text" class="form-control" style="width: 80%" name="ans" value=""> -->
						<button class="btn btn-info" type="submit" name="submit" value="SUBMIT">SUBMIT</button>
					</form>
                                    
                                        <!-- <button type="submit" class="btn btn-default" ><b>Submit</b></button> -->
                        </div>
                        
                    </div>
                </div>
               <div class="col-lg-1 col-md-1"></div> 
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-lg-12 col-xs-12">
                      <div class="table table1">
                            <h2 style="text-align: center; padding-top: 10px;">Answer to special questions</h2>
                                  <table class="table table2">
                                     <tbody style="color: black; font-size: 20px; text-align: center;">
                                       <?php
                                          $ieee_query="SELECT id,des FROM ieee";
                                          $ieee_result = mysqli_query($connection,$ieee_query);
                                          $desc_query="SELECT count(*) FROM questions WHERE status=1 AND qid<'$state'";
                                          $desc_result=mysqli_query($connection,$desc_query);
                                          $desc_row=mysqli_fetch_assoc($desc_result);
                                          $desc_num=$desc_row['count(*)'];
                                          for($i = 0;$i<8;$i++) {
                                            $k=$i+1;
                                            $ieee_row = mysqli_fetch_assoc($ieee_result);
                                            $msg = "not answered yet";
                                            $color = "red";
                                            if($desc_num!=0) {
                                              $msg = $ieee_row['des'];
                                              $color = "green";
                                              $desc_num-=1;
                                            }
                                            echo "<tr>";
                                            echo "<td> {$k} </td>";
                                            echo "<td style='color: {$color}'>{$msg}</td>";
                                            echo "</tr>";
                                          }
                                       ?>
                                      </tbody>
                            </table>
                            </div>
                        </div>
                      </div>
                    </div>
                    
                    </div>
                </div>    
            </div>
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <div id="Modalrules" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Rules</h3>
                  </div>
                  <div class="modal-body">
                    <ul>
                      <li>Questions cannot be skipped. Only after attempting all previous questions can a player attempt the next question.</li>
                      <li>There is only one correct answer.</li>
                      <li>Adhere to the topic mentioned with each answer while answering the question.</li>
                      <li>You can attempt a question any number of times.</li>
                      <li>Only the special question answers are visible to the player after he/she has answered those questions.</li>
                      <li>The special question answers serve as clues to the final answer of the game.</li>
                      <li>Hints will be updated regularly.</li>
                      <li>In case of multiple people completing all the questions only the top few will be shortlisted for the interview. Those qualified will be notified via mail.</li>
                    </ul>
                  </div>
                </div>
              </div>
      </div>
      <div id="Modallogout" class="modal fade" role="dialog" data-keyboard="false">
             <div class="modal-dialog">
  							<div class="modal-content">
  								<div class="modal-header text-center">
  									<button type="button" class="close" data-dismiss="modal">&times;</button>
  									<h3 class="modal-title">ATTENTION</h3>
  									<br />
  								</div>
  								<div class="modal-body">
  									<br />
  									<h4>Are you sure you want to Logout?</h4>
  									<br />
  									<br />
  									<p>Your progress will be saved</p>
  									<br />
  									<center>
  									<a href="logout.php"><button type="button" class="btn btn-danger">YES</button></a>  
  									<button type="button" class="btn btn-primary" data-dismiss="modal">Keep Playing</button>
  									</center>
  								</div>
  							</div>
  						</div>
      </div>
      <div id="Modalleaderboard" class="modal fade" role="dialog"  data-keyboard="false">
              <div class="modal-dialog">
  							<div class="modal-content">
  								<div class="modal-header text-center">
  									<button type="button" class="close" data-dismiss="modal">&times;</button>
  									<h3 class="modal-title">Leaderboard</h3>
  									<br />
  								</div>
  								<div class="modal-body">
  									<center>
										<br />
										<br />
										<div class="table-responsive">
											<table class="table table-striped table-bordered table-condensed">
												<thead>
													<tr>
														<td>RANK</td>
														<td>USER ID</td>
														<td>LEVEL</td>
													</tr>
												</thead>
												<tbody>
													<?php
														$rank=1;
														$leader_query="SELECT name,UID,status FROM login ORDER BY SCORE DESC,timelast ASC";
														$leader_result=mysqli_query($connection,$leader_query);
														$leader_count=mysqli_num_rows($leader_result);
														while($leader_count>0)
														{
															$leader_row=mysqli_fetch_assoc($leader_result);
															echo "<tr>";
															echo "<td>{$rank}</td>";
															echo "<td>{$leader_row['UID']}</td>";
															if($leader_row['status']==30)
																echo "<td>COMPLETED</td>";
															else
																echo "<td>{$leader_row['status']}</td>";
															echo "</tr>";
															$rank++;
															if($rank==6)
																break;
															$leader_count-=1;
														}
														
													?>
												</tbody>
											</table>
										</div>	
									</center>

  								</div>
  							</div>
  						</div>
      </div>
</body>
</html>