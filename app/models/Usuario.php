<?php
// filepath: app/models/Usuario.php

class Usuario
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function obtenerTodos()
    {
        $result = pg_query($this->conn, "SELECT * FROM usuarios ORDER BY id DESC");
        $usuarios = [];
        while ($row = pg_fetch_assoc($result)) {
            $usuarios[] = $row;
        }
        return $usuarios;
    }

    public function crear($nombre, $email, $passwordHash)
    {
        $query = "INSERT INTO usuarios (nombre, email, password) VALUES ($1, $2, $3)";
        return pg_query_params($this->conn, $query, [$nombre, $email, $passwordHash]);
    }

    public function obtenerPorId($id)
    {
        $query = "SELECT * FROM usuarios WHERE id = $1";
        $result = pg_query_params($this->conn, $query, [$id]);
        return pg_fetch_assoc($result);
    }

    public function actualizar($id, $nombre, $email)
    {
        $query = "UPDATE usuarios SET nombre = $1, email = $2 WHERE id = $3";
        return pg_query_params($this->conn, $query, [$nombre, $email, $id]);
    }

    public function eliminar($id)
    {
        $query = "DELETE FROM usuarios WHERE id = $1";
        return pg_query_params($this->conn, $query, [$id]);
    }

    public function emailExiste($email, $excluirId = null)
    {
        $query = "SELECT id FROM usuarios WHERE email = $1";
        $params = [$email];
        if ($excluirId) {
            $query .= " AND id != $2";
            $params[] = $excluirId;
        }
        $result = pg_query_params($this->conn, $query, $params);
        return pg_fetch_assoc($result) !== false;
    }
}
