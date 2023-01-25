<?php
header('Content-Type: application/json; charset=utf-8');
$users = [
    [
        "email" => "user1@gmail.com",
        "id" => 1
    ],
    [
        "email" => "user2@gmail.com",
        "id" => 2
    ],
    [
        "email" => "user3@gmail.com",
        "id" => 3
    ],
    [
        "email" => "user4@gmail.com",
        "id" => 4
    ],
    [
        "email" => "user5@gmail.com",
        "id" => 5
    ],
];


if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm"])) {

    $filename = 'logs.txt';
    $arr = file($filename, FILE_IGNORE_NEW_LINES);

    foreach ($arr as $line) {
        $data = explode("-", $line);
        $temp[] = $data[0];
    }

    // Формируем массив для JSON ответа
    $result = array(
        'email' => $_POST["email"],
        'password' => $_POST["password"],
        'confirm' => $_POST["confirm"]
    );

    for ($i = 0; $i < count($users); $i++) {
        if ($_POST["email"] == $users[$i]['email']) {
            $result = '<h1 class="err__msg">Уже есть пользователь с таким email</h1>';
            $fd = fopen($filename, "a");
            $msg = 'Уже есть пользователь с таким email' . "\r\n";
            fwrite($fd, $msg);
            fclose($fd);
        }
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $result = '<h1 class="err__msg">Неверно заполнен Email</h1>';
        }
        if (empty($_POST['email'])) {
            $result = '<h1 class="err__msg">Поле "Email" не заполнено</h1>';
            $fd = fopen($filename, "a");
            $msg = 'Поле "Email" не заполнено' . "\r\n";
            fwrite($fd, $msg);
            fclose($fd);
        }
        if ($_POST['password'] != $_POST['confirm']) {
            $result = '<h1 class="err__msg">Пароли не совпадают</h1>';
            $fd = fopen($filename, "a");
            $msg = 'Пароли не совпадают' . "\r\n";
            fwrite($fd, $msg);
            fclose($fd);
        }
    }
    // Переводим массив в JSON
    echo json_encode($result);
}
