# PHP ENV Library

This library is aimed to get data like environment variable from text file

## License

This package is Open Source According to [MIT license](LICENSE.md)

## Table Of Contents

* [Installion](#installion)
* [Using](#using)

## Installation

```php

composer require jijihohococo/php-env

```

## Using

Your text file format should like that

```txt

APP_NAME=test
DB_NAME=mysql

```

Firstly, you must declare your text file path

```php

use JiJiHoHoCoCo\PHPENV\ENV;

ENV::set('file_path');

```

And then you can get your data

```php

gete('APP_NAME');

```

You can also get from by using 'getenv' method (which is not recommend)

```php

getenv('APP_NAME');

```