<?php 
    $myfile = fopen("webdictionary.txt", "r") or die ("Unable to open file");
    echo fread($myfile, filesize("webdictionary.txt"));
    while(!feof($myfile)) {
        echo fgets($myfile) . "<br>";
    }
    fclose($myfile);
?>