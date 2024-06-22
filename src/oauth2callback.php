<?php
/**
 * OAuth2 Callback
 *
 * This file handles the OAuth2 callback from Google and stores the access token in the session.
 */

require_once 'config.php';

if (!isset($_GET['code'])) {
    // If no code is present, redirect to the Google OAuth2 authorization URL
    $auth_url = $client->createAuthUrl();
    header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
} else {
    // If a code is present, authenticate and store the token in the session
    $client->authenticate($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    header('Location: index.php');
}
