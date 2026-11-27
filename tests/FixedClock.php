<?php
declare(strict_types=1);

namespace MiniPay\Tests;

use MiniPay\Clock;

final class FixedClock implements Clock {
    public function __construct(
        public readonly int $segundos,
    ){}
    public function horaAtual(): int {
        return $this->segundos;
    }
}