<?php

// Specify the text file name
$filename = "marked-days.txt";

// Set JSON header
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // On GET, check file and return content
    if (!file_exists($filename)) {
        file_put_contents($filename, "");  // create empty file if not exists
    }
    $content = file_get_contents($filename);
    echo json_encode([
        "status" => "success",
        "message" => "File exists or was created",
        "content" => $content
    ]);
}

elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // On POST, update the file content

    // Get raw POST data (assuming JSON)
    $input = json_decode(file_get_contents('php://input'), true);

    // Process the received content
    switch ($input['action']) {
        case "unmark":
            deleteMarkedDay($input["content"], $filename);
            break;
        
        default:
            addMarkedDay($input['content'], $filename);
            break;
    }
}

// Create a function to add a new line
function addMarkedDay($markedDay, $filename) {
    
    // Read existing content (if file exists)
    $currentContent = "";
    if (file_exists($filename)) {
        $currentContent = file_get_contents($filename);
    }
    
    // Prepare the new line (with a trailing newline character)
    $newLine = (string) $markedDay . "\n";
    
    // Combine new line + existing content
    $newContent = (string) $newLine . $currentContent;
    
    // Write the new content back to the file
    file_put_contents($filename, $newContent);
}

// Create a function to delete a specific line
function deleteMarkedDay($demarkedDay, $filename) {

    // Check if there's a file before deleting anything
    if (file_exists($filename)) {
        // Read entire file into an array
        $lines = file($filename);
    
        // Track if deletion occurred
        $deleted = false;
    
        // Search for content line-by-line
        foreach ($lines as $index => $line) {
            if (trim($line) === $demarkedDay) {
                unset($lines[$index]);  // Delete line
                $deleted = true;
                break;  // Stop after first match
            }
        }
    
        // Write back if deletion occurred
        if ($deleted) {
            file_put_contents($filename, implode("", $lines));
        }
    } 
    
    // Create an empty file if it doesn't exist
    else {
        file_put_contents($filename, "");
    }
}
?>