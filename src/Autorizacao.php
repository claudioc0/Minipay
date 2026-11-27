<?php
declare(strict_types=1);

namespace MiniPay;

final class Autorizacao {
    private const SEGUNDOS_LIMITE = 1800;

    public function __construct(
        private readonly int $horaAutorizacao,
        private readonly Clock $clock,
    ){}

    public function expirou(): bool{
        return $this->clock->horaAtual() - $this->horaAutorizacao >= self::SEGUNDOS_LIMITE;
    }
}