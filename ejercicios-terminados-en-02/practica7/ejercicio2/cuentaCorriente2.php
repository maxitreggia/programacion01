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
    private string $bankName;
    private string $customerFullName;
    private string $customerDni;
    private float $balance;
    private float $overdraftLimit;

    public function __construct(string $customerFullName, string $customerDni)
    {
        // Esto cumple la funcion del metodo "crear cuenta"
        $this->bankName = "Banco Corriente";
        $this->customerFullName = $customerFullName;
        $this->customerDni = $customerDni;
        $this->balance = 100;
        $this->overdraftLimit = -500;
    }

    public function showInformation():array
    {
        // Devolvemos un array para poder acceder a estos valores programaticamente. Dejamos a cargo del
        // consumidor del metodo imprimir la informacion en pantalla
        return [
            "bankName" => $this->bankName,
            "customerFullName" => $this->customerFullName,
            "customerDni" => $this->customerDni,
            "balance" => $this->balance,
            "overdraftLimit" => $this->overdraftLimit,
        ];
    }

    public function withdraw(float $amount):bool
    {
        if ($amount <= 0) {
            // aca normalmente lanzariamos una excepcion ya que retirar un valor negativo seria un error
            return false;
        }
        if ($amount > $this->balance + abs($this->overdraftLimit)) {
            return false;
        }
        $this->balance -= $amount;
        return true;
    }

    public function deposit(float $amount):void
    {
        if ($amount > 0) {
            $this->balance += $amount;
        }
    }

    public function setBankName(string $newBankName):void
    {
        $this->bankName = $newBankName;
    }
}