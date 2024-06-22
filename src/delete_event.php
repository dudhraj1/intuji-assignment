<?php
/**
 * Delete Event
 *
 * This file deletes an event from the user's Google Calendar based on the provided event ID.
 */

require_once 'config.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $client = getClient();
    $service = new Google_Service_Calendar($client);

    // Get the event ID from the form
    $eventId = $_POST['event_id'];

    try {
        $service->events->delete('primary', $eventId);
        $message = 'Event deleted successfully';
    } catch (Exception $e) {
        $message = 'Error: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Event</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="container">
    <h1>Event Deleted</h1>
    <?php if (!empty($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <a href="index.php" class="button">Back to Main Page</a>
</div>
</body>
</html>
