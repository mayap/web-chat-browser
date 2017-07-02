<?php

$fileContent = json_decode(file_get_contents('compliments.txt'), true);

foreach ($fileContent as $compliment) {
    echo $compliment;
    echo '<br />';
}