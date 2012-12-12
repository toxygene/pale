# Pale

Pale is a simple PHP library that allows a developer to easily convert errors to exceptions without having to worry about the details of changing and restoring error handlers.

## Usage
```php
use Pale;
try {
    Pale\run(function() {
        trigger_error("this will become an exception");
    });
} catch(ErrorException $e) {
    var_dump($e);
}
```
