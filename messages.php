<?php 

	include("classes/autoload.php");
	$image_class = new Image();

	$ERROR = "";

	$login = new Login();
	$user_data = $login->check_login($_SESSION['mybook_userid']);
 
 	$USER = $user_data;
 	
 	if(isset($URL[1]) && is_numeric($URL[1])){

	 	$profile = new Profile();
	 	$profile_data = $profile->get_profile($URL[1]);

	 	if(is_array($profile_data)){
	 		$user_data = $profile_data[0];
	 	}

 	}
	 
	$msg_class = new Messages();

  	//new message//check if thread already exists
  	if(isset($URL[1]) && $URL[1] == "new"){

  		$old_thread = $msg_class->read($URL[2]);
  		if(is_array($old_thread)){

  			//redirect the user
  			header("Location: ".ROOT."messages/read/". $URL[2]);
			die;
  		}
  	}

	//if a message was posted
	if($ERROR == "" && $_SERVER['REQUEST_METHOD'] == "POST"){
 
		$user_class = new User();
		if(is_array($user_class->get_user($URL[2]))){

			$ERROR = $msg_class->send($_POST,$_FILES,$URL[2]);

			header("Location: ".ROOT."messages/read/". $URL[2]);
			die;
		}else{
			$ERROR = "The requested user could not be found!";
		}

		
	}

?>

<!DOCTYPE html>
	<html>
	<head>
		<title>Messages | FarmingCom</title>
		<!-- ChatBot -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="css/chat.css">

		<link rel="stylesheet" type="text/css" href="css/jquery.convform.css">
		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.convform.js"></script>
		<script type="text/javascript" src="js/custom.js"></script>
	</head>

	<style type="text/css">
		
		#blue_bar{

			height: 50px;
			background-color: #156815;
			color: #d9dfeb;

		}

		#search_box{

			width: 400px;
			height: 20px;
			border-radius: 5px;
			border:none;
			padding: 4px;
			font-size: 14px;
			background-image: url(search.png);
			background-repeat: no-repeat;
			background-position: right;

		}

		#profile_pic{

			width: 150px;
			border-radius: 50%;
			border:solid 2px white;
		}

		#menu_buttons{

			width: 100px;
			display: inline-block;
			margin:2px;
		}

		#friends_img{

			width: 75px;
			float: left;
			margin:8px;

		}

		#friends_bar{

			min-height: 400px;
			margin-top: 20px;
			padding: 8px;
			text-align: center;
			font-size: 20px;
			color: #405d9b;
		}

		#friends{

		 	clear: both;
		 	font-size: 12px;
		 	font-weight: bold;
		 	color: #405d9b;
		}

		textarea{

			width: 100%;
			border:none;
			font-family: tahoma;
			font-size: 14px;
			height: 60px;

		}

		#post_button{

			float: right;
			background-color: #405d9b;
			border:none;
			color: white;
			padding: 4px;
			font-size: 14px;
			border-radius: 2px;
			width: 50px;
		}
 
 		#post_bar{

 			margin-top: 20px;
 			background-color: white;
 			padding: 10px;
 		}

 		#post{

 			padding: 4px;
 			font-size: 13px;
 			display: flex;
 			margin-bottom: 20px;
 		}

 		#message_left{

 			padding: 4px;
 			font-size: 13px;
 			display: flex;
 			margin: 8px;
 			width: 60%;
 			float: left;
 			border-radius: 10px;
 		}

 		#message_right{

 			padding: 4px;
 			font-size: 13px;
 			display: flex;
 			margin: 8px;
 			width: 60%;
 			float: right;
 			border-radius: 10px;
 			
 		}

 		#message_thread{

 			padding: 4px;
 			font-size: 13px;
 			display: flex;
 			margin: 8px;
   			border-radius: 10px;
 		}

	</style>

	<body style="font-family: tahoma; background-color: #d0d8e4;">
<!-- ChatBot -->
<div class="chat_icon">
	<i class="fa fa-comments" aria-hidden="true"></i>
</div>

<div class="chat_box">
	<div class="my-conv-form-wrapper">
		<form action="" method="GET" class="hidden">

      <select data-conv-question="Hello! How can I help you" name="category">
        <option value="qs1">What are the types of fertilizers used for pineapple cultivation</option>
        <option value="qs2">What is the income of dairy farming?</option>
		<option value="qs3">How do you start growing tea?</option>
      </select>

      <div data-conv-fork="category">
        <div data-conv-case="qs1">
		<input type="text" data-conv-question="Apply 2 tons of Dolomite/ ha two weeks before planting and incorporated well in to soil. Integrated use of organic manure and chemical fertilizer is more beneficial than using either type in isolation. Subsequent fertilizer applications should be done
   along the planting row and may be broadcast onto leaf bases" data-no-answer="true">
        </div>
        <div data-conv-case="qs2" >
		<input type="text" data-conv-question="With one cow giving at least 15 liters of milk in a day, revenue from the sale of milk of one cow comes around Rs. 900." data-no-answer="true">
        </div>
		<div data-conv-case="qs3" >
		<input type="text" data-conv-question="Method of Tea Cultivation: Usually, Tea Plantations/Gardens are set up on the cleared hill slopes where shade trees are already planted in advance. Tea seeds are sown in the germination beds and the saplings transplanted to the garden. Tea Plant Seeds." data-no-answer="true">
        </div>
      </div>

      <input type="text" name="name" data-conv-question="Please, Enter your name">

      <input type="text" data-conv-question="Hi {name}, <br> It's a pleasure to meet you." data-no-answer="true">

      <input data-conv-question="Enter your e-mail" data-pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" type="email" name="email" required placeholder="What's your e-mail?">

      <select data-conv-question="Please Conform">
        <option value="Yes">Confirm</option>
      </select>

  	</form>
	</div>
</div>
<!-- ChatBot end -->
		<br>
		<?php include("header.php"); ?>

		<!--cover area-->
		<div style="width: 800px;margin:auto;min-height: 400px;">
		 
			<!--below cover area-->
			<div style="display: flex;">	

				<!--posts area-->
 				<div style="min-height: 400px;flex:2.5;padding: 20px;padding-right: 0px;">
 					
 					<div style="border:solid thin #aaa; padding: 10px;background-color: white;">

  						<form method="post" enctype="multipart/form-data">
 							
  								<?php

 									if($ERROR != ""){

								 		echo $ERROR;
								 	}else{

								 		if(isset($URL[1]) && $URL[1] == "read"){

 								 			echo "Chatting with:<br><br>";
	  										if(isset($URL[2]) && is_numeric($URL[2])){
								 			
 								 				$data = $msg_class->read($URL[2]);
	  											
	  											$user = new User();
		 										$FRIEND_ROW = $user->get_user($URL[2]);

		 										include "user.php";

		 										echo "<a href='".ROOT."messages'>";
		 										echo '<input id="post_button" type="button" style="width:auto;cursor:pointer;margin:4px;" value="All Messages">';
		 										echo "</a>";

		 										if(is_array($data)){
			 										echo "<a href='".ROOT."delete/thread/". $data[0]['msgid'] ."'>";
			 										echo '<input id="post_button" type="button" style="width:auto;cursor:pointer;background-color:#b76d40;margin:4px;" value="Delete Thread">';
			 										echo "</a>";
			 									}


		 										echo '
 		 										<div>';
 		 											$user = new User();

 		 											if(is_array($data)){
	 		 											foreach ($data as $MESSAGE) {
	 		 												# code...
	  		 												//show($MESSAGE);
			 												$ROW_USER = $user->get_user($MESSAGE['sender']);

			 												if(i_own_content($MESSAGE)){
	 		 													include "message_right.php";
	 		 												}else{

	  		 													include "message_left.php";
			 												}
	 		 											}
 		 											}

		 										echo '
		 										</div>';

		 										echo '
		 										<div style="border:solid thin #aaa; padding: 10px;background-color: white;">

 								 						<textarea name="message" placeholder="Write your message here"></textarea>
								 						<input type="file" name="file" >
								 						<input id="post_button" type="submit" value="Send">
								 						<br>
 							 						
							 					</div>

							 					';

	  										}else{

	  											echo "That user could not be found<br><br>";
	  										}

								 		}else
								 		if(isset($URL[1]) && $URL[1] == "new"){

	  										echo "Start New Message with:<br><br>";
	  										if(isset($URL[2]) && is_numeric($URL[2])){
	  											
	  											$user = new User();
		 										$FRIEND_ROW = $user->get_user($URL[2]);

		 										include "user.php";

		 										echo '
		 										<div style="border:solid thin #aaa; padding: 10px;background-color: white;">

 								 						<textarea name="message" placeholder="Write your message here"></textarea>
								 						<input type="file" name="file" >
 								 						<input id="post_button" type="submit" value="Send">
								 						<br>
 							 						
							 					</div>

							 					';

	  										}else{

	  											echo "That user could not be found<br><br>";
	  										}
	  										

								 		}else{

	  										echo "Messages<br><br>";
		  									$data = $msg_class->read_threads();
		  									$user = new User();
		  									$me = esc($_SESSION['mybook_userid']);

		  									if(is_array($data)){
			  									foreach ($data as $MESSAGE) {
			  										# code...
			  										$myid = ($MESSAGE['sender'] == $me) ? $MESSAGE['receiver'] : $MESSAGE['sender'];

			 										$ROW_USER = $user->get_user($myid);

			  										include("thread.php");
			  									}
		  									}else{
		  										echo "You have no messages!";
		  									}

		  									echo "<br style='clear:both;'>";
								 		}

										
 									}
 								?>
  							
	 						
	 						<br>
 						</form>
 					</div>
  

 				</div>
			</div>

		</div>

	</body>
</html>