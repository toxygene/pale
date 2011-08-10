<?php
/**
 *
 */

namespace Pale;

use ErrorException;

/**
 * Run a function and throw any errors as exceptions
 *
 * @param function $function
 * @return mixed
 */
function run($function)
{
    set_error_handler(function($errno, $errstr, $errfile, $errline) {
        throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
    });

    $result = $function();

    restore_error_handler();

    return $result;
}
