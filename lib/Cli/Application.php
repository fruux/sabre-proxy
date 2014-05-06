<?php

namespace Sabre\Proxy\Cli;

use Symfony\Component\Console;

class Application extends Console\Application {

    protected function getCommandName(Console\Input\InputInterface $input) {

        return 'proxy';

    }

    /**
     * Overridden so that the application doesn't expect the command
     * name to be the first argument.
     */
    public function getDefinition()
    {
        $inputDefinition = parent::getDefinition();
        // clear out the normal first argument, which is the command name
        $inputDefinition->setArguments();

        return $inputDefinition;
    }


    protected function getDefaultCommands() {

        $defaultCommands = parent::getDefaultCommands();
        $defaultCommands[] = new ProxyCommand;

        return $defaultCommands;

    }

}
