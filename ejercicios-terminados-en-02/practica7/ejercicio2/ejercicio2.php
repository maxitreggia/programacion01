<?php

require_once 'cuentaCorriente2.php';

$account = new CuentaCorriente("Maximiliano Treggia", "40891632");

echo "Se creó la cuenta corriente con éxito.<br>";

$withdrawAmount = 100;
if ($account->withdrawMoney($withdrawAmount)) {
    echo "Se retiraron $withdrawAmount pesos con éxito.<br>";
} else {
    echo "No se pudo retirar $withdrawAmount pesos. Saldo insuficiente.<br>";
}

$depositAmount = 200;
$account->depositMoney($depositAmount);

$infoAccount = $account->showInformation();
echo "Información de la cuenta corriente: <br>";
echo "Nombre del banco: {$infoAccount['Nombre del banco']} <br>";
echo "Nombre: {$infoAccount['Nombre']}<br>";
echo "D.N.I: {$infoAccount['D.N.I']}<br>";
echo "Saldo actual: {$infoAccount['Saldo inicial']} pesos <br>";
echo "Límite de descubierto: {$infoAccount['limite de descubierto']} pesos <br>";

$newBankName = "Banco Nación";
$account->modifyBankName($newBankName);

$infoAccount = $account->showInformation();
echo "Nombre del banco actualizado: {$infoAccount['Nombre del banco']}<br>";