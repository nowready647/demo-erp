<?php

declare(strict_types=1);

namespace nowready\DemoErp\DI;

use nowready\DemoErp\Client;
use nowready\DemoErp\Exception\ConfigSettingsNeededException;
use Nette;
use Nette\DI\CompilerExtension;
use Nette\Schema\Expect;
use Nette\Schema\Schema;

final class DemoErpExtension extends CompilerExtension
{
    public function getConfigSchema(): Schema
    {
        return Expect::structure(items: [
            'erpEndpoint' => Expect::string(),
            'erpSecret' => Expect::string(),
            'erpVersion' => Expect::float(),
        ]);
    }

    public function loadConfiguration(): void
    {
        $config = $this->config;
        $builder = $this->getContainerBuilder();

        if (
            $config->erpEndpoint === null
            || $config->erpSecret === null
            || $config->erpVersion === null
        ) {
            throw new ConfigSettingsNeededException();
        }

        $builder->addDefinition($this->prefix('client'))
            ->setFactory(
                factory: Client::class,
                args: [
                    'erpEndpoint' => $config->erpEndpoint,
                    'erpSecret' => $config->erpSecret,
                    'erpVersion' => $config->erpVersion,
                ],
            );
    }
}
