<?php
declare(strict_types=1);

namespace MiniPay\Tests;

use PHPUnit\Framework\TestCase;
use MiniPay\Money;
use MiniPay\Exceptions\ValorNegativoException;
use TypeError;

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

    public function test_somar_valor_nao_money(): void {
        $primeiro_valor = new Money(150);
        $this->expectException(\TypeError::class);
        $primeiro_valor->somar(700);
    }

    public function test_subtrair_valores(): void {
        $valor1 = new Money(300);
        $valor2 = new Money(200);
        $resultado = $valor1->subtrair($valor2);
        $this->assertSame(100, $resultado->centavos);
    }

    public function test_subtrair_resultado_negativo(): void {
        $primeiroValor = new Money(300);
        $this->expectException(ValorNegativoException::class);
        $primeiroValor->subtrair(new Money(1000));
    }

    public function test_subtrair_resultado_zero(): void {
        $primeiroValor = new Money(300);
        $segundoValor = new Money(300);
        $resultado = $primeiroValor->subtrair($segundoValor);
        $this->assertSame(0, $resultado->centavos);
    }

    public function test_construtor_valor_negativo(): void {
        $this->expectException(ValorNegativoException::class);
        new Money(-5);
    }

    public function test_igual_a_valores_iguais(): void {
        $primeiroValorIgual = new Money(300);
        $segundoValorIgual = new Money(300);
        $resultado = $primeiroValorIgual->igualA($segundoValorIgual);
        $this->assertTrue($resultado);
    }

    public function test_igual_a_valores_diferentes(): void {
        $primeiroValorDiferente = new Money(200);
        $segundoValorDiferente = new Money(1000);
        $resultado = $primeiroValorDiferente->igualA($segundoValorDiferente);
        $this->assertFalse($resultado);
    }

    public function test_maior_que_valor_maior(): void {
        $valorMaior = new Money(650);
        $valorMenor = new Money(370);
        $resultado = $valorMaior->maiorQue($valorMenor);
        $this->assertTrue($resultado);
    }

    public function test_maior_que_valor_menor(): void {
        $valorMenor = new Money(650);
        $valorMaior = new Money(780);
        $resultado = $valorMenor->maiorQue($valorMaior);
        $this->assertFalse($resultado);
    }

    public function test_maior_que_valor_igual(): void {
        $primeiroValor = new Money(650);
        $segundoValor = new Money(650);
        $resultado = $primeiroValor->maiorQue($segundoValor);
        $this->assertFalse($resultado);
    }

    public function test_somar_valores_lista(): void {
        $resultado = Money::somarValores([new Money(100), new Money(250), new Money(50)])->centavos;
        $this->assertSame(400, $resultado);
    }

    public function test_somar_valores_lista_vazia(): void {
        $resultado = Money::somarValores([])->centavos;
        $this->assertSame(0, $resultado);
    }

    public function test_somar_valores_lista_nao_money(): void {
        $this->expectException(TypeError::class);
        Money::somarValores([100, 250, 50]);
    }
}