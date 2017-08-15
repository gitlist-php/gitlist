<?php

namespace GitList\Provider;

use GitList\Git\Client;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class GitServiceProvider implements ServiceProviderInterface
{

    /**
     * Register the Git\Client on the Application ServiceProvider
     *
     * @param  Pimple\Container $app
     * @return Git\Client  Instance of the Git\Client
     */
    public function register(Container $app)
    {
        $app['git'] = $app->factory(function () use ($app) {
            $options['path'] = $app['git.client'];
            $options['hidden'] = $app['git.hidden'];
            $options['projects'] = $app['git.projects'];
            $options['ini.file'] = $app['ini.file'];
            $options['default_branch'] = $app['git.default_branch'];
            $options['hide_unless_gitdaemon'] = $app['git.hide_unless_gitdaemon'];

            return new Client($options);
        });
    }
}
