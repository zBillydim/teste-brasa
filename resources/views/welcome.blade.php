<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
            position: relative;
        }

        .welcome-title {
            margin-bottom: 30px;
        }

        .btn-container {
            margin-bottom: 20px;
        }

        form {
            display: none;
        }

        form.active {
            display: block;
        }

        .form-control {
            border-radius: 5px;
            margin-bottom: 15px;
            padding: 10px;
            position: relative;
        }

        .btn-primary,
        .btn-success {
            border-radius: 5px;
            padding: 10px 20px;
            font-weight: bold;
            text-transform: uppercase;
            width: 150px;
        }

        .toggle-password {
            cursor: pointer;
            position: absolute;
            top: 30%;
            transform: translateY(-50%);
        }
    </style>
</head>
<body>

<div class="form-container">
    <div class="text-center welcome-title">
        <h1 style="color: #4CAF50;">Bem-vindo!</h1>
    </div>
    <div class="btn-container">
        <button onclick="toggleForm('loginForm')" class="btn btn-primary me-3">Login</button>
        <button onclick="toggleForm('registroForm')" class="btn btn-success">Registro</button>
    </div>
    
    <form method="POST" action="{{ route('login') }}" id="loginForm" class="active">
        @csrf
        <h2 class="mt-4 mb-3">Login</h2>
        <div class="mb-3">
            <input id="emailLogin" type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control" placeholder="E-mail">
        </div>
        <div class="mb-3">
            <input id="senhaLogin" type="password" name="senha" value="{{ old('senha') }}" required class="form-control" placeholder="Senha">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Entrar</button>
    </form>
    
    <form method="POST" action="{{ route('registro') }}" id="registroForm">
        @csrf
        <h2 class="mt-4 mb-3">Registro</h2>
        <div class="mb-3">
            <input id="nomeRegistro" type="text" name="nome" value="{{ old('nome') }}" required autofocus class="form-control" placeholder="Nome">
        </div>
        
        <div class="mb-3">
            <input id="emailRegistro" type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control" placeholder="E-mail">
        </div>
        <div class="mb-3" style="position: relative;">
            <input id="senhaRegistro" type="password" name="password" value="{{ old('password') }}" required autofocus class="form-control" placeholder="Senha">
            <span toggle="#senhaRegistro" class="toggle-password" onclick="togglePassword('senhaRegistro')">&#x1f441;</span>
        </div>
        <button type="submit" class="btn btn-success btn-block">Registrar</button>
    </form>
</div>

<script>
    function toggleForm(formId) {
        document.getElementById('loginForm').classList.remove('active');
        document.getElementById('registroForm').classList.remove('active');
        document.getElementById(formId).classList.add('active');
    }

    function togglePassword(fieldId) {
        const passwordField = document.getElementById(fieldId);
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
        } else {
            passwordField.type = 'password';
        }
    }
</script>
</body>
</html>
