Vamos debugar passo a passo. O problema pode ser que os arquivos não existem ou há outros erros. Teste este código para diagnóstico:

```php
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

echo "Index iniciado!<br>";
echo "Diretório atual: " . __DIR__ . "<br><br>";

// Teste cada arquivo individualmente
$files = [
    'core/JsonDatabase.php',
    'core/Session.php', 
    'core/Router.php',
    'models/User.php',
    'models/Task.php',
    'controllers/BaseController.php',
    'controllers/AuthController.php',
    'controllers/DashboardController.php',
    'controllers/TaskController.php'
];

foreach($files as $file) {
    $fullPath = __DIR__ . '/' . $file;
    if(file_exists($fullPath)) {
        echo "✅ Arquivo existe: $file<br>";
    } else {
        echo "❌ Arquivo NÃO existe: $file<br>";
        echo "Caminho completo: $fullPath<br>";
    }
}

echo "<br>Fim do teste";
?>
```

Substitua temporariamente todo o conteúdo do `index.php` por esse código de teste. Ele vai:

1. Mostrar se há erros PHP
2. Mostrar o diretório atual 
3. Verificar se cada arquivo existe antes de tentar incluí-lo

Execute isso e me diga o que aparece na tela. Assim saberemos exatamente quais arquivos estão faltando e qual é o caminho real que está sendo usado.