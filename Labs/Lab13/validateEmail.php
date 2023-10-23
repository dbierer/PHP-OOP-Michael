<?php
function validateEmail($email) {
    // Regular expression pattern for a VALID email address
    $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
  
    if (preg_match($pattern, $email)) {
        return true;
    } else {
        return false; // Invalid email address
    }
}

$email = "mchang@holt.com";

if (validateEmail($email)) {
    echo "Valid email address: $email";
} else {
    echo "Invalid email address: $email";
}
