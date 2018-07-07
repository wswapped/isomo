<div class="container-fluid ft-container">
	<footer>
		<div class="row">
			<div class="col-md-4">
				<a href="/about" class="block" style="color: inherit;">About Us</a>
				<p>
					Introduction to isomo tech text which is just cool
				</p>
			</div>
			<div class="col-md-4">
				<h1>Contact Us</h1>
				<ul>
					<li>Phone: +250 788 761 869 /Whatsapp </li>
					<li>Email: info@isomo.info </li>
					<li class="mt-2">Social media:<span><a style="text-decoration: none;" href="https://www.facebook.com/isomo.info"><i class="fa fa-2x fa-facebook"></i></a></span><span><a style="text-decoration: none;" href="https://twitter.com/Isomo_info"><i class="fa fa-2x fa-twitter"></i></a></span>
				</ul> </li>
				</ul>
			</div>
			<div class="col-md-4">
				<h1 class="mb-3">Subscribe to newsletter</h1>
				<form method="POST">
					<?php
						if($_SERVER['REQUEST_METHOD'] == 'POST'){
							$formType = $_POST['type']??"";
							if($formType == 'subscribe'){
								$email = $_POST['email']??"";

								if($email){

									//check if the guy werent there already
									$c = $db->query("SELECT * FROM subscribers WHERE email = \"$email\" AND (stopDate IS NULL OR stopDate = '') ");
									if(!$c->num_rows){
										//here we can put in subscribers
										$query = $db->query("INSERT INTO subscribers(email) VALUES(\"$email\")") or trigger_error($db->error);
										if($query){
											echo "<p>Successfully subscribed</p>";
										}
									}

										
								}
							}
						}
					?>
					<div class="input-group">
					  	<input type="email" class="form-control" name='email' required="required">
					  	<input type="hidden" name='type' value="subscribe">
					  	<div class="input-group-append">
					    	<button class="btn btn-primary" type="button">Subscribe</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 text-center">&copy;ISOMO TECHNOLOGY LTD. <?php echo date('Y'); ?></div>
		</div>			
	</footer>
</div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->

<script type="text/javascript" src="<?php echo get_file('js/jquery-3.3.1.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo get_file('js/tether.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo get_file('js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo get_file('js/js.js'); ?>"></script>