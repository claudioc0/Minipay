<?php
declare(strict_types=1);

namespace MiniPay\Tests;

use PHPUnit\Framework\TestCase;
use MiniPay\Money;

final class MoneyTest extends TestCase {
    public function test_guarda_valor_centavos(): void {
        $money = new Money(1050);
        $this->assertSame(1050, $money->centavos);
    }

    public function test_somar_valores(): void {
        $valor1 = new Money(150);
        $valor2 = new Money(700);
        $resultado = $valor1->somar($valor2);
        $this->assertSame(850, $resultado->centavos);
    }

    public function test_somar_valor_nao_Money(): void {
        $primeiro_valor = new Money(150);
        $this->expectException(\TypeError::class);
        $primeiro_valor->somar(700);
    }
}