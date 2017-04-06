<?php

include_once 'mySQL.php';

class Station {    
    
    const TABLE = "estacion";
    const COLUMN_ID = "id_estacion";
    const COLUMN_STATIONLATITUDE = "latitud_estacion";
    const COLUMN_STATIONLONGITUDE = "longitud_estacion";
    const COLUMN_STATIONNAME = "nombre_estacion";
    const COLUMN_STATIONDESCRIPTION = "descripcion_estacion";
    const COLUMN_STATIONTYPE = "tipo_estacion";
    const COLUMN_STATIONLANDLINE = "tel_fijo_estacion";
    const COLUMN_STATIONMOBILE = "tel_movil_estacion";
    const COLUMN_STATIONADDRESS = "direccion_estacion";
    const COLUMN_STATIONEMAIL = "correo_estacion";
    const COLUMN_STATIONPAY = "pago_estacion";
    const COLUMN_STATIONSTATE = "estado_estacion";
    const COLUMN_STATIONDATETIME = "fecha_registro_estacion";
    const COLUMN_STATIONSUPPLIERID = "mayorista_id_mayorista";
    const COLUMN_STATIONREGIONID = "departamento_id_departamento";
    const COLUMN_STATIONBRANCHID = "sucursal_id_sucursal";
    const COLUMN_STATIONTRADEGROUP ="sucursal_gremio_id_gremio";
    const COLUMN_STATIONUSERID = "usuario_id_usuario";
    
    private $databaseInfo = array();
    
    private $stationTable = array(
        self::COLUMN_ID => '',
        self::COLUMN_STATIONLATITUDE => '',
        self::COLUMN_STATIONLONGITUDE => '',
        self::COLUMN_STATIONNAME => '',
        self::COLUMN_STATIONDESCRIPTION => '',
        self::COLUMN_STATIONTYPE => '',
        self::COLUMN_STATIONLANDLINE => '',
        self::COLUMN_STATIONMOBILE => '',
        self::COLUMN_STATIONADDRESS => '',
        self::COLUMN_STATIONEMAIL => '',
        self::COLUMN_STATIONPAY => '',
        self::COLUMN_STATIONSTATE => '',
        self::COLUMN_STATIONDATETIME => '',
        self::COLUMN_STATIONSUPPLIERID => '',
        self::COLUMN_STATIONREGIONID => '',
        self::COLUMN_STATIONBRANCHID => '',
        self::COLUMN_STATIONTRADEGROUP => '',
        self::COLUMN_STATIONUSERID => ''
    );
    
    private $whereCriterion = array(
        self::COLUMN_ID,
        ''
    );
    
    function __construct($databaseInfo, $id) {
        
        $this->databaseInfo = $databaseInfo;
        $this->whereCriterion[1] = $id;
       
        $tableNames = array(self::TABLE);
        $columnNames = array("*");
        
        $databaseManager = new mySQL;
        
        $resultQuery = $databaseManager->selectmySQL($this->databaseInfo, $tableNames, $columnNames, $this->whereCriterion);
        
        $this->setData($resultQuery);
           
    }
    
    function setData($resultArrayQuery){
        
        foreach ($resultArrayQuery as $row) {
            $indexColumn = 0;
            foreach ($row as $column) {
                if($indexColumn == 0){
                    $this->stationTable[self::COLUMN_ID] = $column;
                }
                if($indexColumn == 1){
                    $this->stationTable[self::COLUMN_STATIONLATITUDE] = $column;
                }
                if($indexColumn == 2){
                    $this->stationTable[self::COLUMN_STATIONLONGITUDE] = $column;
                }
                if($indexColumn == 3){
                    $this->stationTable[self::COLUMN_STATIONNAME] = $column;
                }
                if($indexColumn == 4){
                    $this->stationTable[self::COLUMN_STATIONDESCRIPTION] = $column;
                }
                if($indexColumn == 5){
                    $this->stationTable[self::COLUMN_STATIONTYPE] = $column;
                }
                if($indexColumn == 6){
                    $this->stationTable[self::COLUMN_STATIONLANDLINE] = $column;
                }
                if($indexColumn == 7){
                    $this->stationTable[self::COLUMN_STATIONMOBILE] = $column;
                }
                if($indexColumn == 8){
                    $this->stationTable[self::COLUMN_STATIONADDRESS] = $column;
                }
                if($indexColumn == 9){
                    $this->stationTable[self::COLUMN_STATIONEMAIL] = $column;
                }
                if($indexColumn == 10){
                    $this->stationTable[self::COLUMN_STATIONPAY] = $column;
                }
                if($indexColumn == 11){
                    $this->stationTable[self::COLUMN_STATIONSTATE] = $column;
                }
                if($indexColumn == 12){
                    $this->stationTable[self::COLUMN_STATIONDATETIME] = $column;
                }
                if($indexColumn == 13){
                    $this->stationTable[self::COLUMN_STATIONSUPPLIERID] = $column;
                }
                if($indexColumn == 14){
                    $this->stationTable[self::COLUMN_STATIONREGIONID] = $column;
                }
                if($indexColumn == 15){
                    $this->stationTable[self::COLUMN_STATIONBRANCHID] = $column;
                }
                if($indexColumn == 16){
                    $this->stationTable[self::COLUMN_STATIONTRADEGROUP] = $column;
                }
                if($indexColumn == 17){
                    $this->stationTable[self::COLUMN_STATIONUSERID] = $column;
                }
                $indexColumn++;
            }
        }
        
    }
            
    function updateData($columnValue, $columnName) {
     
        $databaseManager = new mySQL;
        
        $columnValues = array();
        
        if($columnValue == "NULL"){
            $columnValues = array(
                $columnName,
                $columnValue
            );   
        } else {
            $columnValues = array(
                $columnName,
                '"'.$columnValue.'"'
            );
        }
        
        $resultQuery = $databaseManager->updatemySQL($this->databaseInfo, self::TABLE, $columnValues, $this->whereCriterion);
        
        if($resultQuery){
            $this->stationTable[$columnName] = $columnValue;
            return true;
        }else{
            return false;
        } 
    }
    
    function selectData($columnName){
      
      $databaseManager = new mySQL;  
      
      $columns = array($columnName);
      $tableName = array(self::TABLE);
      $result = $databaseManager->selectmySQL($this->databaseInfo, $tableName, $columns, $this->whereCriterion);
      return $result;  
    }
    
    function getStationTable() {
        return $this->stationTable;
    }
    
    function getStationId() {
        
        $this->stationTable[self::COLUMN_ID] = $this->selectData(self::COLUMN_ID);
        return $this->stationTable[self::COLUMN_ID];
    }
   
    function getStationLatitude() {
        
        $this->stationTable[self::COLUMN_STATIONLATITUDE] = $this->selectData(self::COLUMN_STATIONLATITUDE);
        return $this->stationTable[self::COLUMN_STATIONLATITUDE];
    }
    
    function getStationLongitude() {
        
        $this->stationTable[self::COLUMN_STATIONLONGITUDE] = $this->selectData(self::COLUMN_STATIONLONGITUDE);
        return $this->stationTable[self::COLUMN_STATIONLONGITUDE];
    }

    function getStationName() {
        
        $this->stationTable[self::COLUMN_STATIONNAME] = $this->selectData(self::COLUMN_STATIONNAME);
        return $this->stationTable[self::COLUMN_STATIONNAME];
    }

    function getStationDescription() {
        
        $this->stationTable[self::COLUMN_STATIONDESCRIPTION] = $this->selectData(self::COLUMN_STATIONDESCRIPTION);
        return $this->stationTable[self::COLUMN_STATIONDESCRIPTION];
    }

    function getStationType() {
        
        $this->stationTable[self::COLUMN_STATIONTYPE] = $this->selectData(self::COLUMN_STATIONTYPE);
        return $this->stationTable[self::COLUMN_STATIONTYPE];
    }

    function getStationLandline() {
        
        $this->stationTable[self::COLUMN_STATIONLANDLINE] = $this->selectData(self::COLUMN_STATIONLANDLINE);
        return $this->stationTable[self::COLUMN_STATIONLANDLINE];
    }

    function getStationMobile() {
        
        $this->stationTable[self::COLUMN_STATIONMOBILE] = $this->selectData(self::COLUMN_STATIONMOBILE);
        return $this->stationTable[self::COLUMN_STATIONMOBILE];
    }

    function getStationAddress() {
        
        $this->stationTable[self::COLUMN_STATIONADDRESS] = $this->selectData(self::COLUMN_STATIONADDRESS);
        return $this->stationTable[self::COLUMN_STATIONADDRESS];
    }

    function getStationEmail() {
        
        $this->stationTable[self::COLUMN_STATIONEMAIL] = $this->selectData(self::COLUMN_STATIONEMAIL);
        return $this->stationTable[self::COLUMN_STATIONEMAIL];
    }

    function getStationPay() {
        
        $this->stationTable[self::COLUMN_STATIONPAY] = $this->selectData(self::COLUMN_STATIONPAY);
        return $this->stationTable[self::COLUMN_STATIONPAY];
    }

    function getStationState() {
        
        $this->stationTable[self::COLUMN_STATIONSTATE] = $this->selectData(self::COLUMN_STATIONSTATE);
        return $this->stationTable[self::COLUMN_STATIONSTATE];
    }

    function getStationDateTime() {
        
        $this->stationTable[self::COLUMN_STATIONDATETIME] = $this->selectData(self::COLUMN_STATIONDATETIME);
        return $this->stationTable[self::COLUMN_STATIONDATETIME];
    }

    function getStationSupplierId() {
        
        $this->stationTable[self::COLUMN_STATIONSUPPLIERID] = $this->selectData(self::COLUMN_STATIONSUPPLIERID);
        return $this->stationTable[self::COLUMN_STATIONSUPPLIERID];
    }

    function getStationRegionId() {
        
        $this->stationTable[self::COLUMN_STATIONREGIONID] = $this->selectData(self::COLUMN_STATIONREGIONID);
        return $this->stationTable[self::COLUMN_STATIONREGIONID];
    }

    function getStationBranchId() {
        
        $this->stationTable[self::COLUMN_STATIONBRANCHID] = $this->selectData(self::COLUMN_STATIONBRANCHID);
        return $this->stationTable[self::COLUMN_STATIONBRANCHID];
    }

    function getStationTradeGroupId() {
        
        $this->stationTable[self::COLUMN_STATIONTRADEGROUP] = $this->selectData(self::COLUMN_STATIONTRADEGROUP);
        return $this->stationTable[self::COLUMN_STATIONTRADEGROUP];
    }

    function getStationUserId() {
        
        $this->stationTable[self::COLUMN_STATIONUSERID] = $this->selectData(self::COLUMN_STATIONUSERID);
        return $this->stationTable[self::COLUMN_STATIONUSERID];
    }

    function setStationName($stationNameValue) {
        
       $result = $this->updateData($stationNameValue, self::COLUMN_STATIONNAME);
       return $result;
       
    }

    function setStationDescription($stationDescriptionValue) {
        
       $result = $this->updateData($stationDescriptionValue, self::COLUMN_STATIONDESCRIPTION);
       return $result;
        
    }

    function setStationLandline($stationLandlineValue) {
        
       $result = $this->updateData($stationLandlineValue, self::COLUMN_STATIONLANDLINE);
       return $result; 
       
    }

    function setStationMobile($stationMobileValue) {
        
       $result = $this->updateData($stationMobileValue, self::COLUMN_STATIONMOBILE);
       return $result;
        
    }

    function setStationAddress($stationAddressValue) {
        
       $result = $this->updateData($stationAddressValue, self::COLUMN_STATIONADDRESS);
       return $result; 
        
    }

    function setStationEmail($stationEmailValue) {
        
       $result = $this->updateData($stationEmailValue, self::COLUMN_STATIONEMAIL);
       return $result;
        
    }
    
    function setStationBranchId($stationBranchIdValue) {
        
       $result = $this->updateData($stationBranchIdValue, self::COLUMN_STATIONBRANCHID);
       return $result;
        
    }

    function setStationTradeGroupId($stationTradeGroupIdValue) {
        
       $result = $this->updateData($stationTradeGroupIdValue, self::COLUMN_STATIONTRADEGROUP);
       return $result;
        
    }
    
}
