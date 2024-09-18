<?php
    include "conf.php";

    $accessToken = $_GET["access_token"];

    // Header
    $header = array(
        "Authorization: Bearer $accessToken"
    );

    // URL
    $url = "https://account.accurate.id/api/db-list.do";

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
    $databaseList = json_decode($response)->{"d"};

    if (count($databaseList) > 0) {
        echo "<div>Select database</div>";
        foreach ($databaseList as $database) {
            $id = $database->{"id"};
            $alias = $database->{"alias"};
            $openDbUrl = "open-db.php?access_token=$accessToken&id=$id";
            echo "<li><a href=\"$openDbUrl\">$alias</a></li>";
        }
    } else {
        echo "You do not have any database, please create database from https://accurate.id";
    }
?>