<?php

namespace lib\db;

use PDO;

$host = "localhost:3306";

$db = new PDO(
    "mysql:host=$host;dbname=LPFS;charset=utf8",
    "root",
    "Sio2021",
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
);

function get_db(): PDO
{
    global $db;
    return $db;
}
