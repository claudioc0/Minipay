<?php
declare(strict_types=1);

namespace MiniPay;
use MiniPay\Exceptions\ValorNegativoException;

final class Money {
    public function __construct(
        public readonly int $centavos,
    ) {}

    public function somar(Money $outroValor): Money {
        return new self($this->centavos + $outroValor->centavos);
    }

    public function subtrair(Money $outroValor) :Money {
        $resultado = $this->centavos - $outroValor->centavos;
        if ($resultado < 0) {
            throw new ValorNegativoException("O resultado não pode ser negativo. $this->centavos menos $outroValor->centavos tem um resultado menor que 0");
        }

        return new self($resultado);
    }
}

