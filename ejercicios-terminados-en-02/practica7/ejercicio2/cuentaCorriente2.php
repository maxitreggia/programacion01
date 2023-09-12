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

class CuentaCorriente
{
    //propitiates
    private $nameOfBank;
    private $customerName;
    private $dniCustomer;
    private $balance;
    private $overdraftLimit;

    //methods
    public function __construct($customerName, $dniCustomer){
        $this->nameOfBank = "Banco Corriente";
        $this->customerName = $customerName;
        $this->dniCustomer = $dniCustomer;
        $this->balance = 100;
        $this->overdraftLimit = -500;
    }

    public function showInformation(){
        return [
            "Nombre del banco" => $this->nameOfBank,
            "Nombre" => $this->customerName,
            "D.N.I" => $this->dniCustomer,
            "Saldo inicial" => $this->balance,
            "limite de descubierto" => $this->overdraftLimit,
        ];
    }

    public function withdrawMoney ($amount){
        if($amount > $this->balance + $this->overdraftLimit) {
            return "La cantidad que intentas retirar excede tu saldo más tu límite de descubierto.";
        } else{
            $this->balance -= $amount;
            return $this->balance;
        }
    }

    public function depositMoney ($amount){
        if($amount > 0){
            $this->balance += $amount;
        }
    }

    public function modifyBankName ($newNameBank){
        $this->nameOfBank = $newNameBank;
    }
}