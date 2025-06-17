# Soluções para Redirecionamento 404 em Sistemas PHP MVC

## O problema principal: redirect funciona, mas destino retorna 404

Quando um sistema PHP MVC redireciona com sucesso (código HTTP 302) mas a URL de destino `/dashboard` resulta em erro 404, isso indica um problema no **processamento da rota de destino**, não no redirecionamento em si. A URL resultante `/teste/Andre/Crud/auth/login` sugere que o sistema está interpretando incorretamente a estrutura da URL.

## Causas mais comuns e soluções práticas

### 1. Problemas no Router::handleRequest()

**Causa**: Parser de URL incorreto que não remove o base path adequadamente. [Stack Overflow](https://stackoverflow.com/questions/66872478/php-mvc-why-does-my-route-controller-give-404s-when-on-live-server?& strpos($uri, $this->basePath) === 0) {
            $uri = substr($uri, strlen($this->basePath));
        }
        
        return trim($uri, '/');
    }
    
    private function routeExists($uri) {
        // Verificar se rota está registrada
        return isset($this->routes[$uri]) || $this->findDynamicRoute($uri);
    }
}
```

### 2. Implementação correta do método redirect()

**Problemas comuns**: Headers já enviados, URLs mal formadas, ausência de exit(). [Tech Couch](https://www.tech-couch.com/post/php-output-buffering?& $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
            return "$protocol://{$_SERVER['HTTP_HOST']}$path";
        }
        
        // Caso contrário, relativa ao baseUrl
        return $this->baseUrl . '/' . ltrim($path, '/');
    }
    
    private function getBaseUrl() {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'];
        $path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
        return "$protocol://$host$path";
    }
    
    private function fallbackRedirect($url) {
        echo "<script>window.location.href='" . htmlspecialchars($url, ENT_QUOTES) . "';</script>";
        exit();
    }
}
```

### 3. Configuração correta do .htaccess

**Problema**: .htaccess mal configurado para subdiretórios. [Php +5](https://www.php.cn/faq/516151.html