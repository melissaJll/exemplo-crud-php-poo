<?php
function formatarPreco( float $valor ):string {
    $valorFormatado = number_format($valor, 2, ",", ".");
    return "R$ " . $valorFormatado;
}

function calcularTotal(float $valor, int $qtd):string {
    $total = $valor * $qtd;
    return formatarPreco($total);
}