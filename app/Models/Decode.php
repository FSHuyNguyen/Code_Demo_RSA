<?php
function _decrypt($String, $private_key)
{
    include 'Crypt/RSA.php';
    $rsa = new Crypt_RSA();
    $ciphertext = base64_decode($String);
    // Hàm giải mã chuỗi ciphertext vừa mã hoá từ $plaintext
    $rsa->loadKey($private_key);
    return $rsa->decrypt($ciphertext);
}
