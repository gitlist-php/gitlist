<?php

namespace GitList\Provider;

use GitList\Util\Repository;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class RepositoryUtilServiceProvider implements ServiceProviderInterface
{
    /**
     * Register the Util\Repository class on the Application ServiceProvider
     *
     * @param Pimple\Container $app
     */
    public function register(Container $app)
    {
        $app['util.repository'] = function () use ($app) {
            return new Repository($app);
        };
    }
}
