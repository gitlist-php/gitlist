<?php

namespace GitList\Provider;

use GitList\Util\Routing;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class RoutingUtilServiceProvider implements ServiceProviderInterface
{
    /**
     * Register the Util\Repository class on the Application ServiceProvider
     *
     * @param Pimple\Container $app
     */
    public function register(Container $app)
    {
        $app['util.routing'] = function () use ($app) {
            return new Routing($app);
        };
    }
}
