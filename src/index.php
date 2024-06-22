<?php
/**
 * Main Page
 *
 * This is the main page that provides links to list, create, and delete events, and disconnect the account.
 */

require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Calendar Integration</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="container">
    <h1>Google Calendar Integration</h1>
    <div class="menu">
        <a href="events.php" class="button">List Events</a>
        <a href="create_event.php" class="button">Create Event</a>
        <a href="disconnect.php" class="button">Disconnect</a>
    </div>
</div>
</body>
</html>
