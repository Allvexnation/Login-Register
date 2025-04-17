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

$checkEmail = "SELECT * FROM signup WHERE email = :email";
$stmt = $conn->prepare($checkEmail);
$stmt->bindParam(':email', $email);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    echo json_encode(['success' => false, 'message' => 'Email already exists']);
    exit;
}

$sql = "INSERT INTO signup (email, phone, username, password) VALUES (:email, :phone, :username, :password)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':phone', $phone);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Error adding record']);
}

$conn = null;
?>