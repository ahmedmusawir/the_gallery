<?php
// phpinfo();

echo 'Hello text input ' . htmlspecialchars($_POST["param1"]) . '!';
echo 'Hello text area ' . htmlspecialchars($_POST["param2"]) . '!';

$answer1 = $_POST["param1"];
$answer2 = $_POST["param2"];

echo '<h1>'.$answer1.'</h1>';
echo '<h3>'.$answer2.'</h3>';

// $customer = $_POST["text_input"];
// $comment = $_POST["text_area"];
// $response = array('Name' => $customer , 'Comment' => $comment );

// echo "response at PHP" . $response;

// $fp = fopen('results.json', 'a');
// fwrite($fp, json_encode($response));
// fclose($fp);

echo "Json write successful!"; 


FB::log('Log message');
FB::info('Info message');
FB::warn('Warn message');
FB::error('Error message');

?> 