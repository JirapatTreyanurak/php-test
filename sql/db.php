<?php
$conn = new PDO(
    "mysql:host={$config[db][host]};dbname={$config[db][dbname]}",
    $config[db][username],
    $config[db][password]
);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

function getMembers () {
    global $conn;
    $stmt = $conn->prepare("SELECT username FROM member ORDER BY username");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

foreach (getMembers() as $row) {
    echo htmlentities($row[username]);
}

?>
