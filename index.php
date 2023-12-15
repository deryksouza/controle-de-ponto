<?php
session_start();
date_default_timezone_set("America/Sao_Paulo");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Documentação de Ponto</title>
</head>

<body>
    
    <form class="telaPrincipal">
        <div class="tela_header">
        <img src="./img/logo3.png" class= "logo3" >
            <h2>Registrar Ponto</h2>
            <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
            <div class = "horas">
            <p id="horario"><?php echo date("d/m/Y H:i:s"); ?></p> </div>

            <a href="registrarPonto.php" target="_self">Registrar</a><br>

            <script>
                var apHorario = document.getElementById("horario");

                function atualizarHorario() {
                    var data = new Date().toLocaleString("pt-br", {
                        timeZone: "America/Sao_Paulo"
                    });

                    var formatarData = data.replace(",", "-");
                    apHorario.innerHTML = formatarData;
                }

                setInterval(atualizarHorario, 1000);

            </script>
        </div>
    </form>
</body>

</html>