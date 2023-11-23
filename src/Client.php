<?php

declare(strict_types=1);

namespace nowready\DemoErp;

final class Client
{
    public function __construct(
        private string $erpEndpoint,
        private string $erpSecret,
        private float $erpVersion
    ) {
    }

    public function callTest(): array
    {
        return [
            'endpoint' => $this->erpEndpoint,
            'secret' => $this->erpSecret,
            'version' => $this->erpVersion,
        ];
    }
}