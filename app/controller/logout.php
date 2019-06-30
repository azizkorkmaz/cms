<?php

//sessinları sil
session_destroy();
header("Location:" .(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url()));
exit();