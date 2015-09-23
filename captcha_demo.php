<?php
session_start ();
if (!empty( $_POST )) {
	$c_x = $_POST ['captcha_x'];
	$c_y = $_POST ['captcha_y'];
	
	$r_x = $_SESSION ['x'];
	$r_y = $_SESSION ['y'];
	
	$l_x = $c_x - $r_x;
	$l_y = $c_y - $r_y;
	
	$l_x2 = pow($l_x,2);
	$l_y2 = pow($l_y,2);

	$l2 = $l_x2 + $l_y2;

	if ($l2 < pow($_SESSION ['r']/2,2)) {
		echo 'OKAY';
	} else {
		echo 'NOT OKAY';
	}
}

?>
<p>Please click the biggest circle</p>
<form method="post" action="">
<input type="image" src="captcha.php" name="captcha" />
</form>
