<?php
var_dump($_POST);
var_dump($_GET);
error_reporting(E_ALL); // Показать все ошибки
ini_set('display_errors', true); // Покажи на экране

$lang = $_GET['lang'] ?? 'EN'; //Нашел тут https://www.php.net/manual/ru/migration70.new-features.php Понял что для версий старше 7,0
//$lang (!empty($_GET['lang'])) ? $_GET['lang'] : 'RU';
$transform = [
    'name' => ['EN' => 'Name','RU' => 'Имя','UA' => "Ім'я"],
    'surname' => ['EN' => 'Surname','RU' => 'Фамилия','UA' => 'Прізвище'],
    'age' => ['EN' => 'Age','RU' => 'Влозраст','UA' => 'Вік'],
    'email' => ['EN' => 'E-mail', 'RU' => 'Э-почта', 'UA' => 'Е-пошта'],
    'gender' => ['EN' => 'Gender', 'RU' => 'Пол', 'UA' => 'Стать'],
    'enterbtn' => ['EN' => 'Enter', 'RU' => 'Отправить', 'UA' => 'Відправити'],
    //'errorname' => ['EN' =>'1', 'RU' => '2', 'UA' =>'3'],

];
$error = [];
if (!empty($_POST)) {
    if (empty($_POST['name'])) {
        $error['name'] =  'Введите имя';//transform['errorname'][$lang]
    }
    if (empty($_POST['surname'])) {
        $error['surname'] = 'Введите фамилию';
    }
    if (empty($_POST['age'])) {
        $error['age'] = 'введите возраст';
    }
        else if ($_POST['age'] < 16) {
            $error['age'] = 'Подрости до 16';
        }
        else if ($_POST['age'] > 99) {
            $error['age'] = 'Регистрация только для землян';
        }

    if (empty($_POST['email']) || $_POST['email'] == 'example@gmail.com' ) {
        $error['email'] = 'введите почту';
    }
}
//    if (empty($_POST['gender'])) {
//        $error['gender'] = 'Ваш пол';
//    }

//$ages = array_column($users, 'name');
//$key=array_search(75, $ages);
//
////if ($key !== false) {
//////    echo "Старичек найден";
//////}   else {
//////    echo "Not found";
//////}
//
//exit();


// switch ($lang)
// {
//     case 'RU':
//            $translation = $transform['EN'];
//         break;
//     case  'UA':
//         $translation = $transform['RU'];
//         break;
//     case 'EN':
//         $translation = $transform['UA'];
//         break;
// }

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
<h1>Форма регистрации</h1>
<div class="container">

    <div class="float-right">
        <a href="http://localhost:8080/user.php" class="badge badge-danger">Default</a>
        <a href="?lang=EN" class="badge badge-success">Английский</a>
        <a href="?lang=RU" class="badge badge-primary">Русский</a>
        <a href="?lang=UA" class="badge badge-secondary">Украинский</a>
    </div>
    <form method="post" action="stats.php">
        <div class="form-group">
            <label for="formGroupExampleInput"><?=$transform['name'][$lang] ?>
                <?php if(!empty($error['name'])) : ?>
                    <small id="passwordHelpBlock" class="alert alert-danger">
                        <?=$error['name'] ?>
                    </small>
                <?php endif; ?>
            </label>
            <input class="form-control" id="formGroupNameInput" name="name" placeholder=" " type="text"
                   value="<?php echo $_POST['name'] ?? '' ?>">

        </div>
        <div class="form-group">
            <label for="formGroupExampleInput"><?=$transform['surname'][$lang] ?>
                <?php if(!empty($error['surname'])) : ?>
                    <small id="passwordHelpBlock" class="alert alert-danger">
                        <?=$error['surname'] ?>
                    </small>
                <?php endif; ?>
            </label>
            <input type="text" class="form-control" id="formGroupSurnameInput" name="surname"
                   placeholder="" value="<?= $_POST['surname'] ?? '' ?>">

        </div>
        <div class="form-group">
            <label for="formGroupExampleInput"><?=$transform['age'][$lang] ?>
                <?php if(!empty($error['age'])) : ?>
                    <small id="passwordHelpBlock" class="alert alert-danger">
                        <?=$error['age'] ?>
                    </small>
                <?php endif; ?>
            </label>
            <input type="number" class="form-control" id="formGroupAGEInput" name="age" placeholder=""
                   value="<?= $_POST['age'] ?? '' ?>">

        </div>
        <div class="form-group">
            <label for="formGroupExampleInput"><?=$transform['email'][$lang] ?>
                <?php if(!empty($error['email'])) : ?>
                    <small id="passwordHelpBlock" class="alert alert-danger">
                        <?=$error['email'] ?>
                    </small>
                <?php endif; ?>
            </label>
            <input type="email" class="form-control" id="formGroupMailInput" name="email" placeholder=""
                   value="<?= $_POST['email'] ?? 'example@gmail.com' ?>">

        </div>
<!--  Пока не работающий блок. Не могу разобраться, но ПОСТ определенно тут не делает то что надо-->
        <div class="form-group">
            <?php $gender1 = empty($_POST['gender']) ? 'OtHers' : $_POST['gender']  ?>
            <label for="exampleFormControlSelect1"><?=$transform['gender'][$lang] ?>
                <?php if(!empty($error['gender'])) : ?>
                    <small id="passwordHelpBlock" class="alert alert-danger">
                        <?=$error['gender'] ?>
                    </small>
                <?php endif; ?>
            </label>
            <select  class="form-control" id="exampleFormControlSelect1" name="gender">

                <option></option>
                <option<?=$gender1 == 'Man' ? 'selected': '' ?>>Man</option>
                <option<?=$gender1 == 'Woman' ? 'selected': '' ?>>Woman</option>
                <option<?=$gender1 == 'OtHers' ? 'selected': '' ?>>OtHers</option>
                <?php if(!empty($error['gender'])) : ?>
                    <small id="passwordHelpBlock" class="form-text text-muted">
                        <?=$error['gender'] ?>
                    </small>
                <?php endif; ?>

            </select>
        </div>
        <button type="submit" class="btn btn-primary"><?=$transform['enterbtn'][$lang] ?></button>
    </form>
</div>
</body>
</html>