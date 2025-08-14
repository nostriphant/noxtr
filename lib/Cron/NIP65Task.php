<?php

namespace OCA\Noxtr\Cron;

use OCA\Noxtr\Service\NIP65;
use OCP\BackgroundJob\TimedJob;
use OCP\AppFramework\Utility\ITimeFactory;

class NIP65Task extends TimedJob {

    public function __construct(ITimeFactory $time, private NIP65 $service) {
        parent::__construct($time);
        $this->setInterval(30);
    }

    protected function run($arguments) {
        $this->service->findRelaysForUsers();
    }
}
