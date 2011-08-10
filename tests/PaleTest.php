<?php
/**
 *
 */

use Pale,
    PHPUnit_Framework_TestCase as TestCase;

/**
 *
 */
class PaleTest extends TestCase
{

    public function testFunctionReturnIsReturned()
    {
        $this->assertEquals("test", Pale\run(function() {
            return "test";
        }));
    }

    public function testErrorsCauseAnErrorExceptionToBeThrown()
    {
        $this->setExpectedException("ErrorException");

        Pale\run(function() {
            trigger_error("asdf");
        });
    }

}
