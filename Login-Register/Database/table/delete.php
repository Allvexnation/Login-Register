<?php
header('Content-Type: application/json');

require __DIR__ . '/../db_connection.php';

$data = json_decode(file_get_contents('php://input'), true);
$emails = $data['emails'] ?? [];

if (empty($emails)) {
    echo json_encode(['success' => false, 'message' => 'No emails provided']);
    exit;
}

$conn->beginTransaction();

$stmt = $conn->prepare("DELETE FROM signup WHERE email = ?");
if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'SQL statement preparation failed']);
    exit;
}

$success = true;
$deletedEmails = [];

foreach ($emails as $email) {
    $stmt->bindParam(1, $email);
    
    if ($stmt->execute()) {
        $deletedEmails[] = $email;
    } else {
        $success = false;
        break;
    }
}

$stmt->closeCursor();

if ($success) {
    $conn->commit();
    echo json_encode(['success' => true, 'deleted' => $deletedEmails]);
} else {
    $conn->rollBack();
    echo json_encode(['success' => false, 'message' => 'Error deleting records']);
}

$conn = null;
?>