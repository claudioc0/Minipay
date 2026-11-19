<?php
declare(strict_types=1);

namespace MiniPay;

final class Money {
    public function __construct(
        public readonly int $centavos,
    ) {}
}

