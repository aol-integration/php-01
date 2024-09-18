<?php
    include "conf.php";

    $accessToken = $_GET["access_token"];

    // Header
    $header = array(
        "Authorization: Bearer $accessToken"
    );

    // URL
    $url = "https://account.accurate.id/api/open-db.do?id=" . $_GET["id"];

    // Connect API
    $opts = array("http" =>
        array(
            "method" => "GET",
            "header" => $header,
            "ignore_errors" => true,
        )
    );
    $context  = stream_context_create($opts);
    $response = file_get_contents($url, false, $context);

    // Output
    $session = json_decode($response)->{"session"};
    $host = json_decode($response)->{"host"};
    $menuUrl = "menu.php?access_token=$accessToken&session=$session&host=$host";

    header("Location: $menuUrl");
    exit;
?>