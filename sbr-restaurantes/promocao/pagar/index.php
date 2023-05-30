<?php
    include_once("../../../objs/objetos.php");
    session_start();
    include_once("../../../conexao.php");

    $query = 'SELECT * FROM `ad` WHERE id_res = '.$_SESSION["restaurante"]->id.';';
    $result = mysqli_query($conexao, $query);
    $ad_bd = mysqli_fetch_assoc($result);
    $ad = new ad($ad_bd["id_ad"], $ad_bd["id_res"], $ad_bd["data_inicio_ad"], $ad_bd["data_fim_ad"], $ad_bd["status_ad"], $ad_bd["status_pag_ad"]);
    $ad->id_res = $ad_bd["id_res"];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento Promoção de Restaurante Limos</title>
</head>
<body>
    <?php include_once("../../../avisos.php");?>
    <form action="pagar.php" method="post">
        <input type="text" name="nome" id="nome" required autocomplete="off" <?php $_SESSION['admres']->nomeAdmRes()?>> Nome do Titular
        <br>
        <input type="text" name="cnpj" id="cnpj" required autocomplete="off" <?php $_SESSION['restaurante']->cnpj()?>> CPF/CNPJ
        <br>
        <input type="text" name="numero" id="numero" required autocomplete="off"> Número do Cartão
        <br>
        <input type="date" name="validade" id="validade" required> Validade
        <br>
        <input type="text" name="cvv" id="cvv" required autocomplete="off"> Código CVV
        <br>
        <select name="parcela" id="parcela" required>
            <option value="#" selected disabled>Parcelas</option>
            <option value="1"> 1x de <?php $ad->formataParcelaAd(1)?></option>
            <option value="2"> 2x de <?php $ad->formataParcelaAd(2)?></option>
            <option value="3"> 3x de <?php $ad->formataParcelaAd(3)?></option>
            <option value="4"> 4x de <?php $ad->formataParcelaAd(4)?></option>
            <option value="5"> 5x de <?php $ad->formataParcelaAd(5)?></option>
            <option value="6"> 6x de <?php $ad->formataParcelaAd(6)?></option>
            <option value="7"> 7x de <?php $ad->formataParcelaAd(7)?></option>
            <option value="8"> 8x de <?php $ad->formataParcelaAd(8)?></option>
            <option value="9"> 9x de <?php $ad->formataParcelaAd(9)?></option>
            <option value="10"> 10x de <?php $ad->formataParcelaAd(10)?></option>
            <option value="11"> 11x de <?php $ad->formataParcelaAd(11)?></option>
            <option value="12"> 12x de <?php $ad->formataParcelaAd(12)?></option>
        </select>
        <br>
        <button type="submit">Concluir Pagamento</button>
    </form>
</body>
</html>