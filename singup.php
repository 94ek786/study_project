<?php
$GLOBALS["n"] = 3;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <?php include 'js/module_basic.php'; ?>
</head>

<body>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <h2>註冊</h2>
                    <form method="post" action="_singup.php">
                        <select required name="type">
                            <option label value="">請先選擇註冊為房東或房客</option>
                            <option value="tenant">房客</option>
                            <option value="landlord">房東</option>
                        </select>
                        <p></p>
                        帳號
                        <input autofocus required name="username" data-index="1" onkeydown="next_input(event)">
                        <p></p>
                        密碼
                        <input required name="password" data-index="2" onkeydown="next_input(event)">
                        <p></p>
                        信箱
                        <input required name="email" data-index="3" onkeydown="next_input(event)">
                        <p></p>
                        <input type="submit" data-index="4" name="submit" value="註冊">
                    </form>
                    <br>
                    <a href="login.php">我已有帳號點此登入</a>
                </div>
            </div>
        </div>
    </section>
</body>

</html>