<?php
/**
 * List Events
 *
 * This file lists the upcoming events from the user's Google Calendar.
 */

require_once 'config.php';

$client = getClient();
$service = new Google_Service_Calendar($client);

$calendarId = 'primary';
$optParams = array(
    'maxResults' => 10,
    'orderBy' => 'startTime',
    'singleEvents' => true,
    'timeMin' => date('c'),
);

$results = $service->events->listEvents($calendarId, $optParams);
$events = $results->getItems();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Events</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="container">
    <h1>Upcoming Events</h1>
    <?php if (empty($events)): ?>
        <p>No upcoming events found.</p>
    <?php else: ?>
        <ul class="events-list">
            <?php foreach ($events as $event): ?>
                <li class="event-item">
                    <strong><?php echo $event->getSummary(); ?></strong><br>
                    <?php
                    $start = $event->start->dateTime;
                    if (empty($start)) {
                        $start = $event->start->date;
                    }
                    echo "<u>From:</u> ". date('l, F j, Y \a\t g:i A', strtotime($start)) . "<br/>";

                    $end = $event->end->dateTime;
                    if (empty($end)) {
                        $start = $event->end->date;
                    }
                    echo "<u>To:</u> ". date('l, F j, Y \a\t g:i A', strtotime($end)) . "<br/>";

                    ?>
                    <u>@ <?php echo $event->getLocation(); ?></u> <br>
                    <em> <?php echo $event->getDescription(); ?> </em>
                    <form action="delete_event.php" METHOD="POST">
                        <input type="hidden" name="event_id" value="<?php echo $event->getId(); ?>">
                        <input type="submit" class="remove-button" value="remove" onClick="return confirm('Are you sure?')">
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <a href="index.php" class="button">Back to Main Page</a>
</div>
</body>
</html>
