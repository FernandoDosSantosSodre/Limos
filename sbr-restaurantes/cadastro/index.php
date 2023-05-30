<?php
     session_start();
     include("../../conexao.php");
     include_once("../../objs/objetos.php");
     include ("../../layout/header.php");
     include ("../../layout/menu_login.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/boot.css">
    <link rel="stylesheet" href="../../css/cadastro_res/cadastrores.css">
    <title>Cadastro</title>
</head>
<body>
   
    <!-- FORM----------------------------------------------------------- -->
    <form class="form_cadastro" action="cadastrar.php" method="post" autocomplete="off">

        <div class="form_cadastro_content">

            <div class="form_cadastro_content_titulo">
                <h1>Informações Pessoais</h1>
            </div>

            <div class="form_cadastro_input_grupo">

                <div class="form_cadastro_input_box">
                    <input type="text" name="nome" id="nome" autofocus required>
                    <label for="nome">Nome</label>
                </div>

                <div class="form_cadastro_input_box">
                    <input type="email" name="email" id="email" required>
                    <label for="email">Email</label>

                </div>

                <div class="form_cadastro_input_box">
                    <input type="password" name="password" id="password" minlength="8" required>
                    <label for="password">Senha</label>

                </div>

                <div class="form_cadastro_input_box">
                    <input type="password" name="password-confirm" id="password-confirm" minlength="8" required>
                    <label for="password-confirm">Confirmar Senha</label>

                </div>
                <?php include("../../avisos.php");?>
                <input class="butao_proximo" type="submit" value="Prosseguir">

            </div>

        </div>

    </form>
    <!-- FIM FORM-------------------------------------------------------------- -->
   <?php require_once ("../../layout/footer.php"); ?>
</body>
</html>