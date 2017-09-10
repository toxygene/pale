# Pale

Pale is a simple PHP >=5.6 library that allows a developer to easily convert errors to exceptions without having to worry about the details of changing and restoring error handlers.

## Usage
```php
use function Pale\run;

try {
    run(function() {
        trigger_error("this will become an exception");
    });
} catch(ErrorException $e) {
    var_dump($e);
}
```
