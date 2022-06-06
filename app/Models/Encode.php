<?php
function _encrypt($String)
{
    include 'Crypt/RSA.php';
    $rsa = new Crypt_RSA();
    extract($rsa->createKey());

    $plaintext = $String;

    // Mã hoá chuỗi plaintext
    $rsa->loadKey($publickey);
    $ciphertext = $rsa->encrypt($plaintext);

    return array(
        'encode' => base64_encode($ciphertext),
        'private_key' => $privatekey,
        'public_key'  => $publickey,
    );
}
?>
