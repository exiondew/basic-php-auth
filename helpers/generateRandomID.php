<?php

require_once "../config/database.php";
function generateUniqueRandomID()
{

    do {
        $randomID = (string) rand(10000000000, 99999999999);
    } while (query("SELECT * FROM users HWERE id = ?", [$randomID]));

    return $randomID;
}
