<?php

declare(strict_types=1);

namespace OCA\Noxtr\AppInfo;

use OCP\AppFramework\App;
use OCA\Noxtr\DeclarativeSettings\NoxtrPersonalSettings;
use OCP\AppFramework\Bootstrap\IBootContext;
use OCP\AppFramework\Bootstrap\IBootstrap;
use OCP\AppFramework\Bootstrap\IRegistrationContext;

class Application extends App implements IBootstrap {
    public const APP_ID = 'noxtr';

    /** @psalm-suppress PossiblyUnusedMethod */
    public function __construct() {
        parent::__construct(self::APP_ID);
    }

    public function register(IRegistrationContext $context): void {
        $context->registerDeclarativeSettings(NoxtrPersonalSettings::class);
    }

    public function boot(IBootContext $context): void {
    }
}
