<?php
/**
 *
 */

use Pale\Pale;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass Pale
 */
class PaleTest extends TestCase
{

    /**
     * @covers ::run
     */
    public function testFunctionReturnIsReturned()
    {
        $this->assertEquals("test", Pale::run(function() {
            return "test";
        }));
    }

    /**
     * @covers ::run
     * @expectedException \ErrorException
     */
    public function testErrorsCauseAnErrorExceptionToBeThrown()
    {
        Pale::run(function() {
            trigger_error("asdf");
        });
    }

    /**
     * @covers ::run
     */
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
