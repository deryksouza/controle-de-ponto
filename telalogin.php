<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="main-login">
        <div class="left-login">
            <h1>Controle de ponto</h1>
            <img src="./img/imglogin.svg" class="left-img" animacao="relogio animacao">
        </div>
        
        <div class="right-login">
            <div class="card-login">
                <h1>LOGIN</h1>
                <form action="verificar_login.php" method="post">
                    <div class="textfield">
                        <label for="usuario">Usuário</label>
                        <input type="text" name="usuario" placeholder="Usuário">
                    </div>
                    <div class="textfield">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" placeholder="Senha">
                    </div>
                    <button type="submit" class="btn-login">Login</button>
                </form>
                <div class="cadastro">Cadastre-se</div>

                <?php session_start();
    
                // Verifique mensagens de erro
                if (isset($_SESSION['msg'])) {
                    echo '<div class="error-msg">' . $_SESSION['msg'] . '</div>';
                    unset($_SESSION['msg']);
                }
                ?>
                

               
            </div>  
        </div>
    </div>
</body>
</html>
