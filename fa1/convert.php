<html>
    <head>
        <title>
            Length Conversion
        </title>
    </head>
    <body>
        <h1>
            Measure Conversion Calculator
        </h1>
        <?php
            echo "[1] - Metric <br>
                  [2] - Imperial <br>
                  [3] - Metric to Imperial <br>
                  [4] - Imperial to Metric <br>";
            $conversionType = 3;
            echo "<br> Conversion type: $conversionType <br> <br>";

            switch($conversionType){
                case 1: goto Metric;
                        break;
                case 2: goto Imperial;
                        break;
                case 3: goto MtoI;
                        break;
                case 4: goto ItoM;
                        break;
                default: echo "Invalid conversion type <br>";
            }

            Metric:
                echo "[1] - centimeter to millimeter <br>
                      [2] - decimeter to centimeter <br>
                      [3] - meter to centimeter <br>
                      [4] - kilometer to meter <br> <br>";
                $metricType = 3;
                $num = 13;
                switch($metricType){
                    case 1: echo "$num cm = ".($num * 10)." mm <br><br><br>";
                            break;
                    case 2: echo "$num dm = ".($num * 10)." cm <br><br><br>";
                            break;
                    case 3: echo "$num m = ".($num * 100)." cm <br><br><br>";
                            break;  
                    case 4: echo "$num km = ".($num * 1000)." cm <br><br><br>";
                            break;
                    default: echo "Invalid conversion type <br><br><br>";
                             break;
                }
                goto end;            
            Imperial:
                echo "[1] - feet to inches <br>
                      [2] - yards to feet <br>
                      [3] - chains to yards <br>
                      [4] - furlongs to yards <br> 
                      [5] - miles to yards <br> <br>";
                $imperialType = 4;
                $num = 13;
                switch($imperialType){
                    case 1: echo "$num feet = ".($num * 12)." inches <br><br><br>";
                            break;
                    case 2: echo "$num yards = ".($num * 3)." feet <br><br><br>";
                            break;
                    case 3: echo "$num chains = ".($num * 22)." yards <br><br><br>";
                            break;  
                    case 4: echo "$num furlongs = ".($num * 220)." yards <br><br><br>";
                            break;
                    case 5: echo "$num miles = ".($num * 1760)." yards <br><br><br>";
                            break;
                    default: echo "Invalid conversion type <br><br><br>";
                             break;
                }
                goto end;
            MtoI:
                echo "[1] - millimeters to inches <br>
                      [2] - centimeters to inches <br>
                      [3] - meters to inches <br>
                      [4] - meters to feet <br> 
                      [5] - meters to yards <br>
                      [6] - kilometers to yards <br>
                      [7] - kilometers to miles <br> <br>";
                $mtoiType = 6;
                $num = 17;
                switch($mtoiType){
                        case 1: echo "$num millimeters = ".($num * 0.03937)." inches <br><br><br>";
                                break;
                        case 2: echo "$num centimeters = ".($num * 0.3937)." inches <br><br><br>";
                                break;
                        case 3: echo "$num meters = ".($num * 39.37008)." inches <br><br><br>";
                                break;
                        case 4: echo "$num meters = ".($num * 3.28084)." feet <br><br><br>";
                                break;
                        case 5: echo "$num meters = ".($num * 1.09361)." yards <br><br><br>";
                                break;
                        case 6: echo "$num kilometers = ".($num * 1093.6133)." yards <br><br><br>";
                                break;
                        case 7: echo "$num kilometers = ".($num * 0.62137)." miles <br><br><br>";
                                break;
                        default: echo "Invalid conversion type <br><br><br>";
                                break;
                }
                goto end;
            ItoM:
                echo "[1] - inches to centimeters <br>
                      [2] - feet to centimeters <br>
                      [3] - yards to centimeters <br>
                      [4] - yards to meters <br> 
                      [5] - miles to meters <br>
                      [6] - miles to kilometers <br> <br>";
                $itomType = 2;
                $num = 9;
                switch($itomType){
                        case 1: echo "$num inches = ".($num * 2.54)." centimeters <br><br><br>";
                                break;
                        case 2: echo "$num feet = ".($num * 30.48)." centimeters <br><br><br>";
                                break;
                        case 3: echo "$num yards = ".($num * 91.44)." centimeters <br><br><br>";
                                break;
                        case 4: echo "$num yards = ".($num * 00.9144)." meters <br><br><br>";
                                break;
                        case 5: echo "$num miles = ".($num * 1609.344)." meters <br><br><br>";
                                break;
                        case 6: echo "$num miles = ".($num * 1.609344)." kilometers <br><br><br>";
                                break;
                        default: echo "Invalid conversion type <br><br><br>";
                                break;
                }
                goto end;
            end:
                echo "End of Conversion <br>";
        ?>
    </body>
<html>