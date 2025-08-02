# Tutorial PHP + PostgreSQL

Este es un proyecto de ejemplo para aprender a crear un CRUD de usuarios usando PHP puro, PostgreSQL y el patrón MVC simple. Incluye validaciones, estructura organizada y estilos con Bootstrap.

## Requisitos

- PHP 7.4 o superior
- PostgreSQL
- Composer
- Servidor web (Apache, Nginx, o el servidor embebido de PHP)

## Instalación

1. **Clona el repositorio o descarga los archivos.**

2. **Instala Composer si no lo tienes:**

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
php -r "unlink('composer-setup.php');"
sudo mv composer.phar /usr/local/bin/composer
```

3. **Instala las dependencias del proyecto:**

```bash
composer install
```

4. **Crea la base de datos y la tabla:**

```sql
CREATE DATABASE tutorial_db;
\c tutorial_db

CREATE TABLE usuarios (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);
```

5. **Configura las variables de entorno:**

Crea un archivo `.env` en la raíz del proyecto con el siguiente contenido (ajusta los valores según tu entorno):

```
DB_HOST=localhost
DB_NAME=tutorial_db
DB_USER=
DB_PASS=
```

6. **Inicia el servidor:**

Desde la carpeta `public` puedes correr:

```bash
php -S localhost:8000
```

Luego abre [http://localhost:8000](http://localhost:8000) en tu navegador.

## Estructura del proyecto

```
/app
    /controllers   # Lógica de negocio
    /models        # Acceso a datos
    /views         # Vistas HTML/PHP
/config
    db.php         # Conexión a la base de datos
/public
    index.php      # Entrada principal
    add.php        # Alta de usuario
    edit.php       # Edición de usuario
    delete.php     # Eliminación de usuario
    login.php      # Login de usuario
    logout.php     # Logout de usuario
    register.php   # Registro de usuario
.env               # Variables de entorno (NO subir a Git)
.gitignore         # Ignora archivos sensibles y dependencias
README.md
```

## Funcionalidades

- Registro de usuario
- Login y logout de usuario
- Listar usuarios
- Agregar usuario (con validación de email único)
- Editar usuario (con validación)
- Eliminar usuario
- Estilos modernos con Bootstrap

## Primeros pasos tras la instalacion

1. Accede a /register.php para crear tu primer usuario.
2. Inicia sesion en /login.php.
3. Ya puedes gestionar usuarios desde el panel principal.

## Mejoras sugeridas

- Autenticación de usuarios (login/logout)
- Paginación y búsqueda
- Exportar usuarios a CSV/PDF
- API RESTful

---

¡Este proyecto es ideal para aprender los conceptos básicos de
