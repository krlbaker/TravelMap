<?php

$ip_address = $_SERVER['REMOTE_ADDR'];
$hash = md5($ip_address);

?>

<img src="identicon.php?size=48&hash=<?php echo $hash;?>" />