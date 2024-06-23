# intuji-assignment

This project provides a simple interface to integrate with Google Calendar using core PHP. The features include listing
events, creating events, deleting events, connecting and disconnecting the user's Google account.

## Prerequisites

1. **Google Cloud Platform (GCP) Setup:**
    - Create a new project in GCP.
    - Enable the Google Calendar API for your project.
    - Create OAuth 2.0 credentials (Client ID and Client Secret).

2. **PHP Setup:**
    - Ensure PHP is installed on your server.
    - Install the Google API Client Library for PHP using Composer:
      ```sh
      composer require google/apiclient:^2.0
      ```

## Project Structure

- intuji-assignment/
- ├── src
- │ ├── config.php
- │ ├── oauth2callback.php
- │ ├── index.php
- │ ├── events.php
- │ ├── create_event.php
- │ ├── delete_event.php
- │ └── disconnect.php
- │ ├──css
- │     └── styles.css
- ├── vendor
- ├── composer.json
- └── README.md

## Configuration

1. **Clone the repository:**
   ```sh
   git clone https://github.com/dudhraj1/intuji-assignment.git
   cd intuji-assignment
   ```
2. **Install dependencies:**
   ```sh
    composer install
   ```
3. **Set up Google API credentials:**
   - Open src/config.php and replace 'YOUR_CLIENT_ID' and 'YOUR_CLIENT_SECRET' with your actual Google API client ID and
   client secret.
   
4. **Set the redirect URI:**
   - In src/config.php, set the redirect URI to match your server's configuration, e.g., http://your-domain.com/src/oauth2callback.php.
   
## Usage

1. **Starting the Server**
   - Ensure your PHP server is running and accessible at the domain or IP address configured in the project.
   
2. **Authorization**
   - Navigate to http://your-domain.com/src/index.php.
   - Click on "Connect" link.
   - You will be prompted to authorize the application to access your Google Calendar.
   - Once authorized, you will be redirected back to the main page.

3. **Features**
   - **Connect:** Click on the "Connect" link to Authorize the application to access your Google Calendar.
   - **List Events:** Click on the "List Events" link to view the upcoming events from your Google Calendar.
   - **Create Event:** Click on the "Create Event" link to add a new event to your Google Calendar.
   - **Remove Event:** You can remove the respective event by clicking on "Remove" button in the List Events page.
   - **Disconnect:** Click on the "Disconnect" link to revoke the application's access to your Google Calendar and clear the session.
   
## Code Overview

**Configuration (src/config.php)**
- This file initializes the Google Client and manages OAuth2 tokens.

**OAuth2 Callback (src/oauth2callback.php)**
- Handles the OAuth2 callback from Google and stores the access token in the session.

**Main Page (src/index.php)**
- Provides links to connect, list, create, and delete events, and disconnect the account.

**List Events (src/events.php)**
- Lists the upcoming events from the user's Google Calendar.

**Create Event (src/create_event.php)**
- Creates a new event in the user's Google Calendar.

**Delete Event (src/delete_event.php)**
- Deletes an event from the user's Google Calendar.

**Disconnect (src/disconnect.php)**
- Disconnects the user's Google account by clearing the session.

**Styles (src/css/styles.css)**
- Contains CSS for styling the web pages.