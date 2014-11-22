<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="list.png" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-default" role="navigation">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <a class="navbar-brand" href="http://umdearborn.edu/">
			<img alt="Brand" src="UofMichigan_logo.png" height="35">
		  </a>
		</div>
	  </div>
	</nav>
	 <?php
         // variables used in script
		 $umid = isset($_POST[ "umidInput" ]) ? $_POST[ "umidInput" ] : "";
         $fname = isset($_POST[ "fNameInput" ]) ? $_POST[ "fNameInput" ] : "";
         $lname = isset($_POST[ "lNameInput" ]) ? $_POST[ "lNameInput" ] : "";
		 $project = isset($_POST[ "projectInput" ]) ? $_POST[ "projectInput" ] : "";
         $email = isset($_POST[ "emailInput" ]) ? $_POST[ "emailInput" ] : "";
         $phone = isset($_POST[ "phoneInput" ]) ? $_POST[ "phoneInput" ] : "";
         $slot = isset($_POST[ "courseSelection" ]) ? $_POST[ "courseSelection" ] : "";
         $iserror = false;
		 $seats=array(6);
		 $remSeats=array(6);
		 $test='fdsafdsa';
         $formerrors =
            array( "umiderror" => false, "fnameerror" => false, "lnameerror" => false,
               "projecterror" => false,"emailerror" => false, "phoneerror" => false );

         // array of timelsots
         $timeslot = array( "12/4/14, 6:00 PM – 7:00 PM","12/4/14, 7:00 PM – 8:00 PM",
            "12/4/14, 8:00 PM – 9:00 PM","12/5/14, 6:00 PM – 7:00 PM",
			"12/5/14, 7:00 PM – 8:00 PM","12/5/14, 8:00 PM – 9:00 PM");

         // array of name values for the text input fields
         $inputlist = array( "umid"=>"UMID","fname" => "First Name",
            "lname" => "Last Name", "project"=>"Project", "email" => "Email",
            "phone" => "Phone" );
			
			// Connect to MySQL
               if ( !( $database = mysql_connect( "cis435p3ac3.czudvkxtbnxr.us-west-2.rds.amazonaws.com:3306",
                  "root", "cis435ac"  ) ) )
                  die( "<p>Could not connect to database</p>" );

               // open registration database
               if ( !mysql_select_db( "registration", $database ) )
                  die( "<p>Could not open registration database</p>" );
				 
				for ($i=0;$i<6;$i++)
				{
					$query = mysql_query("SELECT COUNT(UMID) FROM students 
										WHERE timeslot='$timeslot[$i]'",$database);
					$result = mysql_fetch_row($query);
					$seats[$i]= $result[0];	
					$remSeats[$i]=6-$seats[$i];
				}
				
         // build INSERT query
         if ( isset( $_POST["submit"] ) )
         {
			$query2 = mysql_query("SELECT * FROM students WHERE umid='$umid'");
			if (mysql_num_rows($query2)==0)
			{
				$query3 = "INSERT INTO students " .
                  "( umid, fname, lname, project, email, phone, timeslot ) " .
                  "VALUES ( '$umid','$fname', '$lname','$project', '$email', " .
                  "'" . mysql_real_escape_string( $phone ) .
                  "', '$slot' )";
			// execute query in registration database
               if ( !( $result = mysql_query( $query3, $database ) ) )
               {
                  print( "<p>Could not execute query!</p>" );
                  die( mysql_error() );
               } // end if
			   
			   print( "<div class='alert alert-success' role='alert'>Successfully Signed up!</div>
			   <p>Hi $fname. Thanks for signing up for a time 
			   slot for your project presentation. You can sign up for 
			   a different time slot if there are  still space available</p>
                  <p class = 'head'>The following information has been
                     saved in our database:</p>
                  <p>Name: $fname $lname</p>
				  <p>UMID: $umid</p>
				  <p>Project: $project</p>
                  <p>Email: $email</p>
                  <p>Phone: $phone</p>
				  <p>Time Slot: $slot</p>
                  <p></p>
                  <p><a href = 'registerFormDatabase.php'>Click here to view
                     entire database.</a></p>
                  </body></html>" );
               die(); // finish the page
			}
			else
			{
					$query4 = "UPDATE students SET fname='$fname', lname='$lname',
							project='$project', email='$email', phone='$phone', timeslot='$slot' WHERE umid='$umid'";
					// execute query in registration database
				   if ( !( $result = mysql_query( $query4, $database ) ) )
				   {
					  print( "<p>Could not execute query!</p>" );
					  die( mysql_error() );
				   } // end if
				   
				   print( "<div class='alert alert-success' role='alert'>Successfully Updated!</div>
				   <p>Hi $fname. Thanks for updating for a time slot for your project presentation.</p>
					  <p class = 'head'>The following information has been updated in our database:</p>
					  <p>Name: $fname $lname</p>
					  <p>UMID: $umid</p>
					  <p>Project: $project</p>
					  <p>Email: $email</p>
					  <p>Phone: $phone</p>
					  <p>Time Slot: $slot</p>
					  <p></p>
					  <p><a href = 'registerFormDatabase.php'>Click here to view
						 entire database.</a></p>
					  </body></html>" );
					die(); // finish the page
			}
			mysql_close( $database );
          }// end if
	print("	  
	<div class='row'>
	<div class='container-fluid'>
		<div class='row'>
		<div class='col-md-4'></div>
		<div class='col-md-4'>
			<h1>CIS435 - Web Technology Project Registration</h1>
			<p class='lead text-muted'> Please fill in <em>all</em> text fields below and select a time slot you'd like to register for your project demonstration. </p>
			<form role='form' method='post' action='index.php'>
				  <div class='form-group'>
					<label for='umidInput'>UMID</label>
					<input type='digits' class='form-control' name='umidInput' id='umidInput' placeholder='Enter UMID'  >
					<span class='text-danger' id='indicator'></span>
				  </div>
				  <div class='form-group'>
					<label for='fNameInput'>First Name</label>
					<input type='text' class='form-control' name='fNameInput' id='fNameInput' placeholder='Enter First Name' >
					<span class='text-danger' id='indicator2'></span>
				  </div>
				  <div class='form-group'>
					<label for='lnameInput'>Last Name</label>
					<input type='text' class='form-control' name='lNameInput' id='lNameInput' placeholder='Enter Last Name'  >
					<span class='text-danger' id='indicator3'></span>
				  </div>
				  <div class='form-group'>
					<label for='projectInput'>Project Title</label>
					<input type='text' class='form-control' name='projectInput' id='projectInput' placeholder='Enter Project Title'  >
					<span class='text-danger' id='indicator4'></span>
				  </div>
				  <div class='form-group'>
					<label for='emailInput'>Email address</label>
					<input type='email' class='form-control' name='emailInput' id='emailInput' placeholder='Enter Email' >
					<span class='text-danger' id='indicator5'></span>
				  </div>
				  <div class='form-group'>
					<label for='phoneInput'>Phone Number</label>
					<input type='text' class='form-control bfh-phone' name='phoneInput' id='phoneInput' placeholder='Enter Phone number' onblur='formatPhone(this);'>
					<span class='text-danger' id='indicator6'></span>
				  </div>
			
			<div class='radio'>
				<table class='table table-striped'>
					<tr>
						<td>Date</td>
						<td>Time</td>
						<td>Seats Remaining</td>
					</tr>
					<tr>
						<td><label><input type='radio' name='courseSelection' id='optionsRadios1' value='12/4/14, 6:00 PM – 7:00 PM'>
						12/4/14</label></td>
						<td>6:00 PM - 7:00 PM</td>
						<td id='remSeats1'>$remSeats[0]</td>
					</tr>
					<tr>
						<td><label><input type='radio' name='courseSelection' id='optionsRadios2' value='12/4/14, 7:00 PM – 8:00 PM'>
						12/4/14</label></td>
						<td>7:00 PM - 8:00 PM</td>
						<td id='remSeats2'>$remSeats[1]</td>
					</tr>
					<tr>
						<td><label><input type='radio' name='courseSelection' id='optionsRadios3' value='12/4/14, 8:00 PM – 9:00 PM'>
						12/4/14</label></td>
						<td>8:00 PM - 9:00 PM</td>
						<td id='remSeats3'>$remSeats[2]</td>
					</tr>
					<tr>
						<td><label><input type='radio' name='courseSelection' id='optionsRadios4' value='12/5/14, 6:00 PM – 7:00 PM'>
						12/5/14</label></td>
						<td>6:00 PM - 7:00 PM</td>
						<td id='remSeats4'>$remSeats[3]</td>
					</tr>
					<tr>
						<td><label><input type='radio' name='courseSelection' id='optionsRadios5' value='12/5/14, 7:00 PM – 8:00 PM'>
						12/5/14</label></td>
						<td>7:00 PM - 8:00 PM</td>
						<td id='remSeats5'>$remSeats[4]</td>
					</tr>
					<tr>
						<td> <label><input type='radio' name='courseSelection' id='optionsRadios6' value='12/5/14, 8:00 PM – 9:00 PM'>
						12/5/14</label></td>
						<td>8:00 PM - 9:00 PM</td>
						<td id='remSeats6'>$remSeats[5]</td>
					</tr>
				</table>
				<span class='text-danger' id='indicator7'></span>
			</div>
			<button type='submit' name='submit' id='submit' class='btn btn-primary' >Submit</button>
			</form>
		</div>
		<div class='col-md-4'></div>
		</div>
	</div>
	</div>");
	?>
	 <div class="footer">
      <div class="container">
        <p class="text-muted">Created by Angela Chen</p>
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/jquery.js"></script>
	<!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script>
		function validateInput(id){	
			if($("#"+id).val()==null || $("#"+id).val()=="")	//check if input field is empty
			{
				//alert(id+" Please fill in the input");
				var div =$("#"+id).closest("div");
				div.addClass("has-error");
				return false;
			}
			else
			{
				var div =$("#"+id).closest("div");
				div.removeClass("has-error");
				return true;
			}
		}
		function umidCheck(umid){
			var isNum=/^\d{8}$/.test(umid);
			return isNum;
		}
		function  nameCheck(name){
			var isLetter = /^[A-Za-z ]+$/.test(name);
			return isLetter;
		}
		function  emailCheck(email){
			var mailformat = /^\w+([\.-_]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email);
			//alert("Here2"+mailformat);
			return mailformat;
		}
		function phoneCheck(phone){
			var phoneformat = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/.test(phone);
			return phoneformat;
		}
		function formatPhone(obj) {
			var numbers = obj.value.replace(/\D/g, ''),
				char = {3:'-',6:'-'};
			obj.value = '';
			for (var i = 0; i < numbers.length; i++) {
				obj.value += (char[i]||'') + numbers[i];
			}
		}
		

		$(document).ready(
			
			function()
			{	
				if (document.getElementById("remSeats1").innerHTML==0){
					document.getElementById("remSeats1").innerHTML="Time Slot Full";
					document.getElementById("optionsRadios1").disabled=true;
				}
				if (document.getElementById("remSeats2").innerHTML==0){
					document.getElementById("remSeats2").innerHTML="Time Slot Full";
					document.getElementById("optionsRadios2").disabled=true;
				}
				if (document.getElementById("remSeats3").innerHTML==0){
					document.getElementById("remSeats3").innerHTML="Time Slot Full";
					document.getElementById("optionsRadios3").disabled=true;
				}
				if (document.getElementById("remSeats4").innerHTML==0){
					document.getElementById("remSeats4").innerHTML="Time Slot Full";
					document.getElementById("optionsRadios4").disabled=true;
				}
				if (document.getElementById("remSeats5").innerHTML==0){
					document.getElementById("remSeats5").innerHTML="Time Slot Full";
					document.getElementById("optionsRadios5").disabled=true;
				}
				if (document.getElementById("remSeats6").innerHTML==0){
					document.getElementById("remSeats6").innerHTML="Time Slot Full";
					document.getElementById("optionsRadios6").disabled=true;
				}
				$("button").click(function()
					{
						
						
						if (!validateInput("umidInput")){
							document.getElementById("indicator").innerHTML="Please enter your UMID.";
							return false;
						}
						else if (!umidCheck($("#umidInput").val())){
							document.getElementById("indicator").innerHTML="Please enter a valid UMID.";
							var div =$("#umidInput").closest("div");
							div.addClass("has-error");
							return false;
						}
						else
							document.getElementById("indicator").innerHTML="";
						if (!validateInput("fNameInput")){
							document.getElementById("indicator2").innerHTML="Please enter your first name.";
							return false;
						}
						else if (!nameCheck($("#fNameInput").val())){
							document.getElementById("indicator2").innerHTML="Please enter a valid first name.";
							var div =$("#fNameInput").closest("div");
							div.addClass("has-error");
							return false;
						}
						else
							document.getElementById("indicator2").innerHTML="";
						if (!validateInput("lNameInput")){
							document.getElementById("indicator3").innerHTML="Please enter your last name.";
							return false;
						}
						else if (!nameCheck($("#lNameInput").val())){
							document.getElementById("indicator3").innerHTML="Please enter a valid last name.";
							var div =$("#lNameInput").closest("div");
							div.addClass("has-error");
							return false;
						}
						else
							document.getElementById("indicator3").innerHTML="";
						if (!validateInput("projectInput")){
							document.getElementById("indicator4").innerHTML="Please enter your project title.";
							return false;
						}
						else
							document.getElementById("indicator4").innerHTML="";
						if (!validateInput("emailInput")){
							document.getElementById("indicator5").innerHTML="Please enter your email.";
							//alert("email validate");
							return false;
						}
						else if (!emailCheck($("#emailInput").val())){
							document.getElementById("indicator5").innerHTML="Please enter in a valid email.";
							var div =$("#emailInput").closest("div");
							div.addClass("has-error");
						//	alert("here");
							return false;
						}
						else
							document.getElementById("indicator5").innerHTML="";
							
						if(!validateInput("phoneInput")){
							document.getElementById("indicator6").innerHTML="Please enter your phone number.";
							return false;
						}
						else if (!phoneCheck($("#phoneInput").val())){
							document.getElementById("indicator6").innerHTML="Please enter in a valid phone number.";
							var div =$("#phoneInput").closest("div");
							div.addClass("has-error");
							return false;
						}
						else
							document.getElementById("indicator6").innerHTML="";
							
						if (!document.getElementById('optionsRadios1').checked&&!document.getElementById('optionsRadios2').checked &&!document.getElementById('optionsRadios3').checked&&!document.getElementById('optionsRadios4').checked&&!document.getElementById('optionsRadios5').checked&&!document.getElementById('optionsRadios6').checked) {
							document.getElementById("indicator7").innerHTML="Please select a time slot.";
							return false;
						} 
						else
							document.getElementById("indicator7").innerHTML="";
							
						$("form#registration").submit();
					}	
				);
			}
		); //check page loaded completely
		
	</script>
  </body>
</html>