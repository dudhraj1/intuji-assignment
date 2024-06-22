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

if (empty($events)) {
    echo "No upcoming events found.";
} else {
    foreach ($events as $event) {
        $start = $event->start->dateTime;
        if (empty($start)) {
            $start = $event->start->date;
        }
        printf("%s (%s)\n", $event->getSummary(), $start);
    }
}
