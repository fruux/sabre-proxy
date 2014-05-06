<?php

namespace Sabre\Proxy\Cli;

use Sabre\Proxy;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ProxyCommand extends Command {

    protected function configure() {

        $this->setName('proxy');
        $this->setDescription('Starts the debug proxy');
        $this->addOption('port', 'p', InputOption::VALUE_REQUIRED, "Tcp port", 8080);

    }

    protected function execute(InputInterface $input, OutputInterface $output) {

         $port = $input->getOption('port');
         $output->writeLn('<fg=green>sabre/proxy ' . Proxy\Version::VERSION . ' </fg=green>'); 
         $output->writeLn('<fg=green>Starting proxy server on port ' . $port . '</fg=green>'); 

         $serverForker = new Proxy\ServerForker();
         $serverForker->fork([
             '-S',
             '0.0.0.0:' . $port,
            __DIR__ . '/../../bin/router.php',
         ]);
         $output->writeLn('<fg=green>Waiting for server process to exit</fg=green>');
         $serverForker->wait();

    }

}
