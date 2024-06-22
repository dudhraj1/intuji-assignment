<?php
/**
 * Disconnect Account
 *
 * This file disconnects the user's Google account by clearing the session.
 */

require_once 'config.php';

// Unset the access token and redirect to the main page
unset($_SESSION['access_token']);
header('Location: index.php');
