<!DOCTYPE html>
<html>
<head>
	<?php
		$title = "Contact us";
		include 'functions.php';
		include 'modules/head.php';
	?>

</head>
<body>
	<?php include "modules/menu.php"; ?>
	<div class="container">
		
		<div class="col-sm-12">
			<div class="card" style="max-width: 650px; margin: 0 auto">
				<div class="card-body">
					<h1 class="card-title"><em>Contact Isomo Technology</em></h1>					
					<div class="card-body">
					    <form method="POST" action="contact">
					    	<?php
					    		if($_SERVER['REQUEST_METHOD'] == 'POST'){
					    			//get the message contents
					    			$name = $db->real_escape_string($_POST['name']??"");
					    			$email = $db->real_escape_string($_POST['email']??"");
					    			$message = $db->real_escape_string($_POST['message']??"");

					    			if($message && $email){
					    				$query = $db->query("INSERT INTO contacts(name, email, message) VALUES(\"$name\", \"$email\", \"$message\")") or trigger_error("Can't save $db->error");

					    				if($query){
					    					?>
					    						<p class="text-success">We have received your contact message, we'll reply you soon.</p>
					    					<?php
					    				}

					    			}
					    		}
					    	?>
							<div class="row">
								<div class="col col-6">
									<div class="form-group">
										<label for="namein">Name</label>
										<div class="input-group mt-3">
											<div class="input-group-prepend">
										    	<span class="input-group-text"><i class="icon-append fa fa-user"></i></span>
										  	</div>
										  	<input type="text" class="form-control" id="namein" name="name" placeholder="Name">
										  	<!-- <input type="email" class="form-control" aria-label="Enter email" name="email" placeholder="Enter email"> -->
										</div>
										
									</div>
								</div>
								<div class="col col-6 pl-4">
									
									<div class="form-group">
										<label for="exampleInputEmail1">Email address</label>
										<div class="input-group mt-3">
											<div class="input-group-prepend">
										    	<span class="input-group-text"><i class="icon-append fa fa-envelope-o"></i></span>
										  	</div>
										  	<input type="email" class="form-control" aria-label="Enter email" name="email" placeholder="Enter email">
										</div>
										
									</div>
									  <!-- <label class="input">
									
									<input type="email" required="" name="email" id="email">
									</label> -->
								</div>
								<div class="col-sm-12">
									<div class="form-group">
									    <label for="messagetextarea">Message</label>
									    <textarea class="form-control" name="message" id="messagetextarea" rows="3" required></textarea>
									  </div>
								</div>
								<div class="col-sm-12">
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</div>
						</form>
					</div>

					<div class="mt-5"> </div>
					<div class="card-body">
						<p>You can contact us with address</p>
						<ul class="list-group-flush">
							<li class="list-group-item">
								Phone: <span>+250 788 761 869</span>
							</li>
							<li class="list-group-item">
								email: <span>info@isomo.info</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script type="text/javascript" src="<?php echo get_file('js/jquery.slim.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo get_file('js/tether.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo get_file('js/bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="js/js.js"></script>
</body>
</html>