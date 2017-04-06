<?php

include_once 'mySQL.php';

class Product {
    
    const TABLE = "estacion_has_producto";
    const COLUMN_ID = "producto_id_producto";
    const COLUMN_STATIONID = "estacion_id_estacion";
    const COLUMN_PRODUCTPRICE = "precio_estacion_has_producto";
    const COLUMN_PRODUCTSTATE = "estado_estacion_has_producto";
    
    private $databaseInfo = array();
    
    private $productTable = array(
        self::COLUMN_ID => '',
        self::COLUMN_PRODUCTPRICE => '',
        self::COLUMN_PRODUCTSTATE => '',
    );
    
    private $whereCriterion = array(
        self::COLUMN_ID,
        '',
        self::COLUMN_STATIONID,
        ''
    );
    
    function __construct($databaseInfo, $id, $stationId) {
        
        $this->databaseInfo = $databaseInfo;
        $this->whereCriterion[1] = $id;
        $this->whereCriterion[3] = $stationId;
       
        $tableNames = array(self::TABLE);
        $columnNames = array(
            self::COLUMN_ID,
            self::COLUMN_PRODUCTPRICE,
            self::COLUMN_PRODUCTSTATE
        );
        
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
                    $this->stationTable[self::COLUMN_PRODUCTPRICE] = $column;
                }
                if($indexColumn == 2){
                    $this->stationTable[self::COLUMN_PRODUCTSTATE] = $column;
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
    
    function setArrayData($productArrayData){
        
        foreach ($productArrayData as $row) {
            foreach ($row as $dataArray) {
                $data = $dataArray;
            }
        }
        return $data;
    }
    
    function getProductTable() {
        return $this->productTable;
    }

    function getProductId(){
        
        $productId;
        $this->productTable[self::COLUMN_ID] = $this->selectData(self::COLUMN_ID);
        $productId = $this->setArrayData($this->productTable[self::COLUMN_ID]);
        return $productId;
    }
    
    function getProductPrice(){
        
        $productPrice;
        $this->productTable[self::COLUMN_PRODUCTPRICE] = $this->selectData(self::COLUMN_PRODUCTPRICE);
        $productPrice = $this->setArrayData($this->productTable[self::COLUMN_PRODUCTPRICE]);
        return $productPrice;
    }

    function getProductState(){
        
        $productState;
        $this->productTable[self::COLUMN_PRODUCTSTATE] = $this->selectData(self::COLUMN_PRODUCTSTATE);
        $productState = $this->setArrayData($this->productTable[self::COLUMN_PRODUCTSTATE]);
        return $productState;
    }
    
    function setProductPrice($ProductPriceValue) {
        
       $result = $this->updateData($ProductPriceValue, self::COLUMN_PRODUCTPRICE);
       return $result;
       
    }
    
    function setProductState($ProductStateValue) {
        
       $result = $this->updateData($ProductStateValue, self::COLUMN_PRODUCTSTATE);
       return $result;
       
    }
    
}
