<?php
require '../config/config.php';
session_start();

$datos = array(); // Inicializar $datos

if(isset($_POST['id']) && isset($_POST['token'])) { // Corregir asignación de $token

    $id = $_POST['id'];
    $token = $_POST['token']; // Asignar $token

    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

    if ($token === $token_tmp) { // Usar === para comparación estricta

        if(isset($_SESSION['carrito']['productos'][$id])){
            $_SESSION['carrito']['productos'][$id] += 1;
        }else{
            $_SESSION['carrito']['productos'][$id] = 1;
        }

        $datos['numero'] = count($_SESSION['carrito']['productos']);
        $datos['ok'] = true;
    } else {
        $datos['ok'] = false;
    }    
} else {
    $datos['ok'] = false;
}
echo json_encode($datos);
?>

