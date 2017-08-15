# GitList: an elegant git repository viewer

[![Travis](https://img.shields.io/travis/gitlist-php/gitlist/master.svg?style=flat-square)](https://travis-ci.org/gitlist-php/gitlist)
[![](https://img.shields.io/github/issues-raw/gitlist-php/gitlist.svg?style=flat-square)](https://github.com/gitlist-php/gitlist/issues)
[![](http://img.shields.io/badge/license-BSD_3--clause-blue.svg?style=flat-square)](LICENSE)

GitList is an elegant and modern web interface for interacting with multiple git repositories. It allows you to browse repositories using your favorite browser, viewing files under different revisions, commit history, diffs. It also generates RSS feeds for each repository, allowing you to stay up-to-date with the latest changes anytime, anywhere. GitList was written in PHP, on top of the [Silex](http://silex.sensiolabs.org/) microframework and powered by the Twig template engine. This means that GitList is easy to install and easy to customize. Also, the GitList gorgeous interface was made possible due to [Bootstrap](http://twitter.github.com/bootstrap/). 

## Features
* Multiple repository support
* Multiple branch support
* Multiple tag support
* Commit history, blame, diff
* RSS feeds
* Syntax highlighting
* Repository statistics

## Screenshots
[![](https://github.com/gitlist-php/gitlist/wiki/img/screenshots/1.jpg)](https://github.com/gitlist-php/gitlist/wiki/img/screenshots/1.jpg)
[![](https://github.com/gitlist-php/gitlist/wiki/img/screenshots/2.jpg)](https://github.com/gitlist-php/gitlist/wiki/img/screenshots/2.jpg)
[![](https://github.com/gitlist-php/gitlist/wiki/img/screenshots/3.jpg)](https://github.com/gitlist-php/gitlist/wiki/img/screenshots/3.jpg)
[![](https://github.com/gitlist-php/gitlist/wiki/img/screenshots/4.jpg)](https://github.com/gitlist-php/gitlist/wiki/img/screenshots/4.jpg)
[![](https://github.com/gitlist-php/gitlist/wiki/img/screenshots/5.jpg)](https://github.com/gitlist-php/gitlist/wiki/img/screenshots/5.jpg)

You can also see a live demo [here](http://gitlist-khornberg.rhcloud.com/).

## Requirements
In order to run GitList on your server, you'll need:

* git
* Apache with mod_rewrite enabled or nginx
* PHP 5.3.3

## Installation
* Download GitList from https://gitlist-php.github.io/gitlist/ and decompress to your `/var/www/gitlist` folder, or anywhere else you want to place GitList.
* Do not download a branch or tag from GitHub, unless you want to use the development version. The version available for download at the website already has all dependencies bundled, so you don't have to use composer or any other tool
* Rename the `config.ini-example` file to `config.ini`.
* Open up the `config.ini` and configure your installation. You'll have to provide where your repositories are located.
* In case GitList isn't accessed through the root of the website, open .htaccess and edit RewriteBase (for example, /gitlist/ if GitList is accessed through http://localhost/gitlist/).
* Create the cache folder and give read/write permissions to your web server user:

```
cd /var/www/gitlist
mkdir cache
chmod 777 cache
```

That's it, installation complete! If you're having problems, check the [Troubleshooting](https://github.com/gitlist-php/gitlist/wiki/Troubleshooting) page.


## Authors and contributors
* [Klaus Silveira](http://www.klaussilveira.com) (Creator, developer)

## License
[New BSD license](http://www.opensource.org/licenses/bsd-license.php)

## Todo
* improve the current test code coverage
* test the interface
* submodule support
* multilanguage support

## Development
GitList uses [Composer](http://getcomposer.org/) to manage dependencies and [Ant](http://ant.apache.org/) to build the project. In order to run all the targets in the build script, you will need [PHPUnit](http://www.phpunit.de/), [phpcpd](https://github.com/sebastianbergmann/phpcpd), [phploc](https://github.com/sebastianbergmann/phploc), [PHPMD](http://phpmd.org/) and [PHP_Depend](http://pdepend.org).

Once you have all the dependencies set, you can clone the repository and run Ant:

```
git clone https://github.com/gitlist-php/gitlist.git
ant
```

If you just want to get the project dependencies, instead of building everything:

```
git clone https://github.com/gitlist-php/gitlist.git
curl -s http://getcomposer.org/installer | php
php composer.phar install
```

If you have Composer in your path, things get easier. But you know the drill.

## Contributing
If you are a developer, we need your help. GitList is a young project and we have lots of stuff to do. Some developers are contributing with new features, others with bug fixes. But you can also dedicate yourself to refactoring the current codebase and improving what we already have. This is very important, we want GitList to be a state-of-the-art application, and we need your help for that.

* Stay tuned to possible bugs, suboptimal code, duplicated code, overcomplicated expressions and unused code with PHPMD in [our CI server](https://travis-ci.org/gitlist-php/gitlist)
* Try to fix any violations reported
* Improve the test coverage by creating unit and functional tests

## Further information
If you want to know more about customizing GitList, check the [Customization](https://github.com/gitlist-php/gitlist/wiki/Customizing) page on the wiki. Also, if you're having problems with GitList, check the [Troubleshooting](https://github.com/gitlist-php/gitlist/wiki/Troubleshooting) page. Don't forget to report issues and suggest new features! :)
