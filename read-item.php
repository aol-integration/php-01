<?php
    include "conf.php";

    $accessToken = $_GET["access_token"];
    $session = $_GET["session"];
    $host = $_GET["host"];

    // Header
    $header = array(
        "Authorization: Bearer $accessToken",
        "X-SESSION-ID: $session"
    );

    // Content
    $content = array(
        "fields" => "id,no,name"
    );

    // URL
    $url = $host . "/accurate/api/item/list.do?" . http_build_query($content);

    // Connect API
    $opts = array("http" =>
        array(
            "method" => "GET",
            "header" => $header,
            "ignore_errors" => true,
        )
    );
    $context  = stream_context_create($opts);
    $result = file_get_contents($url, false, $context);

    echo $result;
?>