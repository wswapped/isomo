<!DOCTYPE html>
<html>
<head>	
	<?php
		include "functions.php";
		include_once 'class.paper.php';
		include_once 'class.user.php';

		$current_user = $User->checkLogin();

		$Paper = new paper();

		$str = trim(str_ireplace("/papers/", '', $_SERVER['REQUEST_URI']), '/');
		$parts = explode("/", trim($str));

		$level = page_level();

		//Iddentify route as empty
		if(count($parts) == 1 && $parts[0] == "")
			$parts = array();

		//Identifying routes
		if($level == 1){
			header("location:../");
		}else if($level == 2){
			//pagename maybe
			$spage = $parts[0];
			$paper_path = $parts[1];
			$paper_link = get_file("papers/get/$paper_path");
			$paper_name = URLtotext($paper_path);


			//Checking the paper and answer
			$sql = "SELECT P.*, A.id as answerid, A.file as answer FROM papers AS P JOIN answers AS A ON P.id = A.paperId WHERE P.name = \"$paper_name\" LIMIT 1 ";

			$query = $db->query($sql) or trigger_error("Can't see level $db->error");
			if($query->num_rows){
				//Display the papers for this level
				$paperData = $level = $query->fetch_assoc();
				// $printname = $level['printname'];
				// $levelname = $level['name'];
				// $paper_intro = $level['short_intro'];
				$title = "$paper_name";
			}else{
				//maybe something else we're trying to access
			}
		}
		include "modules/head.php";
	?>

</head>
<body>
	<?php
		include "modules/menu.php";

		if($level == 1){
			include "paper_home.php";
		}else{
			//Checking the answer
			$answer_paper = $paperData['answer'];
			$answer_paper_id = $paperData['answerid'];
			?>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">

									<h1 class="page-title"><?php echo $paper_name ?></h1>
									<?php
										if($answer_paper){
											//Check if the user bought the paper already
											$buy_status = $Paper->bought($current_user, $answer_paper_id);
											if(!$buy_status || $buy_status == 'failed'){
											?>
												<p>200 FRW</p>
												<?php
													//check if the user is loggged in
													if($current_user){
														$userData = $User->get($current_user);
														$phone = $userData['phone'];
														?>
															<form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">

																<?php

																	$preventRentry = false;

																	//checking if this form is submitted
																	if($_SERVER['REQUEST_METHOD'] == 'POST'){
																		$phone = $_POST['phone']??"";

																		//device user agent
																		$device = $_SERVER['HTTP_USER_AGENT'];

																		if($phone){
																			//here we have to send the phone
																			$query = $db->query("INSERT INTO buy_requests(user, phone, answer, price, device, status) VALUES(\"$current_user\", \"$phone\", \"$answer_paper_id\", 200, \"$device\", 'pending')") or trigger_error($db->error);

																			//checking the phone
																			if(strlen($phone)){
																				$query = $db->query("SELECT * FROM papers") or trigger_error($db->error);
																				if($query){
																					echo "<p class='alert alert-success'>You'll receive the payment request on your phone, once you pay you will access your answers</p><a href='$paper_link'>Check the paper</a>";
																					$preventRentry = true;
																				}
																			}else{
																				echo "<p class='alert alert-danger'>Please enter correct phone number</a>";
																			}

																			
																		}
																	}
																	if(!$preventRentry){
																?>

																
															  	<div class="form-group">
															  		<label for="phone_input">Phone number</label>
																    <div class="input-group mb-3">
																		<div class="input-group-prepend">
																	    	<span class="input-group-text" id="basic-addon1">+25</span>
																	  	</div>
																	  	<input type="number" name="phone" class="form-control" placeholder="Enter phone number to charge" id="phone_input" value="<?php echo $phone;  ?>" aria-label="Username" aria-describedby="basic-addon1">
																	  	
																	</div>
																	<div class="alert alert-danger" id="phone_error" style="display: none;"></div>
															  	</div>
															  	<button type="submit" class="btn btn-primary">BUY</button>
																<?php } ?>
															</form>
														<?php
													}else{
														//set the session to rember this
														$_SESSION['enterlink'] = $_SERVER['REQUEST_URI'];
														$_SESSION['loginmessage'] = "Login to buy $paper_name";
														$_SESSION['signupmessage'] = "Signup to buy <i>$paper_name</i>";
														?>
															<p>Login or register in order to buy the paper</p>
															<div class="mt-4">
																	<button class="btn btn-primary"><a href="<?php echo get_file('login'); ?>" style="color: inherit;">Login</a></button>&nbsp;
																	<button class="btn btn-success"><a href="<?php echo get_file('signup'); ?>" style="color: inherit;">Register</a></button>
															</div>
														<?php
													}
												?>
											<?php
											}else if($buy_status == 'done'){
												echo '<div class="alert alert-success" role="alert">You have already bought answers, you can view them here</div>';
											}else if($buy_status == 'pending'){
												echo '<div class="alert alert-success" role="alert">You ordered the paper already, please pay to access the answer</div>';
											}
										}else{
											echo "<p>We don't have the answers for this paper</p>";
										}
									?>
								</div>
							</div>
							
							
						</div>
						</div>
						<div class="col-md-3">
						</div>
					</div>
					<div class="mt-4"></div>
					<div class="row">
						<div class="col-md-12">
							<ul class="list-group">
							<?php
								//Getting papers in level
								$papers = level_papers($spage);
								for($n=0; $n<count($papers); $n++){
									$paper = $papers[$n];
									$pname = $paper['name'];
									?>
										<li class="list-group-item"><a href="<?php echo get_file("papers/get/".str_ireplace(" ", "_", strtolower($pname))); ?>"><?php echo $pname ?></a></li>
									<?php
								}
							?>
							</ul>
						</div>
					</div>
				</div>
			<?php

		}
		include "modules/footer.php";
	?>
	<script type="text/javascript">
		var phone_error = $('#phone_error');

		//validating the phone
		$("#phone_input").on('keypress', function(ev){	
			ckey = ev.key
			contents = $(this).val() //The whole phone numer so far
			// console.log(ev)
			console.log(contents)

			phonelength = parseInt(contents.length)+1;

			if(phonelength>10)
				return false;

			if(phonelength == 1){
				if(ckey != 0){
					phone_error.html('<p class="1d_error">Make sure format is correct</p>');
					$(phone_error).trigger('changed');					
				}else{
					//remove error
					$(phone_error).find(" .1d_error").remove();
					$(phone_error).trigger('changed');
				}				
			}else if(phonelength == 2){
				if(ckey != 7){
					phone_error.html('<p class="1d_error">Make sure format is correct</p>');
					$(phone_error).trigger('changed');					
				}else{
					//remove error
					$(phone_error).find(" .1d_error").remove();
					$(phone_error).trigger('changed');
				}				
			}else if(phonelength == 3){
				if(ckey != 8){
					phone_error.html('<p class="1d_error">Use MTN number in correct format</p>');
					$(phone_error).trigger('changed');					
				}else{
					//remove error
					$(phone_error).find(" .1d_error").remove();
					$(phone_error).trigger('changed');
				}				
			}

		})
		$(phone_error).on('changed', function(e){

			//check if it's empty
			if(phone_error.html().length<10){
				phone_error.hide();
			}else{
				phone_error.show();
			}
		})
	</script>
</body>
</html>