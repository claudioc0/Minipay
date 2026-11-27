<?php
declare(strict_types=1);

namespace MiniPay\Tests;

use PHPUnit\Framework\TestCase;
use MiniPay\SystemClock;

final class SystemClockTest extends TestCase{
    public function test_horas_relogio(): void {
        $clock = new SystemClock();
        $relogioAntes = time();
        $horaRelogio = $clock->horaAtual();
        $relogioDepois = time();
        $this->assertGreaterThanOrEqual($relogioAntes, $horaRelogio);
        $this->assertLessThanOrEqual($relogioDepois, $horaRelogio);
    }
}