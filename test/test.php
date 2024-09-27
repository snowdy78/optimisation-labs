<?php
    $directory = $_SERVER['DOCUMENT_ROOT']."/optimisation-labs/";
    $f = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($directory)
    );
    $files_php = [];
    foreach ($f as $files)
    {
        if (strpos($f->getSubPathName(), '.php'))
        {
            array_push($files_php, $f->getSubPathName());
        }
    }
    $filter = ["map.php", "model.php", "index.php"];
    $files = array_values(array_diff($files_php, $filter));
    // foreach ($files as $keys => values)
    // {
    //    echo $keys.$values."<br>";
    // }
?>
