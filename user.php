<?php
// $name = name;
// $login = 'enter login';
// $age = '32';
// $email = 'Michael@dubov.com';
var_dump($_POST);
var_dump($_GET);
$lang = $_GET['lang'] ?? 'RU';
$transform = [
    'Name' => [
        'EN' => 'Name',
        'RU' => 'Имя',
        'UA' => 'Ім я'
    ],
    'Login' => [
        'EN' => 'Login',
        'RU' => 'Логин',
        'UA' => 'Логін'
    ],
    'Password' => [
        'EN' => 'Password',
        'RU' => 'Пароль',
        'UA' => 'Пароль'
    ],
    'Email' => [
        'EN' => 'E-mail',
        'RU' => 'Э-почта',
        'UA' => 'Е-пошта'
    ],
    'Phone' => [
        'EN' => 'Phone',
        'RU' => 'Телефон',
        'UA' => 'Телефон'
    ],
    'Gender' => [
        'EN' => 'Gender',
        'RU' => 'Пол',
        'UA' => 'Стать'
    ],
    'ofname' => [
        'EN' => 'Hello ',
        'RU' => 'Привет ',
        'UA' => 'Добрий день '
    ]
];
$languages = reset($transform);
echo '<ul> Enter Lg:';
foreach (array_keys($languages) as $language) {
    echo ' <a href="user.php?lang=' . $language . '">' . $language . '</a>  ';
    // $output = reset($transform);
    // echo '--------';
    // foreach ($_POST as $output => $value) {
    // echo $transform['ofname'][$lang];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register form</title>
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
          crossorigin="anonymous">
</head>
<body>
<div align="left">
    <h5>
        <?php
        foreach ($_POST as $key => $value) {
            echo $transform[$key][$lang] . ': ' . $value . '<br/>';
        }
        ?>
    </h5>
</div>

<form method="post" action="user.php">

    <div class="form-group">
        <label for="formGroupExampleInput"><?=$transform['Name'][$lang] ?></label>
        <input type="text" class="form-control" id="formGroupExampleInput"
               name="Name" placeholder="Example input"
               value="<?php echo $_POST['Name'] ?? ' '?>">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput"><?=$transform['Login'][$lang] ?></label>
        <input type="text" class="form-control" id="formGroupExampleInput"
               name="Login" placeholder="Example input"
               value="<?php echo $_POST['Login'] ?? ' '?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1"><?=$transform['Password'][$lang] ?></label>
        <input type="password" class="form-control"
               id="exampleInputPassword1" name="Password"
               placeholder="Example input"
               value="<?php echo $_POST['Password'] ?? ''?>">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput"><?=$transform['Email'][$lang] ?></label>
        <input type="text" class="form-control" id="formGroupExampleInput"
               name="Email" placeholder="Example input"
               value="<?php echo $_POST['Email'] ?? 'jonbuh@email.com'?>">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput"><?=$transform['Phone'][$lang] ?></label>
        <input type="text" class="form-control" id="formGroupExampleInput"
               name="Phone" placeholder="Example input"
               value="<?php echo $_POST['Phone'] ?? '+x(xxx)xxx-xx-xx'?>">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1"><?=$transform['Gender'][$lang] ?></label>
        <select class="form-control" id="exampleFormControlSelect1"
                name='Gender'>
            <option>M</option>
            <option>W</option>
            <option>Other</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<!--</div>-->
</body>
</html>
