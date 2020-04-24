<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
$error = [];
if (!empty($_POST)) {
    if (empty($_POST['name'])) {
        $error['name'] = 'Имя не может пустым';
    }
    if (empty($_POST['surname'])) {
        $error['surname'] = 'Фамилия не может пустой';
    }
    if (empty($_POST['age']) || $_POST['age'] < 1) {
        $error['age'] = 'Возраст задан некорректно';
    }
    if (empty($_POST['email']) || $_POST['age'] ) {
        $error[] = 'Возраст задан некорректно';
    }
}
$lang (!empty($_GET['lang'])) ? $_GET['lang'] : 'ru';
$lables = [
    'ru' => ['name' => 'Имя', ]
];
switch ()
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
<!--    <h3 style="color:red">--><?//=implode("<br />", $error) ?><!--</h3>-->
    <div class="float-right">
        <a href="?lang=RU" class="badge badge-primary">Русский</a>
        <a href="?lang=UA" class="badge badge-secondary">Украинский</a>
        <a href="?lang=EN" class="badge badge-success">Английский</a>
    </div>
    <form method="post" action="user.php">
        <div class="form-group">
            <label for="formGroupExampleInput">Имя</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="name" placeholder="Example input"
                   value="<?php echo $_POST['name'] ?? 'Mike' ?>">
            <?php if(!empty($error['name'])) : ?>
            <small id="passwordHelpBlock" class="form-text text-muted">
                <?=$error['name'] ?>
            </small>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Фамилия</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="surname"
                   placeholder="Example input" value="<?= $_POST['surname'] ?? 'Kardakov' ?>">
            <?php if(!empty($error['surname'])) : ?>
                <small id="passwordHelpBlock" class="form-text text-muted">
                    <?=$error['surname'] ?>
                </small>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Возраст</label>
            <input type="number" class="form-control" id="formGroupExampleInput" name="age" placeholder="Example input"
                   value="<?= $_POST['age'] ?? '20' ?>">
            <?php if(!empty($error['age'])) : ?>
                <small id="passwordHelpBlock" class="form-text text-muted">
                    <?=$error['age'] ?>
                </small>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Почта</label>
            <input type="email" class="form-control" id="formGroupExampleInput" name="email" placeholder="Example input"
                   value="<?= $_POST['email'] ?? 'example@gmail.com' ?>">
            <?php if(!empty($error['email'])) : ?>
                <small id="passwordHelpBlock" class="form-text text-muted">
                    <?=$error['email'] ?>
                </small>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Example select</label>
            <select multiple="multiple" class="form-control" id="exampleFormControlSelect1" name="gender[]">
                <option></option>
                <option>Man</option>
                <option>Woman</option>
                <option>Others</option>

            </select>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</div>
</body>
</html>