<?php

class Functions {
    
    public function split($text)
    {
        $arr = explode("\n", $text);
        
        
        
        return $this->strip($arr);
    }
    
    public function strip($array)
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
            
            if(preg_match('/^nserver:(.*)$/',$value,$match))
            {
                foreach($match as $value)
                {
                    $arr['nservers'][] = $value;
                }
            }
        }
        return $arr;
    }
    
}
