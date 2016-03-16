<?php
    include 'db_connect.php';
    $nxtDomId = $_POST['nxtDomId'];

    $result1 = mysqli_query($conn , "select * from table1 WHERE id=".$nxtDomId." ORDER BY id ASC LIMIT 1");
    if (mysqli_num_rows($result1)>0) {

	    $j=0;
	    $row1 = mysqli_fetch_array($result1);

	    $id = $row1['0'];
	    $catname = $row1['1'];
	    $catnextptr = $row1['2'];
	    $imageLink = $row1['3'];
		$j++;

		echo "<div class='mainClass' id='landingDiv".$row1[0]."'>";
			echo "<header>";
				echo "<div class='container' style='height:70%'>";
					echo "<div class='jumbotron'>";
						echo "<h1 style='color:#000000;'>Schema Summary For ".$row1[1]." Domain</h1>";
						echo "<br></br>";
						echo "<button type='button' class='btn btn-primary' onclick='hideLanding(".$row1[0].")'>Click Here to Start</button>";
						echo "<br></br><br></br>";
						echo "<p class='bg-danger' style='color:#000000;'>Note :- Please do not reload or press back while submmitting the survey </p>";
					echo "</div>";
				echo "</div>";
			echo "</header>";
		echo "</div>";



		echo "<div class = 'mainClass classToHide categoryContainer' id= 'catid".$id."'>";

		echo "<div class='container-fluid'>";



		$result = mysqli_query($conn,"select * from qa where categoryid = '$id'");
		$i = 0 ;



		while($row = mysqli_fetch_array($result)){

			if($i != 0 ){
				echo "<div class='secondClass rd-ques' id ='q".$row[0]."' ><label>&nbsp;<strong>".($i+1).". ".$row[1]."</strong></label><br><ul>";
        echo "<div class='row'><div class='col-md-7' style='margin-top:10px;'>";
				if($row[2] != NULL){
					echo "<li class='answerlabels'><input type='radio' class='radStyle' name='".$row[0]."' value = '".$row[2]."'>".$row[2]."</input></li>";

				}
				if($row[3] != NULL){
					echo "<li class='answerlabels'><input type='radio' class='radStyle' name='".$row[0]."' value = '".$row[3]."'>".$row[3]."</input></li>";

				}
				if($row[4] != NULL){
					echo "<li class='answerlabels'><input type='radio' class='radStyle' name='".$row[0]."' value = '".$row[4]."'>".$row[4]."</input></li>";

				}
				if($row[5] != NULL){
					echo "<li class='answerlabels'><input type='radio' class='radStyle' name='".$row[0]."' value = '".$row[5]."'>".$row[5]."</input></li>";

				}
				if($row[6] != NULL){
					echo "<li class='answerlabels'><input type='radio' class='radStyle' name='".$row[0]."' value = '".$row[6]."'>".$row[6]."</input></li>";

				}
        echo "</div>"; // closing column 1
        echo "<div class='col-md-3'>";
				if ($row[7] == 1){
					echo "<li><textarea type='text' placeholder='Additional Commments' style='height:70px;' class='textClass' name='textEq".$row[0]."' value=''></textarea></li>";
				}
        echo "</div>"; // close coloumn 2;
        echo "<div class='col-md-2'>"; // open col 3
				if($row[2] == NULL && $row[3] == NULL && $row[4] == NULL && $row[5] == NULL && $row[6] == NULL ){
					echo "<li><input type='text' class='textClass' name='".$row[0]."' value = ''></input></li>";
				}
	// else {
	//   echo "<input type='text' name='text".$row[0]."'>";
	//
	// }
				if($row[9] != 0){
					echo "<li><input type='button' class='nextBtn btn btn-primary margin-15' onClick='SwapDivsWithClick(`q".$row[0]."`,`q".$row[9]."`,".$row[0].")' value='Next'></input></li></div>";

				}
				else{
					if($catnextptr != 0){
						echo "<li><input type='button' class='nextBtn btn btn-primary margin-15' onClick='calculateTime1(`q".$row[0]."`,`catid".$id."`,`catid".$catnextptr."`,`".$row[0]."`)'  value='Next'></input></li></div>";
					}
					else {
						echo "<li><input type='submit' class='nextBtn btn btn-primary margin-15' onClick='calculateTime1(`q".$row[0]."`,`catid".$id."`,`catid".$catnextptr."`,`".$row[0]."`)'></input></li></div>";
					}
				}
				$i++;
				echo "<input type='hidden' name='hiddenTimer1q".$row[0]."' id='hiddenTimer1q".$row[0]."'></input>";
        	echo "</div></div>";
			}
			else{

				echo "<div class='mainClass rd-ques' id ='q".$row[0]."' ><label>&nbsp;<strong>".($i+1).". ".$row[1]."</strong></label><br><ul>";
        echo "<div class='row'><div class='col-md-7' style='margin-top:10px;'>";
				if($row[2] != NULL){
					echo "<li class='answerlabels'><input type='radio' name='".$row[0]."' value = '".$row[2]."'>".$row[2]."</input></li>";

				}
				if($row[3] != NULL){
					echo "<li class='answerlabels'><input type='radio' name='".$row[0]."' value = '".$row[3]."'>".$row[3]."</input></li>";

				}
				if($row[4] != NULL){
					echo "<li class='answerlabels'><input type='radio' name='".$row[0]."' value = '".$row[4]."'>".$row[4]."</input></li>";

				}
				if($row[5] != NULL){
					echo "<li class='answerlabels'><input type='radio' name='".$row[0]."' value = '".$row[5]."'>".$row[5]."</input></li>";

				}
				if($row[6] != NULL){
					echo "<li class='answerlabels'><input type='radio' name='".$row[0]."' value = '".$row[6]."'>".$row[6]."</input></li>";

				}
        echo "</div>"; // closing column 1
        echo "<div class='col-md-3'>";
				if ($row[7] == 1){
					echo "<li><textarea type= 'text' placeholder='Additional Commments' style='height:70px;' class='textClass' name='textEq".$row[0]."' value=''></textarea></li><br>";
				}
        echo "</div>"; // close coloumn 2;
        echo "<div class='col-md-2'>"; // open col 3

				if($row[2] == NULL && $row[3] == NULL && $row[4] == NULL && $row[5] == NULL && $row[6] == NULL ){
					echo "<li><input type='text' class='textClass' name='".$row[0]."' value = ''></input></li><br>";

				}
	// else {
	//   echo "<input type='text' name='text".$row[0]."'>";
	//
	// }
				if($row[9] != 0){
					//echo "<li><button type='button' class='startTimerr btn btn-warning' style='margin-right:15px;' id='".$id."' onClick='sttime(this)'>Start Timer</button></li>";
					echo "<li><input type='button' class='nextBtn btn btn-primary abb  margin-15' onClick='SwapDivsWithClick(`q".$row[0]."`,`q".$row[9]."`,".$row[0].")' value='Next'></input></li></div>";
	//echo "<button type='button' class='startButton btn btn-primary' onClick='sttime()'>Start Time</button>";
				}
				else{
					if($catnextptr != 0){
						echo "<li><input type='button' class='nextBtn btn btn-primary  margin-15' onClick='calculateTime1(`q".$row[0]."`,`catid".$id."`,`catid".$catnextptr."`,`".$row[0]."`)'  value='Next'></input></li></div>";
					}
					else {
						echo "<li><input type='submit' class='nextBtn btn btn-primary  margin-15' onClick='calculateTime1(`q".$row[0]."`,`catid".$id."`,`catid".$catnextptr."`,`".$row[0]."`)'></input></li></div>";

					}
				}
				$i++;
				echo "<input type='hidden' name='hiddenTimer1q".$row[0]."' id='hiddenTimer1q".$row[0]."'></input>";
        echo "</div></div>";
			}

		}
		echo "<div class='LoaderDiv'>";
		echo "<div class='panel-group'><div class='panel panel-default'><div class='panel-heading'><b><strong style='font-size:20px;'>".$row1[1]."</strong></b><a href='./img/image".$id.".png' target='_blank'>&nbsp;&nbsp; Open in a new Tab</a></div><div class='panel-body'>";
		echo "<div id='pcontainer".$id."' class='pancontainer'>";
		echo "<img src='./img/image".$id.".png' width='1440' height='892'/>";
		echo "</div>";
	//  <!-- <button onClick="panimage1.zoom('+1')" class="btn btn-default">zoom In</button> <button class="btn btn-default"onClick="panimage1.zoom('-1')">zoom out</button> <button  class="btn btn-default" onClick="panimage1.zoom(1)">reset</button> -->
	//echo "<button type='button' class='startTimerr btn btn-warning' style='margin-top:5px;' id='".$id."' onClick='sttime()'>Start Timer</button>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
		echo "</div></div></div>";
		echo "<script>
			var panimage".$id."
			jQuery(function($){
				panimage".$id." = new imagepanner({
			wrapper: $('#pcontainer".$id."'),
			imgpos: [100, 300],
			maxlevel: 4
			})
			})
		</script>";
    }
    else{
    	echo 	'<div class="container">
				  <div class="container">
				    <div class="jumbotron" style="border: 1px solid #000000;margin:30px;">
				        <h1>Thank You</h1>
				        <p>Your Response has been successlly Recorded.!</p>
				      </div>
				  </div>
				</div>';
    }
	?>
