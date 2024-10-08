<?php
    include "conf.php";

    $accessToken = $_GET["access_token"];
    $session = $_GET["session"];
    $host = $_GET["host"];

    // Header
    $header = array(
        "Authorization: Bearer $accessToken",
        "X-SESSION-ID: $session",
        "Content-Type: application/json"
    );

    // Content
    $content = array(
        "customerNo" => "CUST-TEST",
        "transDate" => date("d/m/yy"),
        "detailItem" => array(
            array(
                "itemNo" => "ITEM-TEST",
                "quantity" => 5,
                "unitPrice" => 8000,
                "itemCashDiscount" => 1500
            ),
            array(
                "itemNo" => "ITEM-TEST",
                "quantity" => 8,
                "unitPrice" => 8500
            )
        )
    );

    // URL
    $url = $host . "/accurate/api/sales-invoice/save.do";

    // Connect API
    $opts = array("http" =>
        array(
            "method"  => "POST",
            "header"  => $header,
            "content" => json_encode($content),
            "ignore_errors" => true,
        )
    );
    $context  = stream_context_create($opts);
    $result = file_get_contents($url, false, $context);

    echo $result;
?>