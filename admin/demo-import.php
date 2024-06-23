<?php

function ocdi_import_files_from_json_url() {
    // URL to JSON file
    $json_url = 'https://vasu-main-folder.s3.ap-south-1.amazonaws.com/Envato+Market/Nine+Theme/data.json';
  
    // Fetch JSON data from URL
    $response = wp_remote_get($json_url);
  
    // Check if the request was successful
    if (is_wp_error($response)) {
        // Handle error, e.g., log it or return a default value
        return [];
    }
  
    // Get the body of the response
    $json_data = wp_remote_retrieve_body($response);
  
    // Decode JSON data
    $import_data = json_decode($json_data, true);
  
    // Check if JSON decoding was successful
    if ($import_data === null) {
        // JSON decoding failed, handle error here
        return [];
    }
  
    // Return the imported data
    return $import_data;
  }
  
  add_filter('ocdi/import_files', 'ocdi_import_files_from_json_url');

