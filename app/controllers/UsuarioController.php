<?php
// filepath: app/controllers/UsuarioController.php

require_once __DIR__ . '/../models/Usuario.php';

class UsuarioController
{
    private $usuarioModel;

    public function __construct($conn)
    {
        $this->usuarioModel = new Usuario($conn);
    }

    public function index()
    {
        $usuarios = $this->usuarioModel->obtenerTodos();
        require __DIR__ . '/../views/usuarios/index.php';
    }

    public function create()
    {
        require __DIR__ . '/../views/usuarios/create.php';
    }

    public function store()
    {
        $nombre = $_POST['nombre'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $error = '';

        if (!$nombre || !$email || !$password) {
            $error = "Todos los campos son obligatorios.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "El email no es válido.";
        } elseif ($this->usuarioModel->emailExiste($email)) {
            $error = "El email ya está registrado.";
        }

        if ($error) {
            require __DIR__ . '/../views/usuarios/create.php';
        } else {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $this->usuarioModel->crear($nombre, $email, $passwordHash);
            header('Location: index.php');
            exit;
        }
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: index.php');
            exit;
        }
        $usuario = $this->usuarioModel->obtenerPorId($id);
        if (!$usuario) {
            header('Location: index.php');
            exit;
        }
        require __DIR__ . '/../views/usuarios/edit.php';
    }

    public function update()
    {
        $id = $_POST['id'] ?? null;
        $nombre = $_POST['nombre'] ?? '';
        $email = $_POST['email'] ?? '';
        $error = '';

        if (!$id || !$nombre || !$email) {
            $error = "Todos los campos son obligatorios.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "El email no es válido.";
        } elseif ($this->usuarioModel->emailExiste($email, $id)) {
            $error = "El email ya está registrado por otro usuario.";
        }

        if ($error) {
            $usuario = ['id' => $id, 'nombre' => $nombre, 'email' => $email];
            require __DIR__ . '/../views/usuarios/edit.php';
        } else {
            $this->usuarioModel->actualizar($id, $nombre, $email);
            header('Location: index.php');
            exit;
        }
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->usuarioModel->eliminar($id);
        }
        header('Location: index.php');
        exit;
    }
}
