[![Build Status](https://travis-ci.org/MrJoshLab/laravel-terminal.svg)](https://packagist.org/packages/todocoding/laravel-terminal)
[![Latest Stable Version](https://poser.pugx.org/todocoding/laravel-terminal/v/stable)](https://packagist.org/packages/todocoding/laravel-terminal)
[![Total Downloads](https://poser.pugx.org/todocoding/laravel-terminal/downloads)](https://packagist.org/packages/todocoding/laravel-terminal)
[![Latest Unstable Version](https://poser.pugx.org/todocoding/laravel-terminal/v/unstable)](https://packagist.org/packages/todocoding/laravel-terminal)
[![License](https://poser.pugx.org/josh/laravel-terminal/license)](https://packagist.org/packages/todocoding/laravel-terminal)

# Laravel Terminal package
Run shell command easy in your laravel projects

**The package is in process.**


## Install

Via Composer

``` bash
$ composer require todocoding/laravel-terminal
```

## Config

Add the following provider to providers part of config/app.php
``` php
Todocoding\LaravelTerminal\TerminalServiceProvider::class
```

and then run
``` bash
php artisan vendor:publish --provider="Todocoding\LaravelTerminal\TerminalServiceProvider"
```
To generate the different files, which you will use
⇒ TerminalController.php
⇒ terminal/terminal.blade.php

To launch the terminal 
``` php
http://localhost/terminal
```

## Usage


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
