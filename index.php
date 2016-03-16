<?php
  session_start();
  include 'db_connect.php';
  $length = 10;
  $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $uid = substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
  $_SESSION['uid'] = $uid;
  $_SESSION['starttime'] = time();
  // write Sql query for user id here.
?>

<html>
<head>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/imagepanner.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <link rel="stylesheet" href="css/index.css"></link>
<!-- Custom CSS -->
<!-- Custom Fonts -->
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <!-- <script>
    $(".nextBtn").click(function(){
      $('html, body').animate({scrollTop:0}, 'slow');
  });
  </script> -->
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
li{

	display: inline-flex;
}
.secondClass{
  display: none;
}
/*.abb{
  visibility: hidden;
}*/
.mainClass{
display: block;
}
#initiallyHidden{
  display: none;
}
.wrapper{
  margin-left: 10%;
      margin-right: 10%;
}

.classToHide{
  display: none;
}

/*.startTimerr{
  position: absolute;
  top: 0px;
  right: 0px;
}*/
.textClass{
  margin-top: 10px;
  width:200px;
  /*height: 100px;*/
  margin-left: 10px;
}
/* demo styles. Remove if desired */
  #pcontainer1{
    width: 100%;
    height: 70%;
  }
  @media screen and (max-width: 780px){ /* responsive setting */
    #pcontainer1{
      width: 100%;
      height: 70%;
    }
  }
  /* demo styles. Remove if desired */
  #pcontainer2{
    width: 100%;
    height: 70%;
  }
  @media screen and (max-width: 780px){ /* responsive setting */
    #pcontainer2{
      width: 100%;
      height: 70%;
    }
  }
      /* demo styles. Remove if desired */
      #pcontainer3{
        width: 100%;
        height: 70%;
      }
      @media screen and (max-width: 780px){ /* responsive setting */
        #pcontainer3{
          width: 100%;
          height: 70%;
        }
      }
      /* demo styles. Remove if desired */
      #pcontainer4{
        width: 100%;
        height: 70%;
      }
      @media screen and (max-width: 780px){ /* responsive setting */
        #pcontainer4{
          width: 100%;
          height: 70%;
        }
      }

      /* demo styles. Remove if desired */
      #pcontainer5{
        width: 100%;
        height: 70%;
      }

      @media screen and (max-width: 780px){ /* responsive setting */
        #pcontainer5{
          width: 100%;
          height: 70%;
        }
      }

      .pancontainer{
        text-align: center;
      }

	input[type=radio]{
	  width: 40;
	}
	.rudy-head{
    	color: #18BC9C;
	}
	.questionContainer,.categoryContainer,body{
    	/*background-color: #18BC9C;*/
    	/*#48BF97*/
      background: rgba(184,184,184,1);
background: -moz-linear-gradient(left, rgba(184,184,184,1) 0%, rgba(179,179,179,1) 0%, rgba(207,207,207,1) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(184,184,184,1)), color-stop(0%, rgba(179,179,179,1)), color-stop(100%, rgba(207,207,207,1)));
background: -webkit-linear-gradient(left, rgba(184,184,184,1) 0%, rgba(179,179,179,1) 0%, rgba(207,207,207,1) 100%);
background: -o-linear-gradient(left, rgba(184,184,184,1) 0%, rgba(179,179,179,1) 0%, rgba(207,207,207,1) 100%);
background: -ms-linear-gradient(left, rgba(184,184,184,1) 0%, rgba(179,179,179,1) 0%, rgba(207,207,207,1) 100%);
background: linear-gradient(to right, rgba(184,184,184,1) 0%, rgba(179,179,179,1) 0%, rgba(207,207,207,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b8b8b8', endColorstr='#cfcfcf', GradientType=1 );

	}
	@media (min-width: 768px){
		header .container {
		    padding-top: 125px;
		    padding-bottom: 80px;
		}
	}
	.container-fluid{
	    /*padding: 30px;*/
	}
	.rd-ques{
		margin: 10px;
	    background-color: #F5F5F5;
	    border-radius: 5px;
	    padding-bottom: 20px;
      box-shadow:  2px 2px #888888;
	}
	.margin-15{
		margin-left: 15px;
	}
</style>
</head>
<body>

<!-- Navigation -->
<?php

    $result1 = mysqli_query($conn , "select * from table1 ORDER BY id ASC LIMIT 1");
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
					echo "<p class='bg-danger' style='color:#000000;'>Note :- Please do not reload or press back while submitting the survey </p>";
				echo "</div>";
			echo "</div>";
		echo "</header>";
	echo "</div>";



	echo "<div class = 'mainClass classToHide categoryContainer' id= 'catid".$id."'>";

// load the image for categoryid 1 ;

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
				echo "<li><textarea type='text' placeholder='Additional Commments' style='height:100px; width:250px;' class='textClass' name='textEq".$row[0]."' value=''></textarea></li>";
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
				echo "<li><textarea type='text' placeholder='Additional Commments' style='height:100px;width:250px;' class='textClass' name='textEq".$row[0]."' value=''></textarea></li><br>";
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
	echo "<div class='panel-group'><div class='panel panel-default'><div class='panel-heading' style='font-size:14px;'><b><Strong style='font-size:20px;'>".$row1[1]."</strong></b> <a href='./img/image".$id.".png' target='_blank'>&nbsp;&nbsp;View in a new Tab</a></div><div class='panel-body'>";
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


	?>


<!-- <script>
  $(".nextBtn").click(function(){
    $('html, body').animate({scrollTop:300}, 'slow');
});
</script> -->
<script src="js/jquery.kinetic.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.mousewheel.min.js"></script>
<script src="js/imagepanner.js"></script>
<script src="js/jquery.simple.timer.js"></script>
<script>
// recent Changes
function hideLanding(domainId){
	var p = "landingDiv"+domainId;
	var dateVar = new Date();
	timeVar = dateVar.getTime();
	var ff = "catid"+domainId;
	$('#'+p).hide("slow");
	$('#'+ff).show("slow");
  if (domainId == 1){
    $.ajax({
      type : "POST",
      url : "logUser.php",
    });
  }
  sttime();

}
function sttime(elem){
	var x = 1;
	$('.startButton').hide();
// if (x == 1){
//   //document.getElementsByClassName('abb').style.visibility = 'visible';
//   x++;
// }
//$('.startTimerr').hide()

//enable the next button and hide start timer
// $(elem).hide();
// $(elem).siblings('.nextBtn').removeAttr('disabled');

}

function startTimer(){
	document.getElementById('initiallyHidden').style.display = "block";
	document.getElementById('stbtn').style.display = "none";
}


function SwapDivsWithClick(div1,div2,param1,lastQues){
	var x = document.getElementsByName(param1);
	m = '';
	if($("input[name='"+param1+"']").is(':radio') && $("input[name='"+param1+"']:checked").val())
	{
		questionNo  = param1;
		answerValue = $("input[name='"+param1+"']:checked").val();
		var temp = "textEq"+param1;
		if($("input[name='"+temp+"']").length >=1){
			m = $("input[name='"+temp+"']").val();
			//alert(m);
		}
        if($("textarea[name='"+temp+"']").length >=1){
			m = $("textarea[name='"+temp+"']").val();
			//alert(m);
		}
		if (!lastQues) {
			d1 = document.getElementById(div1);
			d2 = document.getElementById(div2);
			// $('#'+div1).fadeOut("100");
			// $('#'+div2).fadeIn("100");
			d1.style.display = "none";
			d2.style.display = "block";
		}

		calculateTime(div1);
	}
	else if($("input[name='"+param1+"']").is(':text')){
		questionNo  = param1;
		answerValue = $("input[name='"+param1+"']:checked").val();
		var temp = "textEq"+param1;
		if($("input[name='"+temp+"']").length >=1){
			m = $("input[name='"+temp+"']").val();
			alert(m);
		}
        if($("textarea[name='"+temp+"']").length >=1){
			m = $("textarea[name='"+temp+"']").val();
			//alert(m);
		}
     
		if (!lastQues) {
			d1 = document.getElementById(div1);
			d2 = document.getElementById(div2);
			// $('#'+div1).fadeOut("100");
			// $('#'+div2).fadeIn("100");
			d1.style.display = "none";
			d2.style.display = "block";
		}
		calculateTime(div1);
	}
	else{
		alert("Please select 1 option");
	}
}

function calculateTime(div1){
	var Date2 = new Date();
	endTime = Date2.getTime();
	finaltime = endTime - timeVar;
	//alert(finaltime);
	var x = finaltime/1000;

	$.ajax({
		type: "POST",
		url: "savenext.php",
		data: { questionNo : questionNo , answerValue : answerValue , x : x , m : m }
	});
	timeVar = Date2.getTime();
}

// called for last question
function calculateTime1(div1,div2,div3,param1){
	var Date2 = new Date();
	endTime = Date2.getTime();
	finaltime = endTime - timeVar;
	var x = "hiddenTimer1"+div1;
	document.getElementById(x).value = finaltime/1000;

	SwapDivsWithClick(div2,div3,param1,1);
	nxtDom = div3.split('catid');
	//next dmain ID
	nxtDomId = nxtDom[1];

	//load next domain in body
	$.ajax({
		url: 'generateNextDomain.php',
		type: 'POST',
		data: {nxtDomId: nxtDomId}
	})
	.done(function(response) {
		$('.mainClass').remove();
		$('body').prepend(response);
	})

}
</script>

<script>
	var panimage1 // register arbitrary variable
	jQuery(function($){
		panimage1 = new imagepanner({
	wrapper: $('#pcontainer1'), // jQuery selector to image container
	imgpos: [300, 300], // initial image position- x, y
	maxlevel: 5 // maximum zoom level
	})
	})
</script>
<script type="text/javascript">
        $(document).ready(function() {
           $("form").bind("keypress", function(e) {
              if (e.keyCode == 13) {
                 return false;
              }
           });
        });
</script>

<script>




</script>


</body>
</html>
