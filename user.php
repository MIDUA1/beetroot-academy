<?php
$name = name;
$login = 'enter login';
$age = '32';
$email = 'Michael@dubov.com';
var_dump($_POST);
var_dump($_GET);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<h1> Yuor
    Name: <?=$_POST['name']?><br /></h1>
   <h3> Login:<?=$_POST['login']?><br />
    Password: <?=$_POST['pass2']?><br />
    E-mail: <?=$_POST['email']?><br />
    gender <?=$_POST['gender'][0] ?></h3>
<!--<div class="container">-->
<!--    <form method="post" action="user.php">-->
<!--        <div class="form-group">-->
<!--            <label for="formGroupExampleInput">Name</label>-->
<!--            <input type="text" class="form-control" id="formGroupExampleInput" name="name" placeholder="Example input" value="--><?php //echo $_POST['name'] ?? 'Mike'?><!--">-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <label for="formGroupExampleInput">Surname</label>-->
<!--            <input type="text" class="form-control" id="formGroupExampleInput" name="surname" placeholder="Example input" value="--><?php //echo $_POST['surnamen'] ?? 'Bublikoff'?><!--">-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <label for="formGroupExampleInput">Age</label>-->
<!--            <input type="text" class="form-control" id="formGroupExampleInput" name="age" placeholder="Example input" value="--><?php //echo $_POST['age'] ?? '50'?><!--">-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <label for="formGroupExampleInput">email</label>-->
<!--            <input type="text" class="form-control" id="formGroupExampleInput" name="email" placeholder="Example input" value="--><?php //echo $_POST['email'] ?? 'email'?><!--">-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <label for="exampleFormControlSelect1">Example select</label>-->
<!--            <select multiple class="form-control" id="exampleFormControlSelect1" name = 'gender[]'>-->
<!--                <option>M</option>-->
<!--                <option>W</option>-->
<!--                <option>Other</option>-->
<!--            </select>-->
<!--        </div>-->
<!--        <button type="submit" class="btn btn-primary">Submit</button>-->
<!--    </form>-->
    <form method="post" action="user.php">
        <div class="form-group">
            <label for="formGroupExampleInput">Name</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="name" placeholder="Example input" value="<?php echo $_POST['name'] ?? 'Mike'?>">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Login</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="login" placeholder="Example input" value="<?php echo $_POST['login'] ?? 'enter login'?>">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="pass2" placeholder="Example input" value="<?php echo $_POST['pas'] ?? '****'?>">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">email</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="email" placeholder="Example input" value="<?php echo $_POST['email'] ?? 'email'?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">You gendrer</label>
            <select multiple class="form-control" id="exampleFormControlSelect1" name = 'gender[]'>
                <option>M</option>
                <option>W</option>
                <option>Other</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
