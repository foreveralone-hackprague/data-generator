<?php

$max_users = 1000;
$months = 3;
$filename = 'transactions.csv';

$categories = [
  'Automotive' => [
    'general_chance' => 50,
    'occurences_per_month' => [0, 3],
    'spending' => [100, 1000],
  ],
  'Baby' => [
    'general_chance' => 10,
    'occurences_per_month' => [0, 10],
    'spending' => [10, 100],
  ],
  'Beauty' => [
    'general_chance' => 100,
    'occurences_per_month' => [1, 3],
    'spending' => [10, 100],
  ],
  'Books' => [
    'general_chance' => 25,
    'occurences_per_month' => [0, 3],
    'spending' => [10, 40],
  ],
  'Cafe' => [
    'general_chance' => 60,
    'occurences_per_month' => [0, 6],
    'spending' => [10, 20],
  ],
  'Clothing' => [
    'general_chance' => 100,
    'occurences_per_month' => [0, 1],
    'spending' => [10, 200],
  ],
  'Computers' => [
    'general_chance' => 10,
    'occurences_per_month' => [0, 1],
    'spending' => [50, 2000],
  ],
  'Culture' => [
    'general_chance' => 75,
    'occurences_per_month' => [1, 2],
    'spending' => [50, 100],
  ],
  'Electronics' => [
    'general_chance' => 50,
    'occurences_per_month' => [1, 3],
    'spending' => [10, 100],
  ],
  'Entertainment' => [
    'general_chance' => 50,
    'occurences_per_month' => [1, 3],
    'spending' => [10, 30],
  ],
  'Games' => [
    'general_chance' => 20,
    'occurences_per_month' => [0, 5],
    'spending' => [1, 60],
  ],
  'Garden' => [
    'general_chance' => 5,
    'occurences_per_month' => [0, 2],
    'spending' => [10, 200],
  ],
  'Grocery' => [
    'general_chance' => 100,
    'occurences_per_month' => [1, 10],
    'spending' => [10, 100],
  ],
  'Health' => [
    'general_chance' => 100,
    'occurences_per_month' => [1, 1],
    'spending' => [10, 200],
  ],
  'Home' => [
    'general_chance' => 50,
    'occurences_per_month' => [1, 3],
    'spending' => [10, 200],
  ],
  'Industrial' => [
    'general_chance' => 5,
    'occurences_per_month' => [0, 2],
    'spending' => [10, 800],
  ],
  'Jewelry' => [
    'general_chance' => 50,
    'occurences_per_month' => [1, 1],
    'spending' => [40, 500],
  ],
  'Kids' => [
    'general_chance' => 15,
    'occurences_per_month' => [1, 10],
    'spending' => [10, 300],
  ],
  'Movies' => [
    'general_chance' => 25,
    'occurences_per_month' => [1, 3],
    'spending' => [10, 30],
  ],
  'Music' => [
    'general_chance' => 35,
    'occurences_per_month' => [1, 3],
    'spending' => [1, 20],
  ],
  'Outdoors' => [
    'general_chance' => 35,
    'occurences_per_month' => [1, 2],
    'spending' => [10, 80],
  ],
  'Restaurant' => [
    'general_chance' => 50,
    'occurences_per_month' => [1, 7],
    'spending' => [20, 80],
  ],
  'Shoes' => [
    'general_chance' => 15,
    'occurences_per_month' => [1, 1],
    'spending' => [20, 80],
  ],
  'Sports' => [
    'general_chance' => 60,
    'occurences_per_month' => [1, 3],
    'spending' => [10, 30],
  ],
  'Tools' => [
    'general_chance' => 5,
    'occurences_per_month' => [1, 1],
    'spending' => [10, 50],
  ],
  'Toys' => [
    'general_chance' => 15,
    'occurences_per_month' => [1, 2],
    'spending' => [10, 20],
  ],
  'Traveling' => [
    'general_chance' => 80,
    'occurences_per_month' => [0, 1],
    'spending' => [100, 800],
  ],
];

if (file_exists($filename)) {
  unlink($filename);
}

$handle = fopen($filename, 'w+');

for ($user_id = 1; $user_id <= $max_users; $user_id++) {
  foreach ($categories as $cat => $cat_details) {
    $p = rand(0, 99);

    if ($p < $cat_details['general_chance']) {
      for ($k = 0; $k < $months; $k++) {
        $month_occurences = rand($cat_details['occurences_per_month'][0], $cat_details['occurences_per_month'][1]);

        for ($m = 0; $m < $month_occurences; $m++) {
          $amount = rand($cat_details['spending'][0], $cat_details['spending'][1]);
          fwrite($handle, $user_id . "," . $cat . "," . $amount . "\n");
        }
      }
    }
  }
}

fclose($handle);
