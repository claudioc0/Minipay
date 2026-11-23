<?php
declare(strict_types=1);

namespace MiniPay;
use MiniPay\Exceptions\ValorNegativoException;

final class Money {
    public function __construct(
        public readonly int $centavos,
    ) {
        if ($this->centavos < 0) {
            throw new ValorNegativoException("O objeto Money não pode ser negativo. $this->centavos não é um valor válido.");
        }
    }

    public function somar(Money $outroValor): Money {
        return new self($this->centavos + $outroValor->centavos);
    }

    public function subtrair(Money $outroValor) :Money {
        $resultado = $this->centavos - $outroValor->centavos;

        return new self($resultado);
    }

    public function igualA(Money $outroValor): bool {
        return $this->centavos === $outroValor->centavos;
    }

    public function maiorQue(Money $outroValor): bool {
        return $this->centavos > $outroValor->centavos;
    }

    public static function somarValores(array $valores): Money {
        return array_reduce($valores, fn(self $acumulador, self $atual): self => $acumulador->somar($atual), new Money(0));
    }
}

