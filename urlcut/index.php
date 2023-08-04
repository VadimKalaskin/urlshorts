<?php

include '../db.php';

$db = new Database("localhost", "urlcut", "root123", "urlcutpass");
$db = $db->connect();

$url = $_POST['long_url'];

$q = "INSERT INTO `urls` (`long`) VALUES (:long_url)";
$stmt = $db->prepare($q);
$params = array(
	"long_url" => $url
);

$result = $stmt->execute($params);

header("location: /?i=". $db->lastInsertId());