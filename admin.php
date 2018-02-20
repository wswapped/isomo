<!DOCTYPE html>
<html>
<head>
	<title>Administrator</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="shortcut icon" href="isomo.jpg">
	<!--Google -Fonts-->
	<link href='https://fonts.googleapis.com/css?family=Sintony:400,700&subset=latin-ext' rel='stylesheet' type='text/css'>
	<!--Font-awsome-->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

	<!-- Custom style -->
	<link rel="stylesheet" href="css/style.css">
	<?php
		include "functions.php";
	?>

</head>
<body>
	<?php include "modules/menu.php"; ?>
	<div class="container">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-block">
					<h1 class="card-title">Upload paper</h1>
					<div class="row">
						<form action="admin.php" method="POST" enctype="multipart/form-data">
							<?php
								if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['subt']) ){
									//Getting values
									$level = $_POST['level'];
									$subject = $_POST['subject'];
									$file = $_FILES['file'];
									$year = $_POST['year'];
									if(!empty($level) && !empty($subject) && !empty($year) && !empty($file['size']) ){
										//Inserting
										//Checking if document is PDF
										$ext = pathinfo($file['name'])['extension'];
										if(strtolower($ext) == "pdf"){
											$filename = time()."$subject.$ext";
											if(move_uploaded_file($file['tmp_name'], "papers/$filename")){
												//Recording paper in database
												$db->query("INSERT INTO papers(subject, file, year) VALUES (\"$subject\", \"$filename\", \"$year\")");
												die("<p class='text-success'>Paper uploaded successfully</p>");
											}else{
												echo "<p class='text-danger'>Error uploading the document to server, please try again</p>";
											};
										}else{
											echo "<p class='text-danger'>Upload PDF only</p>";
										}
										


										// $db->query("INSERT INTO papers()")
									}else{
											echo "<p class='text-danger'>Please fill in all the fields</p>";
									}
								}
							?>
							<div class="form-group">
							    <label for="levelsel">Select the level</label>
							    <select name="level" class="form-control" id="levelsel">
							    	<?php
							    		$levels = get_levels();
							    		var_dump($levels);
							    		for($n=0; $n<count($levels); $n++){
							    			?>
							    				<option value="<?php echo $levels[$n]['name']; ?>"><?php echo $levels[$n]['name']; ?></option>
							    			<?php
							    		}
							    	?>
							    </select>
							</div>
							<div class="form-group">
							    <label for="subsel">Select the subject</label>
							    <?php
							    	$subjects = get_subjects();
							    ?>
							    <select name = 'subject' class="form-control" id="subsel">
							    	<?php
							    		
							    		for($n=0; $n<count($subjects); $n++){
							    			?>
							    				<option value="<?php echo $subjects[$n]['id']; ?>"><?php echo $subjects[$n]['name']; ?></option>
							    			<?php
							    		}
							    	?>
							    </select>
							</div>
							<div class="form-group">
							    <label for="fileup">FIle</label>
							    <input type="file" name="file" class="form-control" id="fileup" placeholder="placeholder">
							</div>
							<div class="form-group">
							    <label for="fileup">Paper year</label>
							    <input type="number" min="1900" max="<?php echo date('Y'); ?>" name="year" class="form-control" id="fileup" placeholder="year">
							</div>
							<input type="hidden" name="subt" value="jjsjsnjsdnjsndjsndsjdnsjdnsjdnsj">
							<button type="submit" class="btn btn-primary">Upload</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script type="text/javascript" src="js/jquery.slim.min.js"></script>
<script type="text/javascript" src="js/tether.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/js.js"></script>
</body>
</html>