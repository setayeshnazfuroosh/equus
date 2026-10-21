<?php
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/includes/security.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !csrf_valid()) { http_response_code(400); exit('Invalid request. Return to the breeds page and try again.'); }
$colors = ['black','brown','bay','gray']; $ages = [5,10,15,20]; $numbers = [1,2,3];
$color = is_string($_POST['color'] ?? null) ? $_POST['color'] : '';
$age = filter_var($_POST['age'] ?? null, FILTER_VALIDATE_INT);
$number = filter_var($_POST['number'] ?? null, FILTER_VALIDATE_INT);
$allowedEquipment = ['Riding boots','Riding clothes','Equestrian helmet','Equestrian gloves','Grooming tools'];
$equipment = $_POST['need'] ?? [];
if (!is_array($equipment)) $equipment = [];
$equipment = array_values(array_intersect(array_filter($equipment, 'is_string'), $allowedEquipment));
if (!in_array($color, $colors, true) || !in_array($age, $ages, true) || !in_array($number, $numbers, true)) { header('Location: horse.php?error=1'); exit; }
$stmt = $pdo->prepare('INSERT INTO selections (color, age, number_of_horses, equipment) VALUES (:color, :age, :number, :equipment)');
$stmt->execute([':color'=>$color, ':age'=>$age, ':number'=>$number, ':equipment'=>implode(', ', $equipment)]);
header('Location: horse.php?saved=1'); exit;
