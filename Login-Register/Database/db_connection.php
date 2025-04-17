<?php
try {
    $db_path = __DIR__ . "/register.db";
    $conn = new PDO("sqlite:" . $db_path);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->exec("CREATE TABLE IF NOT EXISTS signup (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        email TEXT NOT NULL,
        phone TEXT NOT NULL,
        username TEXT NOT NULL,
        password TEXT NOT NULL
    )");
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>