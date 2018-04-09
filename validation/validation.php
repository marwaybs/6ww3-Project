<?php
function validateEmail($email) {
    $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/'; return (preg_match($pattern, $email) === 1);
}

function validateAlphabetic($text){
  return htmlspecialchars($text);
}

function validateDate($date){
  $dateArray = explode('/', $date);
  return checkDate((int)$dateArray[0], (int)$dateArray[1], (int)$dateArray[2]);
}

function validateNumeric($number){
  return is_numeric($number);
}
?>
