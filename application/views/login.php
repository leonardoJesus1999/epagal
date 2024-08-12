<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!-- Incluir estilos CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

    <!-- Estilos CSS personalizados para el formulario de login -->
    <style>
    body {
        background: url('https://scontent.fuio35-1.fna.fbcdn.net/v/t39.30808-6/355689643_244258458316731_6563947367771122225_n.png?_nc_cat=103&ccb=1-7&_nc_sid=cc71e4&_nc_eui2=AeF48R3jlS2ojEIsH74BCpScCBsWMSCNCisIGxYxII0KK1uGguw1vgdLmj9t9N-rc00d9BPfFfLEq3c83tJ9oMCh&_nc_ohc=eGuYtLTTilUQ7kNvgE4EkEv&_nc_ht=scontent.fuio35-1.fna&oh=00_AYCNqbl6eLQ_DYocJ8nW46ahXE3WHFN6FTCrBr2eBppPJQ&oe=66B21CD9') no-repeat center center fixed;
        background-size: cover;
        margin: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-container {
        width: 100%;
        max-width: 900px;
        display: flex;
        flex-direction: column-reverse;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    @media (min-width: 768px) {
        .login-container {
            flex-direction: row;
        }
    }

    .login-container .login-form {
        width: 100%;
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    @media (min-width: 768px) {
        .login-container .login-form {
            width: 60%;
            padding: 40px;
        }
    }

    .login-container .login-form h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
        font-weight: normal; /* Reducir el grosor del texto */
        font-size: 24px; /* Tamaño del texto */
    }

    .login-container .login-form label {
        display: block;
        margin-bottom: 10px;
        color: #666;
        font-size: 16px; /* Tamaño del texto */
        font-weight: normal; /* Reducir el grosor del texto */
    }

    .login-container .login-form input[type="text"],
    .login-container .login-form input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 3px;
        font-size: 16px;
        font-weight: normal; /* Reducir el grosor del texto */
    }

    .login-container .login-form button[type="submit"] {
        width: 100%;
        padding: 12px;
        background-color: #007bff;
        border: none;
        color: #fff;
        cursor: pointer;
        border-radius: 3px;
        font-size: 18px;
        transition: background-color 0.3s;
        font-weight: normal; /* Reducir el grosor del texto */
    }

    .login-container .login-form button[type="submit"]:hover {
        background-color: #0056b3;
    }

    .login-container .login-form .error-message {
        color: #ff0000;
        margin-bottom: 10px;
        font-weight: normal; /* Reducir el grosor del texto */
    }

    .login-container .welcome-section {
        width: 100%;
        background: linear-gradient(45deg, #00c6ff, #0072ff);
        color: #fff;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 20px;
        text-align: center;
    }

    @media (min-width: 768px) {
        .login-container .welcome-section {
            width: 40%;
            padding: 50px;
        }
    }

    .login-container .welcome-section h2 {
        margin-bottom: 20px;
        font-weight: normal; /* Reducir el grosor del texto */
        font-size: 24px; /* Tamaño del texto */
    }

    .login-container .welcome-section button {
        padding: 12px 20px;
        background-color: #fff;
        border: none;
        color: #00c6ff;
        cursor: pointer;
        border-radius: 3px;
        font-size: 18px;
        transition: background-color 0.3s;
        font-weight: normal; /* Reducir el grosor del texto */
    }

    .login-container .welcome-section button:hover {
        background-color: #0072ff;
        color: #fff;
    }
    </style>
</head>

<body>
    <!-- Contenido principal -->
    <div class="login-container">
        <div class="login-form">
            <h2>Iniciar Sesión</h2>

            <?php echo form_open('login/procesar_login'); ?>
            <?php if (isset($error)): ?>
                <div class="error-message"><?php echo $error; ?></div>
            <?php endif; ?>

            <div>
                <label for="username">Email:</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div>
                <button type="submit">Iniciar Sesión</button>
            </div>

            <?php echo form_close(); ?>
        </div>

        <div class="welcome-section">
            <a>
                <img class="img-responsive rounded-circle"
                    src="<?php echo base_url('assets/images/layout_img/logo_epa.jpeg'); ?>" alt="imgen epagal" width="100px" />
            </a>
            <hr>
            <h2>Bienvenidos al</h2>
            <h2>Sistema de Epagal</h2>
        </div>
    </div>

    <!-- Scripts JS y otros elementos de tu plantilla -->
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
</body>

</html>
