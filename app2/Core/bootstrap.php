<?php
declare(strict_types=1);

/**
 * Bootstrap da Aplicação - Configurações Essenciais
 */

// 1. Definição de Constantes
define('APP_ROOT', dirname(__DIR__, 2)); // /home/caliste/public_html
define('VIEW_PATH', APP_ROOT . '/app/Views');
define('PUBLIC_PATH', APP_ROOT . '/public');

// 2. Carregamento de Ambiente
if (file_exists(APP_ROOT . '/.env')) {
    $dotenv = parse_ini_file(APP_ROOT . '/.env');
    foreach ($dotenv as $key => $value) {
        putenv("$key=$value");
    }
} else {
    die('Arquivo .env não encontrado!');
}

// 3. Configuração de Erros
if (getenv('APP_ENV') === 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    ini_set('log_errors', '1');
    ini_set('error_log', APP_ROOT . '/logs/php_errors.log');
} else {
    error_reporting(0);
    ini_set('display_errors', '0');
}

// 4. Timezone e Localização
date_default_timezone_set('Europe/Lisbon');
setlocale(LC_TIME, 'pt_PT.utf8');

// 5. Autoload de Classes
spl_autoload_register(function ($class) {
    $file = APP_ROOT . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require $file;
    } else {
        error_log("Autoloader: Class $class not found in $file");
    }
});

// 6. Inicialização de Sessão
if (session_status() === PHP_SESSION_NONE) {
    session_start([
        'cookie_lifetime' => 86400, // 24 horas
        'cookie_secure'   => true,
        'cookie_httponly' => true
    ]);
}

// 7. Conexão com Banco de Dados
require APP_ROOT . '/app/Core/Database.php';

// 8. Helpers Globais
require APP_ROOT . '/app/Core/Helpers.php';