# GrizzIT HTTP - Creating a request

A request is used by the application to let components know what
was requested. Creating a request is done by passing the variables
to the constructor. It is not possible to add or change it later on.
This is to make incoming requests immutable. Before the actual request
is created, a few other components need to be prepared.

## The URI

The URI is describing the target of the request. This can be created
through a factory based on a string:

```php
<?php

use GrizzIt\Http\Factory\UriFactory;

$uri = (new UriFactory())->createFromString('https://user:pass@grizz-it.com/index.php#place');
```

## The cookies

The cookies are loaded into a manager class. This class only expects an
array of cookies to be loaded.
```php
<?php

use GrizzIt\Http\Component\Cookie\CookieManager;

$cookieManager = new CookieManager($_COOKIE);
```

## Uploaded files

When a POST request with files is made to the script, the files should
be loaded into a separate manager. This manager simplifies working with
these files.
```php
<?php

use GrizzIt\Http\Component\File\UploadedFileManager;

$uploadedFiles = new UploadedFileManager($_FILES);
```

## The request

The request can now be created, using the previous examples and a few
additional variables:

```php
<?php

use GrizzIt\Http\Component\Request\Request;

$request = new Request(
    $uri,
    $cookieManager,
    $uploadedFiles,
    !empty($_POST) ? $_POST : file_get_contents('php://input'),
    $_SERVER['SERVER_PROTOCOL'],
    $_SERVER['REQUEST_METHOD'],
    getallheaders(),
    $_SERVER
);
```

The variables can then be fetched from the object and used in the application.

## Further reading

[Back to usage index](index.md)

[Creating a response](creating-a-response.md)