<!DOCTYPE html>
<html>
<head>
	<?php
		$title = "Login";
		include 'functions.php';
		include_once 'class.paper.php';
		$Paper = new paper();	
		$cpage = trim($_SERVER['REQUEST_URI'], "/");

		$page_parts = explode("/", str_ireplace("driving_theory_exams", "", $cpage));

		//removing empty routes
		$page_parts = array_values(array_filter($page_parts));

		include 'modules/head.php';
		include_once 'class.user.php';

		if($User->checkLogin()){
			//user already logged in
			header('location:index');
		}
	?>

</head>
<body>
	<?php include "modules/menu.php"; ?>
	<div class="container">
		<div class="col-sm-12">
			<div class="card" style="max-width: 650px; margin: 0 auto">
				<div class="card-block">
					<h1 class="card-title page-title">Log in</h1>
					<div class="row">
							<div class="col-md-12">
								<form method="POST" action="login">
									<?php
										if($_SERVER['REQUEST_METHOD'] == 'POST'){
											$username = $_POST['username']??"";
											$password = $_POST['password']??"";


											if($username && $password){
												//check the login
												$userId = $User->login($username, $password);
												if($userId){
													header("location:index");
												}else{
													echo '<p class="text-warning">Invalid username or password</p>';
												}
											}else{
												echo '<p class="text-warning">Enter all the required inputs</p>';
											}
										} 
										

									?>
								  <div class="form-group">
									<label for="usernameInput">Username</label>
									<input type="text" class="form-control text-in" id="usernameInput" name="username" aria-describedby="emailHelp" placeholder="Enter your username" <?php $input = retain_input('post', 'username'); echo $input!=false?'value="'.$input.'"':''; ?> required>
								  </div>
								  
								  <div class="form-group">
									<label for="inputPassword1">Password</label>
									<input type="password" class="form-control text-in" id="inputPassword1" name="password" placeholder="Password" required>
								  </div>
								  <button type="submit" class="btn btn-primary">Login</button>
								 	
								</form>
								<div class="mt-5">
							 		<p class="text-muted">New to Isomo?</p>
							  		<a href="signup">Sign up</a>
							 	</div>
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