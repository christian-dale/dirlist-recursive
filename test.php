<?php

require_once("dirlist_rec.php");

$list = dirlist_rec("../PTOffice");

foreach ($list as $item) {
    echo $item . "\n";
}
