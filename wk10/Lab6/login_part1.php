<h1>Weak Password</h1>
<?php
	if(!isset($_POST['password'])) {
		
		print "	
		<form method='post'>
			<label>Password</label>
			<input type='password' name='password'>
			<br />
			<input type='submit'>
			</form>";
		 
	} else {
		print "<h1>Successfully authenticated</h1>";
	};

?>

