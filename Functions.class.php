<?php

class Functions {
    
    public function split($text,$domain)
    {
        $arr = explode("\n", $text);
        
        return $this->strip($arr,$domain);
        //return $domain;
    }
    
    public function strip($array,$domain)
    {
       $ex = explode(".",$domain);
       switch($ex[count($ex)-1])
       {
           case 'se' :
           case 'nu' :
               return $this->SENU($array);
           break;
       }
    }
    
    
    public function arrayToJson($array)
    {
        return json_encode($array);
    }
    
    private function SENU($array)
    {
         $arr = array();
        
        foreach($array as $key => $value)
        {            
            if(preg_match('/^domain:/',$value))
            {
                $ex = explode(":",str_replace(' ','',$value));
                $arr['domain'] = $ex[count($ex)-1];
            }
            if(preg_match('/^state:/',$value))
            {
                $ex = explode(":",str_replace(' ','',$value));
                $arr['state'] = $ex[count($ex)-1];
            }
            if(preg_match('/^modified:/',$value))
            {
                $ex = explode(":",str_replace(' ','',$value));
                $arr['modified'] = $ex[count($ex)-1];
            }
            if(preg_match('/^created:/',$value))
            {
                $ex = explode(":",str_replace(' ','',$value));
                $arr['created'] = $ex[count($ex)-1];
            }
            if(preg_match('/^expires:/',$value))
            {
                $ex = explode(":",str_replace(' ','',$value));
                $arr['expires'] = $ex[count($ex)-1];
            }
            
            if(preg_match('/^status:/',$value))
            {
                $ex = explode(":",str_replace(' ','',$value));
                $arr['status'] = $ex[count($ex)-1];
            }
            
            if(preg_match('/^registrar:/',$value))
            {
                $ex = explode(":",str_replace(' ','',$value));
                $arr['registrar'] = $ex[count($ex)-1];
            }
            
            if(preg_match('/^nserver:(.*)/',$value,$match))
            {
                $temp = array();
                foreach($match as $value)
                {
                    $temp[] = str_replace(' ','',$value);
                }
                
                $arr['nserver'][] = $temp[1];
                
            }
        }
        return $arr;
    }
    
    private function com($array)
    {
        $arr = array();
        return $arr;
    }
}
