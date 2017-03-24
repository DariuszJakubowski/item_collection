<?php

namespace IC\core;

class App
{
    private $url_controller = null;
    private $url_action = null;
    private $url_params = null;
    
    public function __construct() 
    {
        $this->splitUrl();
        
        var_dump($this->url_controller);
    }
    
    private function splitUrl()
    {

    if (isset($_GET['url'])) {
            // split URL into an array
            $url = explode('/', (filter_var((trim($_GET['url'], '/')), FILTER_SANITIZE_URL)));
            
            // set controller & method
            if(isset($url[0])) {
                $this->url_controller = $url[0];
                
                if(isset($url[1])) {
                    $this->url_action = $url[1];
                }        
            }
  
            unset($url[0], $url[1]);
            // rebase array keys and store the URL params
            $this->url_params = array_values($url);
      
        }
    }
}
