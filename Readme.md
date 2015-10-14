# Basic HTTP Silex demo

Is a minor silex application showcasing the of how to handle request and responses with an general error handler.

## Installation

    $ composer install

## Starting the server
    $ php -S 127.0.0.1:1337

## Issuing requests

Example are using [httpie](https://github.com/jkbrzt/httpie) for issuing requests. You can use curl if you remember its syntax for I cannot.

### Wrong method

    $ http GET 127.0.0.1:1337
    HTTP/1.1 405 Method Not Allowed
    Allow: POST
    Cache-Control: no-cache
    Connection: close
    Content-Type: application/json
    Date: Wed, 14 Oct 2015 15:25:41 GMT
    Host: 127.0.0.1:1337
    X-Powered-By: PHP/5.5.9-1ubuntu4.13

    {
        "message": "No route found for \"GET /\": Method Not Allowed (Allow: POST)"
    }

### Bad requests

    $ http POST 127.0.0.1:1337
    HTTP/1.1 400 Bad Request
    Cache-Control: no-cache
    Connection: close
    Content-Type: application/json
    Date: Wed, 14 Oct 2015 15:26:20 GMT
    Host: localhost:1337
    X-Powered-By: PHP/5.5.9-1ubuntu4.13

    {
        "message": "Data parameter required"
    }

### 200 OK

    $ http POST 127.0.0.1:1337 data="hello world" --form
    HTTP/1.1 200 OK
    Cache-Control: no-cache
    Connection: close
    Content-Type: application/json
    Date: Wed, 14 Oct 2015 15:24:59 GMT
    Host: localhost:1337
    X-Powered-By: PHP/5.5.9-1ubuntu4.13

    {
        "message": "hello world"
    }
