<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mySQL
 *
 * @author Sergio
 */

include 'GeneralAssist.php';

class mySQL {
    
    function stringSQLConcatCriterion($criterion, $setOrWhere){
        
        $assistWork = new GeneralAssist;
        
        if(empty($criterion)){
            return -1;
        }else{
            if(count($criterion) > 2){
                if($assistWork->IsPrime(count($criterion))){
                    return -1;
                }else{
                    $indexSubArray = 0;
                    $numberOfObjectArray = count($criterion)/2;
                    for($i = 1; $i <= $numberOfObjectArray; $i++){
                        $sliceCurrentArray = array_slice($criterion, $indexSubArray, 2);
                        $sliceCurrentStringArray[] = implode(" = ", $sliceCurrentArray);
                        $indexSubArray += 2;
                    }
                    $stringSQLConcatCriterion = implode($setOrWhere, $sliceCurrentStringArray);
                }
            }else{
                foreach($criterion as $value){
                    $stringSQLConcatCriterionArray[] = $value;
                }
                $stringSQLConcatCriterion = implode(" = ", $stringSQLConcatCriterionArray);
            }
        }
        return $stringSQLConcatCriterion;
    }
    
    function selectmySQL($databaseInfo, $tableNames, $columnNames, $whereCriterions){
        
        $resultQuery = array();
        $columnString = implode(", ", $columnNames);
        $tableString = implode(", ", $tableNames);
        $assistWork = new GeneralAssist;

        $mysqli = new mysqli($databaseInfo['hostname'], $databaseInfo['username'], $databaseInfo['password'], $databaseInfo['name']);
        if ($mysqli === false){
            die ("ERROR: No se estableció la conexión. " . mysqli_connect_error());
        }
        
        $whereString = $this->stringSQLConcatCriterion($whereCriterions, " AND ");
        
        $sql = "SELECT $columnString  
        FROM $tableString 
        WHERE $whereString";
        
        if($result = $mysqli->query($sql)){
            if($result->num_rows > 0){
                $rowindex = 0;
                while($row = $result->fetch_array()) {
                    for($i = 0; $i <= mysqli_num_fields($result)-1; $i++){
                        $resultQuery[$rowindex][$i] = $row[$i];
                    }
                $rowindex++;    
                }
                $result->close();
            }else{
                $resultQuery = NULL;
            }
        }else{
            $resultQuery = -3;
        }
        $mysqli->close();
        return $resultQuery;
    }
    
    function updatemySQL($databaseInfo, $tableName, $columnValues, $whereCriterion){
        
        $mysqli = new mysqli($databaseInfo['hostname'], $databaseInfo['username'], $databaseInfo['password'], $databaseInfo['name']);
        if ($mysqli === false){
            die ("ERROR: No se estableció la conexión. " . mysqli_connect_error());
        }
          
        $columnString = $this->stringSQLConcatCriterion($columnValues, ", ");
        $whereString = $this->stringSQLConcatCriterion($whereCriterion, " AND ");
        
        $sql = "UPDATE $tableName
        SET $columnString
        WHERE $whereString";
        
        if($result = $mysqli->query($sql)){
            $mysqli->close();
            return true;
        }else{
            $mysqli->close();
            return false;
        }
    }
    
    function insertmySQL($databaseInfo, $tableName, $columnNames, $values){
        
        $mysqli = new mysqli($databaseInfo['hostname'], $databaseInfo['username'], $databaseInfo['password'], $databaseInfo['name']);
        if ($mysqli === false){
            die ("ERROR: No se estableció la conexión. " . mysqli_connect_error());
        }
          
        $columnString = implode(", ", $columnNames);
        $valueString = implode(", ", $values);
        
        $sql = "INSERT INTO $tableName ($columnString)
        VALUES ($valueString)";
        
        if($result = $mysqli->query($sql)){
            $mysqli->close();
            return true;
        }else{
            $mysqli->close();
            return false;
        }
    }
    
    function deletemySQL($databaseInfo, $tableName, $whereCriterions){
        
        $mysqli = new mysqli($databaseInfo['hostname'], $databaseInfo['username'], $databaseInfo['password'], $databaseInfo['name']);
        if ($mysqli === false){
            die ("ERROR: No se estableció la conexión. " . mysqli_connect_error());
        }
        
        $whereString = $this->stringSQLConcatCriterion($whereCriterions, " AND ");
        
        $sql = "DELETE FROM $tableName
        WHERE $whereString";
        
        if($result = $mysqli->query($sql)){
            $mysqli->close();
            return true;
        }else{
            $mysqli->close();
            return false;
        }
    }
    
}
