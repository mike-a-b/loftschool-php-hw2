<?php
require_once 'src/functions.php';

for ($i = 1; $i <= 50; $i++) {
    $users[] = createUser();
}

file_put_contents('users.json', json_encode($users));

$data = file_get_contents('users.json');
$decodedUsers = json_decode($data, true);

var_dump($decodedUsers);

$names = [];
$sumAge = 0;

foreach ($decodedUsers as $user) {
    if (isset($names[$user['name']])) {
        $names[$user['name']]++;
    } else {
        $names[$user['name']] = 1;
    }
    $sumAge += $user['age'];
}

var_dump($names);
echo "Средний возраст: " . ($sumAge / count($decodedUsers));
