<?php
declare(strict_types=1);

namespace MiniPay\Tests;

use PHPUnit\Framework\TestCase;
use MiniPay\Money;

final class MoneyTest extends TestCase {
    public function guarda_valor_centavos(): void {
        $money = new Money(1050);
        $this->assertSame(1050, $money->centavos);
    }
}