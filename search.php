<?php
	ob_start();
?>
<!DOCTYPE html>
<html>
<head>	
	<?php
		include "functions.php";
		include_once 'class.paper.php';
		include_once 'class.user.php';

		$Paper = new paper();

		$str = trim(str_ireplace("/papers/", '', $_SERVER['REQUEST_URI']), '/');
		$parts = explode("/", trim($str));

		$level = page_level();

		//Iddentify route as empty
		if(count($parts) == 1 && $parts[0] == "")
			$parts = array();

		$title = "Search";		
		
		include "modules/head.php";
	?>

</head>
<body>
	<?php
		$skipSearchModule = True;
		include "modules/menu.php";
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-4" style="margin: 0 auto">
				<form method="GET" action="/search">
					<div class="input-group">
					  	<input type="text" max="30" min="1" class="form-control" name='q' value="<?php echo retain_input('GET', 'q'); ?>" required="required">
					  	<!-- <input type="hidden" name='type' value="search"> -->
					  	<div class="input-group mt-4">
					    	<button class="btn btn-primary" type="submit">Search</button>
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-12 mt-4">
				<ul class="list-group">
					<?php
						$q = $_GET['q']??"";

						//retrieve queries
						if($q){
							$sql = "SELECT id FROM papers WHERE name LIKE \"%$q%\" OR level LIKE \"%$q%\" ";
							$papersQ = $db->query($sql) or trigger_error($db->error);
							while ($paperId = $papersQ->fetch_assoc()) {
								$paperId = $paperId['id'];
								$paperData = $Paper->get($paperId);
								// var_dump($paperId, $paperData);
								$pName = $paperData['name'];
								$pLink = $paperData['link'];
								?>
									<li class="list-group-item"><a href="/<?php echo $pLink; ?>"><?php echo $pName; ?></a></li>
								<?php
							}	
						}
					?>
				</ul>
			</div>
		</div>
	</div>
	<?php
		include "modules/footer.php";
	?>
</body>
</html>