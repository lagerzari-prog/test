<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    
    // Сохраняем данные в файл
    $data = "Имя: $name | Email: $email | Время: " . date('Y-m-d H:i:s') . "\n";
    file_put_contents('users.txt', $data, FILE_APPEND | LOCK_EX);
    
    // Перенаправляем на страницу благодарности
    header('Location: ../frontend/thank-you.html');
    exit();
} else {
    // Если кто-то попытался открыть файл напрямую
    header('Location: ../frontend/form.html');
    exit();
}
?>
