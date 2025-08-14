<?php

namespace OCA\Noxtr\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use OCA\Noxtr\Service\NIP65 as NIP65Service;

class NIP65 extends Command {

    public function __construct(
            private NIP65Service $nip65Service,
    ) {
        parent::__construct();
    }

    /**
     * @return void
     */
    protected function configure() {
        $this
                ->setName('noxtr:nip65')
                ->setDescription('Scan for Relay List Metadata')
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int {
        $this
                ->nip65Service
                ->findRelaysForUsers();
        $output->writeln('Done!');
        return 0;
    }
}
