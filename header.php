<?php
// setup.php - Execute uma vez para criar dados de exemplo
require_once 'core/JsonDatabase.php';

// Cabeçalho HTML
echo '<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurar Sistema - Cores Bradesco</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --bradesco-red: #CC092F;
            --bradesco-red-dark: #A91E1E;
            --bradesco-red-light: #E31E3F;
            --bradesco-gradient: linear-gradient(135deg, #CC092F 0%, #E31E3F 50%, #CC092F 100%);
            --bradesco-shadow: rgba(204, 9, 47, 0.3);
        }
        
        body {
            background: var(--bradesco-gradient);
            min-height: 100vh;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            position: relative;
        }
        
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 1000 1000\'><polygon fill=\'rgba(255,255,255,0.05)\' points=\'0,1000 1000,800 1000,1000\'/></svg>");
            background-size: cover;
        }
        
        .setup-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(15px);
            border-radius: 25px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 1;
        }
        
        .progress-step {
            transition: all 0.4s ease;
            position: relative;
            z-index: 1;
        }
        
        .progress-step.active {
            transform: scale(1.02);
        }
        
        .btn-bradesco {
            background: var(--bradesco-gradient);
            border: none;
            color: white;
            transition: all 0.3s ease;
            font-weight: 600;
            box-shadow: 0 4px 15px var(--bradesco-shadow);
        }
        
        .btn-bradesco:hover {
            background: linear-gradient(135deg, #A91E1E 0%, #CC092F 50%, #A91E1E 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px var(--bradesco-shadow);
        }
        
        .step-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin: 0 auto 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        
        .animate-check {
            animation: checkScale 0.6s ease-in-out;
        }
        
        @keyframes checkScale {
            0% { transform: scale(0) rotate(0deg); }
            50% { transform: scale(1.3) rotate(180deg); }
            100% { transform: scale(1) rotate(360deg); }
        }
        
        .alert-bradesco {
            background: linear-gradient(135deg, rgba(204, 9, 47, 0.1) 0%, rgba(227, 30, 63, 0.1) 100%);
            border: 2px solid var(--bradesco-red);
            color: var(--bradesco-red-dark);
        }
        
        .text-bradesco {
            color: var(--bradesco-red) !important;
        }
        
        .bg-bradesco {
            background: var(--bradesco-gradient) !important;
        }
        
        .pulse-bradesco {
            animation: pulse-bradesco 2s infinite;
        }
        
        @keyframes pulse-bradesco {
            0% { box-shadow: 0 0 0 0 var(--bradesco-shadow); }
            70% { box-shadow: 0 0 0 15px rgba(204, 9, 47, 0); }
            100% { box-shadow: 0 0 0 0 rgba(204, 9, 47, 0); }
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin: 20px 0;
        }
        
        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            border-color: var(--bradesco-red);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px var(--bradesco-shadow);
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-9">
                <div class="setup-card p-5">
                    <div class="text-center mb-5">
                        <i class="fas fa-shield-alt fa-5x text-bradesco mb-4"></i>
                        <h1 class="fw-bold text-dark mb-3">Sistema de Gerenciamento</h1>
                        <p class="text-muted fs-5">Inicializando banco de dados e criando estrutura do sistema</p>
                    </div>';

try {
    $db = new JsonDatabase();
    
    // Etapa 1: Criando diretório
    echo '<div class="progress-step active mb-4">
            <div class="step-icon bg-bradesco text-white">
                <i class="fas fa-database"></i>
            </div>
            <div class="alert alert-bradesco mb-0