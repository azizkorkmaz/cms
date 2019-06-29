<?php
//path al
define("PATH",realpath("."));
define("SUBFOLDER", true);
define("URL", "http://localhost/cms");

//db bağlantısı
return [
    "db" => [
        "name" => "cms",
        "host" => "localhost",
        "user" => "root",
        "pass" => "root"
    ]
];

