<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные
    $data = [
        'date' => date("Y-m-d H:i:s"),
        'name' => strip_tags(trim($_POST["name"])),
        'phone' => strip_tags(trim($_POST["phone"])),
        'device' => strip_tags(trim($_POST["device"])),
        'issue' => strip_tags(trim($_POST["issue"]))
    ];
    
    $file = 'requests.json';
    
    // Читаем существующие данные
    if (file_exists($file)) {
        $json = file_get_contents($file);
        $requests = json_decode($json, true) ?? [];
    } else {
        $requests = [];
    }
    
    // Добавляем новую заявку
    $requests[] = $data;
    
    // Сохраняем обратно
    file_put_contents($file, json_encode($requests, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    
    echo "ok";
}
?>
