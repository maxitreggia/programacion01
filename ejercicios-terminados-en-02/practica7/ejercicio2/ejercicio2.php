<?php

require_once 'cuentaCorriente2.php';

$account = new CuentaCorriente("Maximiliano Treggia", "40891632");

echo "Se creó la cuenta corriente con éxito.<br>";

$withdrawAmount = 100;
if ($account->withdraw($withdrawAmount)) {
    echo "Se retiraron $withdrawAmount pesos con éxito.<br>";
} else {
    echo "No se pudo retirar $withdrawAmount pesos. Saldo insuficiente.<br>";
}

$depositAmount = 200;
$account->deposit($depositAmount);

$infoAccount = $account->showInformation();
echo "Información de la cuenta corriente: <br>";
echo "Nombre del banco: {$infoAccount['bankName']} <br>";
echo "Nombre: {$infoAccount['customerFullName']}<br>";
echo "D.N.I: {$infoAccount['customerDni']}<br>";
echo "Saldo actual: {$infoAccount['balance']} pesos <br>";
echo "Límite de descubierto: {$infoAccount['overdraftLimit']} pesos <br>";

$newBankName = "Banco Nación";
$account->setBankName($newBankName);

$infoAccount = $account->showInformation();
echo "Nombre del banco actualizado: {$infoAccount['bankName']}<br>";