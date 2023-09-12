<?php
//Diseñar la clase CuentaCorriente, sabiendo que los datos necesarios son: saldo,
//límite de descubierto, nombre y DNI del titular. Las operaciones típicas con una cuenta
//corriente son:
//Crear la cuenta: se necesita el nombre y DNI del titular. El saldo inicial será 100 y el
//límite de descubierto será de -500 pesos.
//Sacar dinero: solo se podrá sacar dinero hasta el límite de descubierto. El método
//debe indicar si ha sido posible llevar a cabo la operación.
//Ingresar dinero: se incrementa el saldo.
//Mostrar información: muestra la información disponible de la cuenta corriente.
//Todas las cuentas corrientes con las que se trabaja pertenecen al mismo banco.
//Añadir un atributo que almacene el nombre del banco (que es único) en la clase.
//Diseñar un método que permita modificar el nombre del banco.
//Escribir un programa que compruebe el funcionamiento de sus métodos, incluido el
//constructor.

require_once 'CuentaCorriente.php';

$account = new CuentaCorriente("Maximiliano Treggia", "40891632");

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