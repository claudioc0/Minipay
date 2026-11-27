<?php
declare(strict_types=1);

namespace MiniPay;

interface Clock{
    public function horaAtual(): int;
}