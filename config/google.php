<?php

return [
    /*
    |----------------------------------------------------------------------------
    | Google application name
    |----------------------------------------------------------------------------
    */
    'application_name' => env('GOOGLE_APPLICATION_NAME', ''),

    /*
    |----------------------------------------------------------------------------
    | Google OAuth 2.0 access
    |----------------------------------------------------------------------------
    |
    | Keys for OAuth 2.0 access, see the API console at
    | https://developers.google.com/console
    |
    */
    'client_id' => env('GOOGLE_CLIENT_ID', '476522091204-a0hjap661h8odmhtk7jmprqfup037ofb.apps.googleusercontent.com'),
    'post_spreadsheet_id' => env('POST_SPREADSHEET_ID', null),
    'post_sheet_id' => env('POST_SHEET_ID', null),
    'client_secret' => env('GOOGLE_CLIENT_SECRET', 'k8ckbEn-s08XQBCTfzUdrpEa'),
    'redirect_uri' => env('GOOGLE_REDIRECT', ''),
    'scopes' => [
        \Google_Service_Sheets::DRIVE,
        \Google_Service_Sheets::SPREADSHEETS
    ],
    'access_type' => 'online',
    'approval_prompt' => 'auto',
    'prompt'           => 'consent', //"none", "consent", "select_account" default:none

    /*
    |----------------------------------------------------------------------------
    | Google developer key
    |----------------------------------------------------------------------------
    |
    | Simple API access key, also from the API console. Ensure you get
    | a Server key, and not a Browser key.
    |
    */
    'developer_key' => env('GOOGLE_DEVELOPER_KEY', 'AIzaSyDEL-2uKazHs_W8rQToBS5at8hkI2nVfpw'),

    /*
    |----------------------------------------------------------------------------
    | Google service account
    |----------------------------------------------------------------------------
    |
    | Set the credentials JSON's location to use assert credentials, otherwise
    | app engine or compute engine will be used.
    |
    */
    'service' => [
        /*
        | Enable service account auth or not.
        */
        'enable' => env('GOOGLE_SERVICE_ENABLED', true),

        /*
         * Path to service account json file. You can also pass the credentials as an array
         * instead of a file path.
         */
        'file' => storage_path('credentials.json'),
    ],

    /*
    |----------------------------------------------------------------------------
    | Additional config for the Google Client
    |----------------------------------------------------------------------------
    |
    | Set any additional config variables supported by the Google Client
    | Details can be found here:
    | https://github.com/google/google-api-php-client/blob/master/src/Google/Client.php
    |
    | NOTE: If client id is specified here, it will get over written by the one above.
    |
    */
    'config' => [],
];