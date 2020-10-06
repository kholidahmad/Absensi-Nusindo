<?php

  function createUserCode(){
    $data = '1234567890abcdefghijklmnopqrstuvwxyz';
    $string = '';
    for($i = 0; $i < 8; $i++) {
        $pos = rand(0, strlen($data)-1);
        $string .= $data{$pos};
    }
    return 'u_'.$string;
  }

  function createPassword(){
    $data = '1234567890abcdefghijklmnopqrstuvwxyz';
    $string = '';
    for($i = 0; $i < 8; $i++) {
        $pos = rand(0, strlen($data)-1);
        $string .= $data{$pos};
    }
    return $string;
  }

  function createKodeIzin(){
    $data = '1234567890abcdefghijklmnopqrstuvwxyz';
    $string = '';
    for($i = 0; $i < 8; $i++) {
        $pos = rand(0, strlen($data)-1);
        $string .= $data{$pos};
    }
    return $string;
  }

?>