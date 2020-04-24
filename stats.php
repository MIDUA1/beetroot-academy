<?php

$users = [
[
'name' => 'Bob',
'surname' => 'Martin',
'age' => 75,
'gender' => 'man',
'avatar' => 'https://i.ytimg.com/vi/sDnPs_V8M-c/hqdefault.jpg',
'animals' => ['dog']
],
[
'name' => 'Alice',
'surname' => 'Merton',
'age' => 25,
'gender' => 'woman',
'avatar' => 'https://i.scdn.co/image/d44a5d71596b03b5dc6f5bbcc789458700038951',
'animals' => ['dog', 'cat']
],
[
'name' => 'Jack',
'surname' => 'Sparrow',
'age' => 45,
'gender' => 'man',
'avatar' => 'https://pbs.twimg.com/profile_images/427547618600710144/wCeLVpBa_400x400.jpeg',
'animals' => []
],
[
'name' => 'Angela',
'surname' => 'Merkel',
'age' => 65,
'gender' => 'woman',
'avatar' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Besuch_Bundeskanzlerin_Angela_Merkel_im_Rathaus_K%C3%B6ln-09916.jpg/330px-Besuch_Bundeskanzlerin_Angela_Merkel_im_Rathaus_K%C3%B6ln-09916.jpg',
'animals' => ['dog', 'parrot', 'horse']
]
];
if (!empty($_POST)){
    $users[] = $_POST;
}
//print_r($users);
//Самый старый пользовател
$ages = array_column($users, 'age');//берем возраста
var_dump($ages);//Выводим возраста
$maxAge = max($ages);//берем мах возраст
$maxAgeId = array_search($maxAge, $ages);//Берем id ПОЛЬЗОВАТЕЛЯ
echo '<br />';//
var_dump($maxAge);//выводим мах возраст
$oldertUser = $users[$maxAgeId];

//Общее колличество пользователей смотреть в li

//вся инфа о джеке в таблице
$names = array_column($users, 'name');
define('JACK', 'Jack');
$searchjack = array_search(JACK, $names);
//Случайный пользователь
$randomuserid = rand(0,count($users) -1);
$randomuserid = $users[$randomuserid];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<br/>
<h1>Статистика</h1>
<div class="container">
<ul>
    <li>Самый старый пользователь: <?=$oldertUser['name']." ".$oldertUser['surname'].", age: ".$oldertUser['age'];?></li>
    <li>Общее колличество пользователей в базе: <?=count($users);?></li>
</ul>
    <a href="/user.php" class="badge badge-success">Registration users</a>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Surname</th>
            <th scope="col">Age</th>
            <th scope="col">Gender</th>
            <th scope="col">Avatar</th>
            <th scope="col">Animals</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row"><?=$searchjack?></th>
            <td><?=$users[$searchjack]['name']?></td>
            <td><?=$users[$searchjack]['surname']?></td>
            <td><?=$users[$searchjack]['age']?></td>
            <td><?=$users[$searchjack]['gender']?></td>
            <td><img src="<?=$users[$searchjack]['avatar']?>" class="mr-3"></td>
            <td><?=$users[$searchjack]['animals']?></td>
        </tr>
        <tr>
            <th scope="row"><?=$randomuserid?></th>
            <td><?=$randomuserid['name']?></td>
            <td><?=$randomuserid['surname']?></td>
            <td><?=$randomuserid['age']?></td>
            <td><?=$randomuserid['gender']?></td>
            <td><img src="<?=$randomuserid['avatar']?>" class="mr-3"></td>
            <td><?=$randomuserid['animals']?></td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>
