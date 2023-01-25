<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Article FRUCTCODE.COM. How to send html-form with Ajax.</title>
    <meta name="description" content="Article FRUCTCODE.COM. How to send ajax form.">
    <meta name="author" content="fructcode.com">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="ajax.js"></script>


</head>

<body>
    <div class="wrapper">
        <form method="post" class="form" id="ajax_form" action="">
            <input id="email" type="email" name="email" placeholder="Почта" required /><br>
            <input id="password" type="password" name="password" placeholder="Пароль" required /><br>
            <input id="confirm" type="password" name="confirm" placeholder="Подтвердите пароль" required /><br>
            <input id="btn" type="button" class="form__btn" value="Отправить" />
        </form>



        <div class="result_form" id="result_form"></div>
    </div>
</body>

</html>