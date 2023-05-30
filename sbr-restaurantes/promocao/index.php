<?php
    include_once("../../objs/objetos.php");
    include_once("../../conexao.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION["restaurante"]->nome;?> - Promoção Limos</title>
</head>
<body>
    <?php include_once("../../avisos.php")?>
    <?php 
        $query = 'SELECT * FROM `ad` WHERE id_res = '.$_SESSION["restaurante"]->id.';';
        $result = mysqli_query($conexao, $query);
        $row = mysqli_num_rows($result);
        
        if($row >= 1){
            $ad_bd = mysqli_fetch_assoc($result);
            $ad = new ad($ad_bd["id_ad"], $ad_bd["id_res"], $ad_bd["data_inicio_ad"], $ad_bd["data_fim_ad"], $ad_bd["status_ad"], $ad_bd["status_pag_ad"]);
            $ad->id_res = $ad_bd["id_res"];
            if($ad->status_ad == 1){
                if($ad->atualizaAdBanco($conexao)){
                    if($ad->status_pag_ad == 2){
                        echo "<h2>Pagamento Pendente</h2>";
                        echo '<a href="pagar/index.php">Pagar</a>';
                    }else{
                        echo "<h1>Promoção Ativa<h1>";
                    }
                    echo "<h2>Data prevista de início da promoção</h2>";
                    echo "<p>".$ad->formata_data_ad(1)."</p>";
                    echo "<h2>Data finalização da promoção</h2>";
                    echo "<p>".$ad->formata_data_ad(2)."</p>";
                    echo "<br>";
                    echo '<a href="finalizar/index.php">Finalizar Promoção</a>';
                }else{
                    echo "<h1>Promoção Finalizada<h1>";
                    echo "<h2>Data de início da promoção</h2>";
                    echo "<p>".$ad->formata_data_ad(1)."</p>";
                    echo "<h2>Data de finalização da promoção</h2>";
                    echo "<p>".$ad->formata_data_ad(2)."</p>";
                    if($ad->valida_inicio_fim()){
                        echo '<a href="ativar/index.php">Ativar Promoção</a>';
                    }else{
                        echo '<a href="promover/promover.php">Criar nova Promoção</a>';
                    }
                }
            }else{
                echo "<h1>Promoção Finalizada<h1>";
                echo "<h2>Data de início da promoção</h2>";
                echo "<p>".$ad->formata_data_ad(1)."</p>";
                echo "<h2>Data de finalização da promoção</h2>";
                echo "<p>".$ad->formata_data_ad(2)."</p>";
                if($ad->valida_inicio_fim()){
                    echo '<a href="ativar/index.php">Ativar Promoção</a>';
                }else{
                    echo '<a href="promover/promover.php">Criar nova Promoção</a>';
                }
            }
        }else{
            echo "<h1>Promover restaurante</h1>";
            echo "<p>Seu restaurante não está sendo promovido no momento.</p>";
            echo '<a href="promover/promover.php">Iniciar uma nova promoção</a>';
        }
    ?>
</body>
</html>