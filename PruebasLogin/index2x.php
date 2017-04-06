<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        include 'mySQL.php';
        
        $databaseInfo = array(
        'hostname' => 'localhost', 
        'username' => 'juan_userone', 
        'password' => "Kmieds1305", 
        'name' => 'juan_miedsV3'
        );
        
        $tableName = "estacion_has_producto";
        
        $columnValues = array(
            "precio_estacion_has_producto",
            "",
            "estado_estacion_has_producto",
            '"D"'
        );
        
        $whereCriterion = array(
            "estacion_id_estacion",
            "",
            "producto_id_producto",
            ""
        );
        
        $mySQLQuery = new mySQL;
        
        for($i=5000; $i<5130; $i++){
            $whereCriterion[1] = (string)$i;
            $columnValues[1] = (string)rand(10900, 12100);
            $whereCriterion[3] = "200";
            $result1 = $mySQLQuery->updatemySQL($databaseInfo, $tableName, $columnValues, $whereCriterion);
            $columnValues[1] = (string)rand(7400, 8100);
            $whereCriterion[3] = "201";
            $result2 = $mySQLQuery->updatemySQL($databaseInfo, $tableName, $columnValues, $whereCriterion);
            $columnValues[1] = (string)rand(6800, 7300);
            $whereCriterion[3] = "202";
            $result3 = $mySQLQuery->updatemySQL($databaseInfo, $tableName, $columnValues, $whereCriterion);
            $columnValues[1] = (string)rand(4200, 4750);
            $whereCriterion[3] = "203";
            $result4 = $mySQLQuery->updatemySQL($databaseInfo, $tableName, $columnValues, $whereCriterion);
            echo "$result1 : $result2 : $result3 : $result4 <br>";
        }
        
        
      
        ?>
    </body>
</html>
