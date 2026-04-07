<?php

    $files = glob("../resources/views/emails/*.html");

    echo ("<pre>");
    foreach ($files as $file){
        if (strpos($file, '-backend') !== false) {
            echo ("<br />");
        }
        echo ($file);
        echo ("<br />");
    }
    echo ("</pre>");

?>