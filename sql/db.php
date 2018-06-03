<?php
$conn = new PDO(
    "mysql:host={$config[db][host]};dbname={$config[db][dbname]}",
    $config[db][username],
    $config[db][password]
);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT username FROM members ORDER BY username");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($results);
?>
