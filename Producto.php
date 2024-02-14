<?php

class Producto {

    // Attributes
    private $producto = 0;
    private $ganancia = 0;
    private $precio_venta;

    // Constructor
    function __construct($ganancia, $producto) {
        $this->ganancia = $ganancia / 100;
        $this->producto = $producto;
    }

    // Setters & Getters
    function setGanancia($ganancia) {
        $this->ganancia = $ganancia / 100;
    }

    function setProducto($producto) {
        $this->producto = $producto;
    }

    function getPrecioVenta() {
        return $this->precio_venta;
    }

    // Methods
    function precioFinal() {
        $this->precio_venta = $this->producto * (1 + $this->ganancia);
    }

    function calcularCosto() {
        switch ($this->producto) {
            case 1:$this->producto = 50;
                break; //short

            case 2:$this->producto = 100;
                break; //camisa

            case 3:$this->producto = 200;
                break; //jean

            case 4:$this->producto = 35;
                break; //polo

            default:$this->producto = 0;
                break;
        }
        $this->precioFinal();
    }
}
