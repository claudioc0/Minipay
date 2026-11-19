<?php
declare(strict_types=1);

namespace MiniPay;

final class Money {
    public function __construct(
        public readonly int $centavos,
    ) {}

    public function somar(Money $outro_valor): Money {
        return new self($this->centavos + $outro_valor->centavos);
    }
}

