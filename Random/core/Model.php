<?php


abstract class Model
{

    protected static function getCsvData($csv) : array {
        $converter = new Converter();
        $csvClass=$converter->convertCsv($csv);

        return $csvClass;
    }
    
    public function convertCsv($csv=null)
    {
        try
        {
            $csv = array_map('str_getcsv', file(($csv)));
        }
        catch(Exception $e)
        {
            die('Erreur csv -> array '.$e->getMessage());
        }
    
    
        return $csv; 
    }
}