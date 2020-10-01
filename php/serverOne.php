<?php
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_URL, "http://127.0.0.1/serverTwo.php");
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false); 
    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,1);
    curl_setopt($ch, CURLOPT_SSLVERSION, 6);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    echo $result;
