Perfeito! Todos os arquivos existem. Agora vamos testar incluir um arquivo por vez para ver onde está o problema:

```php
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

echo "Testando includes...<br>";

try {
    echo "1. Incluindo JsonDatabase.php...<br>";
    require_once __DIR__ . '/core/JsonDatabase.php';
    echo "JsonDatabase.php incluído com sucesso!<br>";
    
    echo "2. Incluindo Session.php...<br>";
    require_once __DIR__ . '/core/Session.php';
    echo "Session.php incluído com sucesso!<br>";
    
    echo "3. Incluindo Router.php...<br>";
    require_once __DIR__ . '/core/Router.php';
    echo "Router.php incluído com sucesso!<br>";
    
    echo "4. Incluindo User.php...<br>";
    require_once __DIR__ . '/models/User.php';
    echo "User.php incluído com sucesso!<br>";
    
    echo "5. Incluindo Task.php...<br>";
    require_once __DIR__ . '/models/Task.php';
    echo "Task.php incluído com sucesso!<br>";
    
    echo "6. Incluindo BaseController.php...<br>";
    require_once __DIR__ . '/controllers/BaseController.php';
    echo "BaseController.php incluído com sucesso!<br>";
    
    echo "7. Incluindo AuthController.php...<br>";
    require_once __DIR__ . '/controllers/AuthController.php';
    echo "AuthController.php incluído com sucesso!<br>";
    
    echo "8. Incluindo DashboardController.php...<br>";
    require_once __DIR__ . '/controllers/DashboardController.php';
    echo "DashboardController.php incluído com sucesso!<br>";
    
    echo "9. Incluindo TaskController.php...<br>";
    require_once __DIR__ . '/controllers/TaskController.php';
    echo "TaskController.php incluído com sucesso!<br>";
    
    echo "<br>Todos os arquivos incluídos! Agora testando o Router...<br>";
    
    $router = new Router();
    echo "Router criado com sucesso!<br>";
    
    echo "Chamando handleRequest()...<br>";
    $router->handleRequest();
    
} catch (Exception $e) {
    echo "ERRO: " . $e->getMessage() . "<br>";
    echo "Arquivo: " . $e->getFile() . "<br>";
    echo "Linha: " . $e->getLine() . "<br>";
}
?>
```

Esse código vai mostrar exatamente onde o erro acontece. Execute e me diga em qual etapa para de funcionar ou que erro aparece.