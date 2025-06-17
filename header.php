protected function redirect($url) {
    if (ob_get_level()) {
        ob_end_clean();
    }
    
    // Se a URL começar com /, consideramos como rota do sistema
    if ($url[0] === '/') {
        $url = $this->basePath . $url;
    }
    
    if (!headers_sent()) {
        header("Location: {$url}");
        exit;
    } else {
        echo "<script>window.location.href = '{$url}';</script>";
        echo "<noscript><meta http-equiv='refresh' content='0;url={$url}'></noscript>";
        exit;
    }
}