
<?php
	ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<?php
		$title = "Sign Up";
		include 'functions.php';
		include_once 'class.paper.php';
		$Paper = new paper();	
		$cpage = trim($_SERVER['REQUEST_URI'], "/");

		$page_parts = explode("/", str_ireplace("driving_theory_exams", "", $cpage));

		//removing empty routes
		$page_parts = array_values(array_filter($page_parts));

		include_once 'class.user.php';

		if($User->checkLogin()){
			//user already logged in
			header('location:index');
		}

		include 'modules/head.php';
	?>

</head>
<body>
	<?php include "modules/menu.php"; ?>
	<div class="container">
		<div class="col-sm-12">
			<div class="card" style="max-width: 650px; margin: 0 auto">
				<div class="card-block">
					<h1 class="card-title page-title">Sign up to Isomo</h1>
					<div class="row">
							<div class="col-md-12">
								<form method="POST" action="signup">
									<?php
										if($_SERVER['REQUEST_METHOD'] == 'POST'){
											$name = $_POST['name']??"";
											$username = $_POST['username']??"";
											$phone = $_POST['phone']??"";
											$email = $_POST['email']??"";
											$gender = $_POST['gender']??"";
											$dob = $_POST['dob']??"";
											$password = $_POST['password']??"";
											$password = $_POST['password']??"";
											$rpassword = $_POST['rpassword']??"";

											var_dump($_POST);
											var_dump(retain_input('post', 'name'));



											if($name && $username && ($phone || $email) && $gender && $password && $rpassword){
												if($password == $rpassword){
													//check if the username is not yet used
													$query = $db->query("SELECT * FROM users WHERE username = \"$username\" ") or trigger_error($db->error);
													if($query->num_rows<1){
														//here we can insert in database

														//hash password
														$password = password_hash($password, PASSWORD_BCRYPT);

														$query = $db->query("INSERT INTO users(name, username, phone, email, gender, dob, password) VALUES (\"$name\", \"$username\", \"$phone\", \"$email\", \"$gender\", \"$dob\", \"$password\") ") or trigger_error("$db->error");
														if($query){
															header("location:login");
														}
													}else{
														echo '<p class="text-warning">Username not available</p>';
													}
														
												}else{
													echo '<p class="text-warning">Please make the passwords identical</p>';
												}
											}else{
												echo '<p class="text-warning">Enter all the required inputs</p>';
											}
										}

										//checking if there is a message set for signup information
										if($signup_message = $_SESSION['signupmessage']){
											echo '<div class="alert alert-success" role="alert">'.$signup_message.'
													</div>';	
										}
										

									?>
								  <div class="form-group">
									<label for="nameInput">Names</label>
									<input type="text" class="form-control text-in" id="nameInput" aria-describedby="emailHelp" <?php $input = retain_input('post', 'name'); echo $input!=false?'value="'.$input.'"':''; ?> name="name" placeholder="Enter your names" required>
								  </div>
								  <div class="form-group">
									<label for="usernameInput">Username</label>
									<input type="text" class="form-control text-in" id="usernameInput" name="username" aria-describedby="emailHelp" placeholder="Enter your username" <?php $input = retain_input('post', 'username'); echo $input!=false?'value="'.$input.'"':''; ?> required>
									<!-- <small id="emailHelp" class="form-text text-muted">Name you'll use for logging in</small> -->
								  </div>
								  <div class="form-group">
									<label for="emailInput">Email address</label>
									<input type="email" class="form-control text-in" name="email" id="emailInput" aria-describedby="emailHelp" placeholder="Enter email" <?php $input = retain_input('post', 'email'); echo $input!=false?'value="'.$input.'"':''; ?>>
									<!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
								  </div>
								  <div class="form-group">
									<label for="phoneInput">Phone</label>
									<input type="number" class="form-control text-in" name="phone" id="phoneInput" aria-describedby="emailHelp" placeholder="Enter phone" <?php $input = retain_input('post', 'phone'); echo $input!=false?'value="'.$input.'"':''; ?>>
								  </div>
								  <div class="form-group">
									<label>Gender</label><br />
									<input type="radio" name="gender" value="male" <?php $input = retain_input('post', 'gender'); echo $input=='male'?'checked':''; ?>> Male<br>
  									<input type="radio" name="gender" value="female" <?php $input = retain_input('post', 'gender'); echo $input=='female'?'checked':''; ?>> Female<br>
									<!-- <input type="radio" name="check" name="gender" value="male" selected>Male -->
									<!-- <input type="radio" name="check" name="gender" value="female">Female -->
									<!-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"> -->
									<!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
								  </div>
								  <!-- <div class="form-group">
									<label for="bt">Birth Year</label>
									<input type="number" class="form-control" id="bt" name="dob" placeholder="Birth year" <?php $input = retain_input('post', 'dob'); echo $input!=false?'value="'.$input.'"':''; ?> required>
								  </div> -->
								  <div class="form-group">
									<label for="inputPassword1">Password</label>
									<input type="password" class="form-control text-in" id="inputPassword1" name="password" placeholder="Password" required>
								  </div>
								  <div class="form-group">
									<label for="repeatPassword">Repeat Password</label>
									<input type="password" class="form-control text-in" id="repeatPassword" name="rpassword" placeholder="Repeat your password" required>
								  </div>
								  <div class="form-group">
								  	<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<label class="form-check-label" for="exampleCheck1">Agree terms and conditions</label>
								  </div>
								  <!-- <div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<label class="form-check-label" for="exampleCheck1">Check me out</label>
								  </div> -->
								  <button type="submit" class="btn btn-primary">Submit</button>
								</form>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script type="text/javascript" src="<?php echo get_file('js/jquery.slim.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo get_file('js/tether.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo get_file('js/bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="js/js.js"></script>
</body>
</html>