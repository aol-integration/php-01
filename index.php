<?php
	include "conf.php";

	$oauthUrl = "https://account.accurate.id/oauth/authorize?client_id=$clientId&response_type=code&redirect_uri=$oauthCallback&scope=$scope";

	echo "<div>Click the link below to start</div>";
	echo "<a href=\"$oauthUrl\">$oauthUrl</a>";
?>