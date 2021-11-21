<?php

class Converter {

 



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