<?php
header('Content-Type: application/json');

require __DIR__ . '/../db_connection.php';

$data = json_decode(file_get_contents('php://input'), true);
$email = $data['email'] ?? '';
$phone = $data['phone'] ?? '';
$username = $data['username'] ?? '';
$password = $data['password'] ?? '';

if (empty($email) || empty($phone) || empty($username) || empty($password)) {
    echo json_encode(['success' => false, 'message' => 'All fields are required']);
    exit;
}

$sql = "UPDATE signup SET phone = :phone, username = :username, password = :password WHERE email = :email";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':phone', $phone);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);
$stmt->bindParam(':email', $email);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Error updating record']);
}

$conn = null;
?>