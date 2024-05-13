<?php

class Database {
    private $hostname = "localhost";
    private $database = "tienda_online";
    private $username = "willi"; // Reemplaza 'tu_usuario' con el nombre de usuario específico
    private $password = ""; // Reemplaza 'tu_contraseña' con la contraseña del usuario específico
    private $charset = "utf8";

    public function conectar() {
        try {
            $conexion = 'mysql:host=' . $this->hostname . ';dbname=' . $this->database . ';charset=' . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $pdo = new PDO($conexion, $this->username, $this->password, $options);
            return $pdo;
        } catch(PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
            exit;
        }         
    }
}

?>


