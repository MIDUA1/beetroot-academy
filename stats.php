<?php
define('BR', '<br />');
$even = false;
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


if (!empty($_GET['sort'])) {
    switch ($_GET['sort']) {
        case 'id':
            if (!empty($_GET['order']) && $_GET['order'] == 'desc') {
                krsort($users);
                } else {
                ksort($users);
            }
            $users = array_values($users);
            break;
    }

}
$animals = []; //Создаем пустой масив для животных
foreach ($users as $user) {
    $animals = array_merge($animals, $user['animals']); //Сливаем всех животных из масива users

}

$animalsfilter = array_unique($animals); //Убирает повторяющихся животных

if (!empty($_GET['filter'])){

    switch ($_GET['filter']){
        case'man':
            foreach ($users as $key => $user){
                if ($user['gender'] !== 'man') {
                    unset($users[$key]);
                }
            }
            break;
        case "woman":
            foreach ($users as $key => $user){
                if ($user['gender'] !== "woman") {
                    unset($users[$key]);
                }
            }
            break;
        case 'covid':
            foreach ($users as $key => $user){
                if ($user['age'] < 60) {
                    unset($users[$key]);
                }
        }
            break;

        case 'dog' :
        case 'cat' :
        case 'parrot' :
        case 'horse' :
            foreach ($users as $key => $user) {
                $index =array_search($_GET['filter'], $user['animals']);
                if (false === $index){
                    unset($users[$key]);
                }
            }
            break;
    }
}
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

    <a href="/user.php" class="badge badge-success">Registration users</a>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="row"><a href="?sort=id&order=<?=!empty($_GET['order']) && $_GET['order'] == 'desc' ? 'asc' : 'desc'?>">ID</a></th>
            <th scope="col"><a href="?sort=name">Name</a></th>
            <th scope="col"><a href="?sort=surname">Surname</a></th>
            <th scope="col"><a href="?sort=age">Age</a></th>
            <th scope="col"><a href="?sort=avatar">Avatar</a></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $key => $user) : ?>
        <?php $id = (!empty($_GET['sort']) && $_GET['sort'] == 'id' && $_GET['order'] == 'desc') ? count($users) - $key
                : $key + 1; ?>
        <?php $even=!$even;?>
        <tr style ="background-color: <?=($even) ?  '#fff000': 'ffffff'?>">
            <td><?=$id ?></td>
            <td><?=$user['name'] ?></td>
            <td><?=$user['surname'] ?></td>
            <td><?=$user['age'] ?></td>
            <td><img src="<?=$user['avatar'] ?>" width="100px"></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <form method="get">
    <select name="filter">
        <option value="man">Only Men</option>
        <option value="woman">Only woman</option>
        <option value="covid">Only Covid AGE</option>
        <?php foreach ($animalsfilter as $animal) :?>
        <option value="<?=$animal?>"><?= $animal ?> </option>
        <?php endforeach; ?>
    </select>
    <input type="submit">
    </form>
</div>
</body>
</html>
