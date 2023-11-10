<?php

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405); 
    die("Bu API sadece GET isteklerini kabul eder.");
}

$db = new SQLite3('mobdev.db');

if (!$db) {
    die("Veritabanına bağlanılamadı: " . $db->lastErrorMsg());
}

$results = $db->query('SELECT * FROM item');

$data = array();

while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
    $data[] = $row;
}

echo json_encode($data);

$db->close();
?>


<!--// parol ile post ile-->
<!--function authenticate($username, $password) {-->
<!--   -->
<!--    $validUsername = "sa";-->
<!--    $validPassword = "abc";-->
<!---->
<!--    return ($username === $validUsername && $password === $validPassword);-->
<!--}-->
<!---->
<!--if ($_SERVER['REQUEST_METHOD'] !== 'POST') {-->
<!--    http_response_code(405); // Method Not Allowed-->
<!--    die("POST METHODU ISLET.");-->
<!--}-->
<!---->
<!--$username = $_SERVER['PHP_AUTH_USER'] ?? '';-->
<!--$password = $_SERVER['PHP_AUTH_PW'] ?? '';-->
<!---->
<!--if (!authenticate($username, $password)) {-->
<!--    header('WWW-Authenticate: Basic realm="API"');-->
<!--    http_response_code(401);-->
<!--    die("Unauthorized");-->
<!--}-->
<!---->
<!--$db = new SQLite3('mobdev.db');-->
<!---->
<!--if (!$db) {-->
<!--    die("DATABASEYE QOSULMADI: " . $db->lastErrorMsg());-->
<!--}-->
<!---->
<!--$results = $db->query('SELECT * FROM item');-->
<!---->
<!--$data = array();-->
<!---->
<!--while ($row = $results->fetchArray(SQLITE3_ASSOC)) {-->
<!--    $data[] = $row;-->
<!--}-->
<!---->
<!--echo json_encode($data);-->
<!---->
<!--$db->close();-->


