<?php
define('BASE_PATH', dirname(__DIR__));
define('DATA_PATH', BASE_PATH . '/data/');

function sanitize_output($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

function format_date($date) {
    return date('d/m/Y', strtotime($date));
}

function get_agendamentos() {
    $json = file_get_contents(DATA_PATH . 'agendamentos.json');
    return json_decode($json, true) ?? [];
}

function get_user_agendamentos($usuario_id) {
    $agendamentos = get_agendamentos();
    return array_filter($agendamentos, function($agendamento) use ($usuario_id) {
        return $agendamento['usuario_id'] == $usuario_id;
    });
}

function is_logged_in() {
    return isset($_SESSION['usuario_id']);
}

function get_current_user_name() {
    return $_SESSION['usuario_nome'] ?? '';
}
?>
