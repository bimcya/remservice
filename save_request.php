<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные
    $name = strip_tags(trim($_POST["name"]));
    $phone = strip_tags(trim($_POST["phone"]));
    $device = strip_tags(trim($_POST["device"]));
    $issue = strip_tags(trim($_POST["issue"]));
    
    // Формируем строку для записи
    $date = date("Y-m-d H:i:s");
    $new_request = "\n=== Заявка от $date ===\n";
    $new_request .= "Имя: $name\n";
    $new_request .= "Телефон: $phone\n";
    $new_request .= "Устройство: $device\n";
    $new_request .= "Проблема: $issue\n";
    $new_request .= "========================\n";
    
    // Записываем в файл
    $file = 'requests.txt';
    file_put_contents($file, $new_request, FILE_APPEND | LOCK_EX);
    
    echo "ok";
}
?>
