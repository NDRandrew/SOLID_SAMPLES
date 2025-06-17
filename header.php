public static function requireLogin() {
    if (!self::isLoggedIn()) {
        if (ob_get_level()) {
            ob_end_clean();
        }
        
        $scriptName = $_SERVER['SCRIPT_NAME'];
        $basePath = str_replace('\\', '/', dirname($scriptName));
        if ($basePath === '/') {
            $basePath = '';
        } else {
            $basePath = rtrim($basePath, '/');
        }
        
        if (!headers_sent()) {
            // Corrigir para redirecionar para a rota ao invés da view
            header('Location: ' . $basePath . '/auth/login');
        } else {
            echo "<script>window.location.href = '" . $basePath . "/auth/login';</script>";
        }
        exit;
    }
}