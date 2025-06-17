Agora entendi o problema! O erro "Not found" está acontecendo porque o **Router** está funcionando como um sistema de rotas, mas o **AuthController** está esperando arquivos físicos de view nas pastas `views/`.

O problema é uma **desconexão entre o sistema de rotas do Router e a estrutura de arquivos de view**.

## Aqui estão as correções necessárias:

### 1. Verificar se você executou o setup

Primeiro, acesse `/teste/Andre/Crud/setup.php` para criar os dados iniciais e verificar se tudo está funcionando.

### 2. O AuthController precisa renderizar a view corretamente

O problema está no método `render()` do `BaseController`. Ele está tentando incluir arquivos que podem não existir. Vamos corrigir:

**No `controllers/AuthController.php`, modifique o método `login()`:**

```php
public function login() {
    if (Session::isLoggedIn()) {
        $this->redirect('/dashboard');
        return;
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        
        if (empty($email) || empty($password)) {
            $error = 'Por favor, preencha todos os campos';
            $this->render('auth/login', compact('error'));
            return;
        }
        
        $user = $this->userModel->authenticate($email, $password);
        
        if ($user) {
            Session::set('user_id', $user['id']);
            Session::set('user_name', $user['name']);
            Session::set('user_role', $user['role']);
            $this->redirect('/dashboard');
            return;
        } else {
            $error = 'E-mail ou senha inválidos';
            $this->render('auth/login', compact('error'));
            return;
        }
    } else {
        $this->render('auth/login');
    }
}
```

### 3. Criar a estrutura básica de views

Você precisa criar estes arquivos:

**`views/layout/header.php`:**
```php
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema MVC</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
```

**`views/layout/footer.php`:**
```php
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
```

**`views/auth/login.php`:**
```php
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Login</h4>
                </div>
                <div class="card-body">
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                    <?php endif; ?>
                    
                    <form method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
```

**`views/dashboard/index.php`:**
```php
<div class="container mt-4">
    <h2>Dashboard</h2>
    <p>Bem-vindo, <?= htmlspecialchars(Session::get('user_name', 'Usuário')) ?>!</p>
    
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Gerenciar Usuários</h5>
                    <p>Administre os usuários do sistema</p>
                    <a href="<?= $basePath ?>/dashboard/users" class="btn btn-primary">Ver Usuários</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Tarefas Kanban</h5>
                    <p>Gerencie suas tarefas</p>
                    <a href="<?= $basePath ?>/tasks/kanban" class="btn btn-success">Ver Kanban</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="mt-3">
        <a href="<?= $basePath ?>/auth/logout" class="btn btn-danger">Logout</a>
    </div>
</div>
```

### 4. Passos para fazer funcionar:

1. **Execute o setup:** `/teste/Andre/Crud/setup.php`
2. **Crie os arquivos de view** listados acima
3. **Teste o login** com: 
   - Email: `admin@example.com`
   - Senha: `password`

### 5. Se ainda não funcionar, teste este código temporário

Substitua temporariamente o conteúdo do `controllers/AuthController.php` por este código simples:

```php
<?php
class AuthController extends BaseController {
    private $userModel;
    
    public function __construct() {
        parent::__construct();
        $this->userModel = new User();
    }
    
    public function login() {
        // Teste básico sem views
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            
            if ($email === 'admin@example.com' && $password === 'password') {
                Session::set('user_id', 1);
                Session::set('user_name', 'Admin');
                Session::set('user_role', 'admin');
                
                echo "Login bem-sucedido! <a href='{$this->basePath}/dashboard'>Ir para Dashboard</a>";
                return;
            } else {
                echo "Credenciais inválidas!";
            }
        }
        
        echo '<form method="POST">
                <input type="email" name="email" placeholder="admin@example.com" required><br><br>
                <input type="password" name="password" placeholder="password" required><br><br>
                <button type="submit">Login</button>
              </form>';
    }
    
    public function logout() {
        Session::destroy();
        $this->redirect('/auth/login');
    }
}
?>
```

Qual dessas opções você quer tentar primeiro? Execute o setup e me diga o que acontece!