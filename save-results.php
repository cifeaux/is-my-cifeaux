<?php
/**
 * Save Results API
 * Stores colour perception test results to MySQL database
 */

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Include database configuration
require_once 'config.php';

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit();
}

try {
    // Get JSON input
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    if (!$data) {
        throw new Exception('Invalid JSON data');
    }

    // Validate required fields
    $required_fields = ['verdict', 'acceptedCount', 'bias', 'answers', 'timestamp'];
    foreach ($required_fields as $field) {
        if (!isset($data[$field])) {
            throw new Exception("Missing required field: $field");
        }
    }

    // Connect to database
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conn->connect_error) {
        throw new Exception('Database connection failed: ' . $conn->connect_error);
    }

    // Prepare data
    $verdict = $conn->real_escape_string($data['verdict']);
    $accepted_count = (int) $data['acceptedCount'];
    $bias = $conn->real_escape_string($data['bias']);
    $answers_json = $conn->real_escape_string(json_encode($data['answers']));
    $timestamp = $conn->real_escape_string($data['timestamp']);
    $user_ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';

    // Insert into database
    $sql = "INSERT INTO cifeaux_results
            (verdict, accepted_count, bias, answers, timestamp, user_ip, user_agent, created_at)
            VALUES
            ('$verdict', $accepted_count, '$bias', '$answers_json', '$timestamp', '$user_ip', '$user_agent', NOW())";

    if ($conn->query($sql) === TRUE) {
        $insert_id = $conn->insert_id;

        // Return success response
        echo json_encode([
            'success' => true,
            'id' => $insert_id,
            'message' => 'Results saved successfully'
        ]);

        http_response_code(201);
    } else {
        throw new Exception('Database error: ' . $conn->error);
    }

    $conn->close();

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
?>
