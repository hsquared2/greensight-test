<?php

header('Content-type: application/json');

$users = [
  [
    'email' => 'mark@meta.com',
    'id' => 1,
    'fullName' => 'Mark Zuckerberg',
  ],
  [
    'email' => 'edward@yandex.ru',
    'id' => 2,
    'fullName' => 'Edward Snowden',
  ],
  [
    'email' => 'steve@apple.com',
    'id' => 3,
    'fullName' => 'Steve Jobs',
  ],
];

$response = ['status' => '', 'message' => ''];
$file = fopen('log.txt', 'a');

if($_SERVER['REQUEST_METHOD'] === 'POST') {  
  foreach($_POST as &$val) {
    $val = htmlspecialchars($val);
  }

  fwrite($file, "Registration attempt:".date('Y-m-d H:i:s').':');

  if(!validatePassword($_POST)) {
    $response['message'] = 'Password fields should be filled and match';
    $response['status'] = 'error';
    fwrite($file, $response['message'].";\n");
    echo json_encode($response);
    exit();
  }
  
  if(!validateEmail($_POST)) {
    $response['message'] = 'Invalid email format';
    $response['status'] = 'error';
    fwrite($file, $response['message'].";\n");
    echo json_encode($response);
    exit();
  }

  foreach($users as $user) {
    if($user['email'] === $_POST['email']) {
      $response['status'] = 'error';
      $response['message'] = 'User with that email already exists';
      fwrite($file, $response['message'].";\n");
      echo json_encode($response);
      exit();
    }
  }

  $response['status'] = 'success';
  $response['message'] = 'Succesfully registered!';
  fwrite($file, $response['message'].";\n");
  
} else {
  $response['status'] = 'error';
  $repsonse['message'] = 'Invalid request method';
  fwrite($file, $response['message'].";\n");
}

fclose($file);
echo json_encode($response);



function validatePassword($arr) {
  if($arr['password'] && $arr['passwordRpt']) {
    return $arr['password'] === $arr['passwordRpt'];
  }
  return false;
}

function validateEmail($arr) {
  return isset($arr['email']) && str_contains($arr['email'], '@');
}

