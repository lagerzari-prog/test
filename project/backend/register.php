<?php 
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';

if ($name && $email) {
    file_put_contents('users.txt', "$name, $email\n", FILE_APPEND);
    echo "<h1>Спасибо, $name! Вы зарегистрированы.</h1>";
} else {
    echo "<h1>Ошибка: все поля обязательны</h1>";
}
echo "<a href='../frontend/form.html'>Назад</a>"
?>
