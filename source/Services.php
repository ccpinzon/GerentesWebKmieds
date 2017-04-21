<?php

/*
 * Esta clase se adaptó a la version 4 de la base de datos.
 */

include_once 'mySQL.php';

class Services {
    
    const TABLE = "servicio_has_estacion";
    const COLUMN_ID = "servicio_id_servicio";
    const COLUMN_STATIONID = "estacion_id_estacion";
    const COLUMN_DESCRIPTIONSERVICE = "descripcion_servicio_has_estacion";
    
    const SERVICETABLE = "servicio";
    const COLUMN_SERVICETABLEID = "id_servicio";
    const COLUMN_SERVICETABLENAME = "nombre_servicio";
    
    private $databaseInfo = array();
    
    private $servicesList = array();
    
    private $stationId;
    
    private $whereCriterionGeneral = array(
        self::TABLE.".".self::COLUMN_ID,
        self::SERVICETABLE.".".self::COLUMN_SERVICETABLEID,
        self::COLUMN_STATIONID,
        ''
    );
    
    private $whereCriterionOverride = array(
        self::COLUMN_ID,
        '',
        self::COLUMN_STATIONID,
        ''
    );
    
    function __construct($databaseInfo, $stationId) {
        
        $this->databaseInfo = $databaseInfo;
        
        $this->stationId = $stationId;
        $this->whereCriterionGeneral[3] = $stationId;
        $this->whereCriterionOverride[3] = $stationId;
        
        $this->updateServicesList();
    }
    function getServicesList() {
        return $this->servicesList;
    }
    function updateServicesList(){
        
        $tableNames = array(
            self::TABLE,
            self::SERVICETABLE    
        );
        $columnNames = array(
            self::SERVICETABLE.".".self::COLUMN_SERVICETABLENAME,
            self::COLUMN_ID,
            self::COLUMN_DESCRIPTIONSERVICE      
        );
        
        $databaseManager = new mySQL;
        
        $resultQuery = $databaseManager->selectmySQL($this->databaseInfo, $tableNames, $columnNames, $this->whereCriterionGeneral);
        $this->servicesList = $resultQuery;
    }
    
    function addService($serviceId, $serviceDescription){
        
        $tableName = self::TABLE;
        $columnNames = array(
            self::COLUMN_ID,
            self::COLUMN_STATIONID,
            self::COLUMN_DESCRIPTIONSERVICE,
        );
        
        $values = array(
            $serviceId,
            $this->stationId,
            '"'.$serviceDescription.'"'
        );
        
        $databaseManager = new mySQL;
        
        $resultQuery = $databaseManager->insertmySQL($this->databaseInfo, $tableName, $columnNames, $values);
        return $resultQuery;
    }
    
    function deleteService($serviceId){
        
        $databaseManager = new mySQL;
        
        $this->whereCriterionOverride[1] = $serviceId;
        
        $resultQuery = $databaseManager->deletemySQL($this->databaseInfo, self::TABLE, $this->whereCriterionOverride);
        return $resultQuery;
    }
}
