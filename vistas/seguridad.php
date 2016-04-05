<?php
  if(defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
    echo "Wiii, tengo CRYPT_BLOWFISH!";
  }

function encriptar($password, $digito = 7) {
$set_salt = './1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
$salt = sprintf('$2a$%02d$', $digito);
for($i = 0; $i < 22; $i++)
{
	$salt .= $set_salt[mt_rand(0, 22)];
}
return crypt($password, $salt);
}

$clave='19700385jose';
echo "La clave original es: ", $clave;
$password = encriptar($clave);

echo "la clave encriptada es: ", $password;
echo "\n \n";
//echo "$2a$07$491/JIBD/F3A3F1BIJ6HHuLHxf5jNyW8c8WU1CANl4DU9REHiKZwK";


$passwordenBD = '$2a$07$A359.H9D00/CJ26B468J6.th.SSvzc0OcVttjxYXz56uO81EkkIKu';

if( crypt($clave, $passwordenBD) == $passwordenBD) {
	echo "\n\n Es igual:";

	echo "\n\n clave guardada: ",$passwordenBD;
	$ahora=crypt($clave, $passwordenBD);
	echo "\n\n clave introduc: ",$ahora ;
	echo "largo: ", strlen($ahora);
}
?>