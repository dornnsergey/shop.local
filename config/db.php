<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=shop.local', 'root', '');
}catch (PDOException $e) {
    echo 'Не получается подключиться к базе данных ' . $e->getMessage();
}
