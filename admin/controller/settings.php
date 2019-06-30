<?php

//tema değişikliğini dinamik hale getir
$themes =[];
foreach (glob(PATH ."/app/view/*/")as $folder)
{
    $folder = explode("/", rtrim("$folder","/"));
    $themes[] = end($folder);
}

if (isset($_POST["submit"]))
{
    /**echo "<pre>";
    print_r(post("settings"));
    exit();*/

    $html = "<?php" .PHP_EOL.PHP_EOL;
    foreach (post("settings") as $key => $val)
    {
        $html .= '$settings["'.$key.'"] = "'. $val .'"; ' .PHP_EOL;
    }

    file_put_contents( PATH. "/app/settings.php", $html);
    header("Location:" .admin_url("settings"));
}

require admin_view("settings");