<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
// filepath: /public/index.php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../app/controllers/UsuarioController.php';

$controller = new UsuarioController($conn);
$controller->index();
