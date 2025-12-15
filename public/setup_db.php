<?php
require_once '../app/config/Config.php';

try {
    // 1. Connect to MySQL Server (without DB name first)
    $dsn = 'mysql:host=' . DB_HOST;
    $pdo = new PDO($dsn, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2. Read SQL file
    $sqlFile = '../assets/database.sql';
    if (!file_exists($sqlFile)) {
        die("SQL file not found at: " . $sqlFile);
    }
    
    $sql = file_get_contents($sqlFile);

    // 3. Execute Multi-query
    // Note: PDO can execute multi-query if emulation is enabled (default true)
    // But to be safe and handle delimiters, we might want to split.
    // However, the SQL provided is simple. Let's try direct EXEC.
    
    $pdo->exec($sql);
    
    echo "<h1>Database Imported Successfully!</h1>";
    echo "<p>You can now <a href='" . BASEURL . "/auth/login'>Login</a>.</p>";

} catch (PDOException $e) {
    die("Database Setup Error: " . $e->getMessage());
}
