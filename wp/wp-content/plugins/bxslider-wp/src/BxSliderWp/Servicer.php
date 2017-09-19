<?php
// Service Locator class
class BxSliderWp_Servicer {
    protected $services;
    
    public function __construct() {
        $this->services = array();
    }
    
    public function set($id, $service, $shared = true) {
        $this->services[$id] = array(
            'content' => $service, // Service name
            'shared' => $shared,
            'consumed' => false // for shared services. Run once.
        );
    }

    public function get($id) {
        if($this->exist($id)){
            if(is_callable($this->services[$id]['content'])){
                if($this->services[$id]['shared']){
                    if( !$this->services[$id]['consumed']){
                        $this->services[$id]['consumed'] = true;
                        return $this->services[$id]['content'] = call_user_func($this->services[$id]['content'], $this);
                        
                    } else {
                        return $this->services[$id]['content'];
                    }
                    
                } else {
                    return call_user_func($this->services[$id]['content'], $this);
                }
                
            } else {
                return $this->services[$id]['content'];
            }
        } else {
            throw new Exception(sprintf(__("Service %s does not exist.", 'bxsliderwp'), $id));
        }
    }

    public function delete($id) {
        $this->services[$id] = null;
        unset($this->services[$id]);
    }

    public function exist($id) {
        return isset($this->services[$id]);
    }
    
    public function run(){
        $plugin = apply_filters('bxsliderwp_services', $this); // Change this
        
        // Loop on contents
        foreach($plugin->services as $id=>$service){

            $content = $this->get($id);
            if( is_object($content) ){
                $reflection = new ReflectionClass($content);
                if($reflection->hasMethod('inject')){
                    $content->inject( $this ); // Inject our container
                }
                if($reflection->hasMethod('run')){
                    $content->run(); // Call run method on object
                }
            }
        }
    }
}