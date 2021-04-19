<h1>Weak Password</h1>
<?php
	if(!isset($_POST['password'])) {
		
		print "	
		<form method='post'>
			<label>Password</label>
			<input type='password' name='password'>
			<input type='hidden' name='username' value='johnDoe'>
			<br />
			<input type='submit'>
			</form>";
		 
	} else {
		if($_POST['password'] == "password") {
			echo "<h1>Welcome ".$_POST['username']."to Your Portal</h1>";
		} else {
			echo "<h1>Authentication fail</h1>";
		}
	};

?>

