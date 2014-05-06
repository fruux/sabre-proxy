<?php

namespace Sabre\Proxy;

/**
 * This class is responsible for forking a php server deamon into a separate 
 * process, and placing it into the background.
 */
class ServerForker {

    function fork(array $arguments) {

        $pid = pcntl_fork();
        if ($pid) {
            // We are the parent
            return true;
        } else {
            // We are the child
            $path = '/usr/bin/env';
            array_unshift($arguments,'php');
            pcntl_exec($path, $arguments); 
        }
    
    }

    function wait() {

        pcntl_wait($status);

    }

}
