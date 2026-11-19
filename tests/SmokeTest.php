<?php
declare(strict_types=1);

namespace MiniPay\Tests;

use PHPUnit\Framework\TestCase;

final class SmokeTest extends TestCase {
    public function test_soma_de_dois_numeros(): void {
        $this->assertSame(4, 2 + 2);
    }
}