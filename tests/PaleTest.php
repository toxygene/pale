<?php
/**
 *
 */

use Pale\Pale;
use PHPUnit_Framework_TestCase as TestCase;

/**
 *
 */
class PaleTest extends TestCase
{

    public function testFunctionReturnIsReturned()
    {
        $this->assertEquals("test", Pale::run(function() {
            return "test";
        }));
    }

    public function testErrorsCauseAnErrorExceptionToBeThrown()
    {
        $this->setExpectedException("ErrorException");

        Pale::run(function() {
            trigger_error("asdf");
        });
    }

    public function testErrorHandlerIsRestored()
    {
        set_error_handler(function() { throw new Exception("external"); });

        try {
            Pale::run(function() {
                trigger_error("internal");
            });
            $this->fail();
        } catch (ErrorException $e) {
            $this->assertEquals("internal", $e->getMessage());
        }

        try {
            trigger_error("test");
            $this->fail();
        } catch (Exception $e) {
            $this->assertEquals("external", $e->getMessage());
        }
    }

}
