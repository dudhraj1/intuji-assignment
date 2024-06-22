<?php
/**
 * Configuration for Google API Client
 *
 * This file initializes the Google Client and manages OAuth2 tokens.
 */

require_once __DIR__ . '/../vendor/autoload.php';

session_start();

$client = new Google_Client();
$client->setClientId('446170590311-lkp9vq4s6bumr65m4ah26ivhhbl5bd0v.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/intuji-assignment/src/oauth2callback.php');
$client->addScope(Google_Service_Calendar::CALENDAR);
$client->setAccessType('offline');
$client->setPrompt('consent');

/**
 * Get the authorized Google Client
 *
 * @return Google_Client The authorized client object
 */
function getClient() {
    global $client;

    if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
        $client->setAccessToken($_SESSION['access_token']);
    } else {
        header('Location: oauth2callback.php');
        exit;
    }

    if ($client->isAccessTokenExpired()) {
        $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        $_SESSION['access_token'] = $client->getAccessToken();
    }

    return $client;
}
