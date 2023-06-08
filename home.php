<?php 

	include("classes/autoload.php");
 

	$login = new Login();
	$user_data = $login->check_login($_SESSION['mybook_userid']);
 
 	$USER = $user_data;
 	
 	if(isset($_GET['id']) && is_numeric($_GET['id'])){

	 	$profile = new Profile();
	 	$profile_data = $profile->get_profile($_GET['id']);

	 	if(is_array($profile_data)){
	 		$user_data = $profile_data[0];
	 	}

 	}

  
	//posting starts here
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{

		$post = new Post();
		$id = $_SESSION['mybook_userid'];
		$result = $post->create_post($id, $_POST,$_FILES);
		
		if($result == "")
		{
			header("Location:" . ROOT . "home");
			die;
		}else
		{

			echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
			echo "<br>The following errors occured:<br><br>";
			echo $result;
			echo "</div>";
		}
	}

?>

<!DOCTYPE html>
	<html>
	<head>
		<!-- ChatBot -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="css/chat.css">

		<link rel="stylesheet" type="text/css" href="css/jquery.convform.css">
		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.convform.js"></script>
		<script type="text/javascript" src="js/custom.js"></script>
		<title>Timeline | FarmingCom</title>
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
			background-color: #156815;
			border:none;
			color: white;
			padding: 4px;
			font-size: 14px;
			border-radius: 2px;
			width: 50px;
			cursor: pointer;
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

				<!--friends area-->			
				<div style="min-height: 400px;flex:1;">
					
					<div id="friends_bar">
						
						 <?php 

							$image = "images/user_male.jpg";
							if($user_data['gender'] == "Female")
							{
								$image = "images/user_female.jpg";
							}
							if(file_exists($user_data['profile_image']))
							{
								$image = $image_class->get_thumb_profile($user_data['profile_image']);
							}
						?>

					<img id="profile_pic" src="<?php echo ROOT . $image ?>"><br/>

						<a href="<?=ROOT?>profile" style="text-decoration: none;"> 
						 <?php echo $user_data['first_name'] . "<br> " . $user_data['last_name'] ?>
						</a>

					</div>

				</div>

				<!--posts area-->
 				<div style="min-height: 400px;flex:2.5;padding: 20px;padding-right: 0px;">
 					
 					<div style="border:solid thin #aaa; padding: 10px;background-color: white;">

 						<form method="post" enctype="multipart/form-data">

	 						<textarea name="post" placeholder="Whats on your mind?"></textarea>
	 						<input type="file" name="file">
	 						<input id="post_button" type="submit" value="Post">
	 						<br>
 						</form>
 					</div>
 
	 				<!--posts-->
	 				<div id="post_bar">
 					
 						<?php 

 							$page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
  							$page_number = ($page_number < 1) ? 1 : $page_number;

 							
 							$limit = 10;
 							$offset = ($page_number - 1) * $limit;

  							$DB = new Database();
 							$user_class = new User();
 							$image_class = new Image();

 							$followers = $user_class->get_following($_SESSION['mybook_userid'],"user");

 							$follower_ids = false;
 							if(is_array($followers)){

 								$follower_ids = array_column($followers, "userid");
 								$follower_ids = implode("','", $follower_ids);

 							}

 							if($follower_ids){
 								$myuserid = $_SESSION['mybook_userid'];
 								$sql = "select * from posts where parent = 0 and owner = 0 and (userid = '$myuserid' || userid in('" .$follower_ids. "')) order by id desc limit $limit offset $offset";
 								$posts = $DB->read($sql);
 							}

 	 					 	if(isset($posts) && $posts)
 	 					 	{

 	 					 		foreach ($posts as $ROW) {
 	 					 			# code...

 	 					 			$user = new User();
 	 					 			$ROW_USER = $user->get_user($ROW['userid']);

 	 					 			include("post.php");
 	 					 		}
 	 					 	}
 	 			 
 	 					 	//get current url
 							$pg = pagination_link();
 
	 					 ?>
	 					 <a href="<?= $pg['next_page'] ?>">
	 					 <input id="post_button" type="button" value="Next Page" style="float: right;width:150px;">
	 					 </a>
	 					 <a href="<?= $pg['prev_page'] ?>">
	 					 <input id="post_button" type="button" value="Prev Page" style="float: left;width:150px;">
	 					 </a>
	 				</div>

 				</div>
			</div>

		</div>

	</body>
</html>