# MiniPay 
Projeto pessoal com intuito de estudar um mini gateway de pagamentos utilizando PHP e MySQL

## Status 
Em andamento

**O que já foi implementado:**
- Ambiente Docker para conteinerização dos serviços
- Money imutável em centavos
- Testes das classes e métodos já implementados

**O que está planejado:**
- Idempotência
- Transações e concorrência
- webhooks

## Stack
- PHP 8.3
- MySQL 8
- Docker Compose
- Composer
- PHPUnit

## Pré-requisitos
**Git e Docker (com Docker Compose)**

## Como rodar
- Clonar o Repositório e entrar na pasta
```bash 
git clone https://github.com/claudioc0/Minipay.git
cd Minipay
```

- Criar o arquivo .env 
```bash 
cp .env.example .env
```
- Ajuste os valores do arquivo criado com base no .env.example

- Construir as imagens e subir os contêineres 
```bash 
docker compose up -d --build
```
- Conferir se os dois contêineres estão de pé (opcional)
```bash 
docker compose ps
```

- Instalar as dependências PHP
```bash 
docker compose exec php composer install
```

- Rodar os testes com PHPUnit
```bash 
docker compose exec php ./vendor/bin/phpunit tests
```

## Decisões de Design
- Formato do dinheiro: o projeto armazena os valores monetários como inteiros em centavos, garantindo que não haja imprecisões de ponto flutuante (como 0.1 + 0.2 = 0.30000000000000004).
- Imutabilidade: Uso de `readonly` e `return new self(...)` evita problemas quando o mesmo objeto Money é compartilhado em outras partes do código.
- `declare(strict_types=1);`: a tipagem estrita bloqueia conversões de tipos implícitos do PHP, garantindo um `TypeError` caso um valor de tipo não aceito seja passado, antes que esse valor distorça cálculos do código. A única conversão ainda permitida é int -> float.
- Credenciais do PHP: Passar ao contêiner php apenas o usuário dedicado da aplicação via variáveis de ambiente, nunca MYSQL_ROOT_PASSWORD, aplica o princípio do menor privilégio.
