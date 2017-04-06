<?php

include_once 'mySQL.php';

class Services {
    
    const TABLE = "servicio_has_estacion";
    const COLUMN_ID = "servicio_id_servicio";
    const COLUMN_STATIONID = "estacion_id_estacion";
    const COLUMN_DESCRIPTIONSERVICE = "descripcion_servicio_has_estacion";
    const COLUMN_STATIONSUPPLIERID = "estacion_mayorista_id_mayorista";
    const COLUMN_STATIONREGIONID = "estacion_departamento_id_departamento";
    
    private $databaseInfo = array();
    
    private $servicesList = array();
    
    private $stationId;
    private $stationSupplierId;
    private $stationRegionId;
    
    private $whereCriterionGeneral = array(
        self::COLUMN_STATIONID,
        ''
    );
    
    private $whereCriterionOverride = array(
        self::COLUMN_ID,
        '',
        self::COLUMN_STATIONID,
        ''
    );
    
    function __construct($databaseInfo, $stationId, $stationSupplierId, $stationRegionId) {
        
        $this->databaseInfo = $databaseInfo;
        
        $this->stationId = $stationId;
        $this->whereCriterionGeneral[1] = $stationId;
        $this->whereCriterionOverride[3] = $stationId;
        $this->stationSupplierId = $stationSupplierId;
        $this->stationRegionId = $stationRegionId;
        
        $this->updateServicesList();
    }

    function getServicesList() {
        return $this->servicesList;
    }

    function updateServicesList(){
        
        $tableNames = array(self::TABLE);
        $columnNames = array(
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
            self::COLUMN_STATIONSUPPLIERID,
            self::COLUMN_STATIONREGIONID
        );
        
        $values = array(
            $serviceId,
            $this->stationId,
            '"'.$serviceDescription.'"',
            $this->stationSupplierId,
            '"'.$this->stationRegionId.'"'
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
