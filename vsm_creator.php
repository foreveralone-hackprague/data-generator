<?php

$filename = 'vsm.csv';

$categories = [
  'Automotive',
  'Baby',
  'Beauty',
  'Books',
  'Cafe',
  'Clothing',
  'Computers',
  'Culture',
  'Electronics',
  'Entertainment',
  'Games',
  'Garden',
  'Grocery',
  'Health',
  'Home',
  'Industrial',
  'Jewelry',
  'Kids',
  'Movies',
  'Music',
  'Outdoors',
  'Restaurant',
  'Shoes',
  'Sports',
  'Tools',
  'Toys',
  'Traveling',
];

$csv = array_map('str_getcsv', file('transactions.csv'));
$db = [];

function add_amount($user_id, $category, $amount) {
  global $db;

  if (!array_key_exists($user_id, $db)) {
    $db[$user_id] = [];
  }

  if (!array_key_exists($category, $db[$user_id])) {
    $db[$user_id][$category] = $amount;
  } else {
    $db[$user_id][$category] += $amount;
  }
}

function get_amount($user_id, $category) {
  global $db;

  if (array_key_exists($category, $db[$user_id])) {
    return $db[$user_id][$category];
  }

  return 0;
}

foreach ($csv as $line) {
  add_amount($line[0], $line[1], $line[2]);
}

$handle = fopen($filename, 'w+');

fwrite($handle, "user_id,");

foreach ($categories as $category) {
  fwrite($handle, $category . ",");
}

fwrite($handle, "dummy\n");

foreach ($db as $user_id => $details) {
  fwrite($handle, $user_id . ",");

  foreach ($categories as $category) {
    fwrite($handle, get_amount($user_id, $category) . ",");
  }

  fwrite($handle, -1 . "\n");
}

fclose($handle);
