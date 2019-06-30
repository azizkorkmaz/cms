<?php
//path al
define("PATH",realpath("."));
define("SUBFOLDER", true);
define("URL", "http://localhost:81/cms");

//db bağlantısı
return [
    "db" => [
        "name" => "cms",
        "host" => "localhost",
        "user" => "root",
        "pass" => "root"
    ]
];

