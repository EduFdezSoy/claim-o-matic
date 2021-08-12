<?php

$inputs = [];
$inputs["username"] = $_POST['username'];
$inputs["type"] = $_POST['type'];
$inputs["name"] = $_POST['name'];
$inputs["language"] = $_POST['lang'];
$inputs["subs"] = $_POST['subs'];
$inputs["extra"] = $_POST['extra'];


array2csv($inputs);


// FUNCTIONS

function array2csv(array &$array)
{
  if (count($array) == 0) {
    return null;
  }

  $df = fopen("petitions.csv", 'a+');

  $line = fgets($df);
  if ($line == '' | $line == false) {
    // puts keys (dont let it run more than once)
    fputcsv($df, array_keys($array));
  }

  fputcsv($df, $array);
  fclose($df);
}

