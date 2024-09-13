<?php
    $directory = $_SERVER['DOCUMENT_ROOT']."/www/hehe-site";
    $f = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator()
    );
    $files_php = [];
    foreach ($f as $files)
    {
        if (strpos($f->getSubPathName), '.php')
        {
            array_push($files_php, $f->getSubPathName());
        }
    }
    $filter = array("map.php", "model.php", "index.php");
    $files = array_values(array_diff($files_php, $filter));
    // foreach ($files as $keys => values)
    // {
        echo $keys.$values."<br>";
    // }
?>
