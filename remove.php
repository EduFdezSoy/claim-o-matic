<?php

$dir = "petitions.csv";
$row_number = $_GET['row'];    // Number of the line we are deleting
$file_out = file($dir); // Read the whole file into an array

//Delete the recorded line
unset($file_out[$row_number]);

//Recorded in a file
file_put_contents($dir, implode("", $file_out));