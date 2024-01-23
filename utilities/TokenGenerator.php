<?php
require 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class TokenGenerator {
    private $secretKey = 'lively';

    public function generarToken($userId) {
        $tokenConfig = [
            "iat" => time(),
            "exp" => strtotime('+5 minutes'), // Token expira en 1 hora
            "userId"=>$userId
        ];

        return JWT::encode( $tokenConfig, $this->secretKey,'HS256');
    }

    public function verificarToken($tokenUsuario) {
        try {
            return JWT::decode($tokenUsuario, new Key($this->secretKey, 'HS256'));
        } catch (Exception $e) {
            return false;
        }
    }
}

?>