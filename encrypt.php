<?php
$method = "AES-256-CBC";
$key = "THIS-IS-MY-SECRET-KEY";
$iv = "ANYINITIALISINGVALUE";
function encrypt($EMP_ID){
    $method = "AES-256-CBC";
    $key = "THIS-IS-MY-SECRET-KEY";
    $iv = "ANYINITIALISINGVALUE";
    return openssl_encrypt($EMP_ID, $method, $key, 0, $iv);
}
function decrypt($DATA){
    $method = "AES-256-CBC";
    $key = "THIS-IS-MY-SECRET-KEY";
    $iv = "ANYINITIALISINGVALUE";
    return openssl_decrypt($DATA, $method, $key, 0, $iv);
}
?>