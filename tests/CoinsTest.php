<?php
    require_once "src/Coins.php";

    class ChangeCalculatorTest extends PHPUnit_Framework_TestCase
    {
        function test_display_amount()
        {
            //Arrange
            $test_ChangeCalculator = new ChangeCalculator;
            $input = "1.42";

            //Act
            $result = $test_ChangeCalculator->calculateChange($input);

            //Assert
            $this->assertEquals("$1.42", $result);
        }
    }
 ?>
