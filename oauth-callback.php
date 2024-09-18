<?php
    include "conf.php";

    $code = $_GET["code"];
    $basicAuth = base64_encode("$clientId:$clientSecret");

    // Header
    $header = array(
        "Authorization: Basic $basicAuth"
    );

    // Content
    $content = array(
        "code" => $code,
        "grant_type" => "authorization_code",
        "redirect_uri" => $oauthCallback
    );

    // URL
    $url = "https://account.accurate.id/oauth/token";

    // Connect API
    $opts = array("http" =>
        array(
            "method" => "POST",
            "header" => $header,
            "content" => http_build_query($content),
            "ignore_errors" => true,
        )
    );
    $context  = stream_context_create($opts);
    $response = file_get_contents($url, false, $context);

    echo "<p>$response</p>";
    // Output
    $json = json_decode($response);
    $accessToken = $json->{"access_token"};
    $refreshToken = $json->{"refresh_token"};

    echo "<div>OAuth Callback</div>";
    echo "<ul>";
    echo "<li>access_token = $accessToken</li>";
    echo "<li>refresh_token = $refreshToken</li>";
    echo "</ul>";

    $dbListUrl = "db-list.php?access_token=$accessToken";
    echo "<a href=\"$dbListUrl\">Read Database List</a>";
?>