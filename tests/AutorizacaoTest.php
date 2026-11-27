<?php
declare(strict_types=1);

namespace MiniPay\Tests;

use PHPUnit\Framework\TestCase;
use MiniPay\Autorizacao;

final class AutorizacaoTest extends TestCase {
    public function test_autorizacao_fronteira(): void {
        $clock = new FixedClock(2800);
        $autorizacao = new Autorizacao(1000, $clock);
        $this->assertTrue($autorizacao->expirou());
    }

    public function test_autorizacao_valida(): void {
        $clock = new FixedClock(2799);
        $autorizacao = new Autorizacao(1000, $clock);
        $this->assertFalse($autorizacao->expirou());
    }

    public function test_autorizacao_expirada(): void {
        $clock = new FixedClock(2801);
        $autorizacao = new Autorizacao(1000, $clock);
        $this->assertTrue($autorizacao->expirou());
    }
}