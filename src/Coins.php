<?php
    class ChangeCalculator
    {
        function calculateChange($input, $coinageType)
        {
            $trimmed = ltrim($input,"$");
            $float = floatval($trimmed);
            $cents = $float * 100;
            $quarters = 0;
            $dimes = 0;
            $nickels = 0;
            $pennies = 0;
            if ($coinageType === "minimum coins") {
                while ($cents >= 25) {
                    $cents -= 25;
                    $quarters++;
                }
                while ($cents>= 10) {
                    $cents -= 10;
                    $dimes++;
                }
                while ($cents>= 5) {
                    $cents -= 5;
                    $nickels++;
                }
                while ($cents>= 1) {
                    $cents -= 1;
                    $pennies++;
                }
            } else if ($coinageType === "dimes") {
                    while ($cents>= 10) {
                        $cents -= 10;
                        $dimes++;
                    }
                    while ($cents>= 5) {
                        $cents -= 5;
                        $nickels++;
                    }
                    while ($cents>= 1) {
                        $cents -= 1;
                        $pennies++;
                    }
            } else if ($coinageType === "nickels") {
                while ($cents>= 5) {
                    $cents -= 5;
                    $nickels++;
                }
                while ($cents>= 1) {
                    $cents -= 1;
                    $pennies++;
                }
            } else if ($coinageType === "pennies") {
                while ($cents>= 1) {
                    $cents -= 1;
                    $pennies++;
                }
            }

            $coinage = " | ".$quarters." quarters | ".$dimes." dimes | ".$nickels." nickels | ".$pennies." pennies";
            return $coinage;
        }
    }
 ?>
