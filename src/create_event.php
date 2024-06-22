<?php
/**
 * Create Event
 *
 * This file creates a new event in the user's Google Calendar.
 */

require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $client = getClient();
    $service = new Google_Service_Calendar($client);

    // Get form data
    $summary = $_POST['summary'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $startDateTime = $_POST['start_date'] . 'T' . $_POST['start_time'] . ':00';
    $endDateTime = $_POST['end_date'] . 'T' . $_POST['end_time'] . ':00';

    // Create a new event object
    $event = new Google_Service_Calendar_Event(array(
        'summary' => $summary,
        'location' => $location,
        'description' => $description,
        'start' => array(
            'dateTime' => $startDateTime,
            'timeZone' => 'Asia/Kathmandu',
        ),
        'end' => array(
            'dateTime' => $endDateTime,
            'timeZone' => 'Asia/Kathmandu',
        ),
    ));

    // Insert the event into the calendar
    $calendarId = 'primary';
    $event = $service->events->insert($calendarId, $event);
    $message = 'Event created: ' . $event->htmlLink;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
</head>
<body>
<div class="container">
    <h1>Create New Event</h1>
    <?php if (!empty($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form method="POST" action="create_event.php">
        <div class="form-group">
            <label for="summary">Event Summary</label>
            <input type="text" id="summary" name="summary" required>
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" id="location" name="location">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" id="start_date" name="start_date" required>
        </div>
        <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="time" id="start_time" name="start_time" required>
        </div>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" id="end_date" name="end_date" required>
        </div>
        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="time" id="end_time" name="end_time" required>
        </div>
        <button type="submit" class="button">Create Event</button>
    </form>
</div>
</body>
</html>
