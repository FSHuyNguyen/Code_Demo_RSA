<?php
function _encrypt($String)
{
    include 'Crypt/RSA.php';
    $rsa = new Crypt_RSA();
    extract($rsa->createKey());

    $plaintext = $String;

    // Mã hoá chuỗi plaintext
    $rsa->loadKey($privatekey);
    $ciphertext = $rsa->encrypt($plaintext);

    // trả về base64_encode($ciphertext);
    return array(
        'encode' => base64_encode($ciphertext),
        'private_key' => $privatekey,
        'public_key'  => $publickey,
    );
}
?>
