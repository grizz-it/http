# GrizzIT HTTP - Creating a response

Responses are describing classes for formulating responses to requests.
All information is supplied in the constructor. The objects can be used
in applications to (through a standard) communicate the response.

## Creating a response

Creating a new response which responds with a JSON object can be seen in
the following snippet:
```php
<?php

use GrizzIt\Http\Component\Request\Response;

$response = new Response(
    ['foo' => 'bar'],
    ['Content-Type' => 'application/json']
);
```

A response with a redirect would be formulated as follows:

```php
<?php

use GrizzIt\Http\Component\Request\Response;

$response = new Response(
    '',
    ['Location' => 'https://www.grizz-it.com/'],
    302,
    'Moved Temporarily'
);
```

## Using the response

The previously formulated responses could be used within an application.
```php
<?php

header(sprintf(
    'HTTP/1.1 %d %s',
    $response->getStatusCode(),
    $response->getReasonPhrase()
));

foreach ($response->getHeaders() as $key => $value) {
    header(sprintf('%s: %s', $key, $value));
}

echo $response->getBody();
```

## Further reading

[Back to usage index](index.md)

[Creating a request](creating-a-request.md)