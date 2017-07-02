<?php

$fileContent = json_decode(file_get_contents('complaints.txt'), true);

foreach ($fileContent as $complaint) {
    echo $complaint;
    echo '<br />';
}