<?php
	$gender = $_POST['gender']??"";
	var_dump($gender);
?>
<form action="test" method="POST">
	<input type="radio" name="gender" value="male"> Male<br>
	<input type="radio" name="gender" value="female"> Female<br>
	<button>submit</button>
</form>