<?php
declare(strict_types=1);

namespace MiniPay;

final class SystemClock implements Clock {
    public function horaAtual(): int {
        return time();
    }
}