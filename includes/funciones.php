<?php

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

function pagina_actual($path): bool {
    $actual = $_SERVER['PATH_INFO'] ?? '/';
    return $actual === $path;
}

function asegurarSesion() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

// Si esta autenticado el superAdmin
function is_superAdmin(): bool {
    asegurarSesion();
    return isset($_SESSION['sesion']) && $_SESSION['sesion'] == 1;
}

// Si esta autenticado el admin
function is_admin(): bool {
    asegurarSesion();
    return isset($_SESSION['sesion']) && $_SESSION['sesion'] == 2;
}

function getUserFolder($superAdmin, $admin) {
    if (is_superAdmin()) {
        return $superAdmin;
    }

    if (is_admin()) {
        return $admin;
    }

    header("Location: /login");
    exit;
}

function authorize(array $roles) {
    if (in_array('superAdmin', $roles) && is_superAdmin()) {
        return true;
    }

    if (in_array('admin', $roles) && is_admin()) {
        return true;
    }

    // Si está logueado pero no tiene permisos → redirige a su dashboard
    if (is_superAdmin()) {
        header("Location: /superAdmin/index");
        exit;
    }

    if (is_admin()) {
        header("Location: /admin/index");
        exit;
    }

    // Si no está logueado → login
    header("Location: /login");
    exit;
}