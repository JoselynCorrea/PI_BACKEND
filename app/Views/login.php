<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f7f7f7;
        }
        .login-card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
            padding: 20px;
            text-align: center;
        }
        .login-card h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }
        .login-card p {
            color: #e74c3c;
            font-size: 14px;
        }
        .login-card form {
            display: flex;
            flex-direction: column;
        }
        .login-card input {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .login-card button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        .login-card button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h1>Iniciar Sesión</h1>
        <?php if (session()->getFlashdata('error')): ?>
            <p><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>
        <form method="post" action="<?= base_url('login') ?>">

            <input type="text" name="username" placeholder="Correo" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
