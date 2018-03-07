<?php 
// an abstract class LighterFactory
abstract class AbstractLighterFactory //ce qui est commun à tous les briquets
{
    protected $ressources = [];
    
    public function addRessources($type, $amount){
        
        if (!isset($this->ressources[$type])){
            $this->ressources[$type] = 0; // il faut que ressources existe : isset et que j'en ai + que 0
        }
        $this->ressources[$type]+= $amount;
     }

    protected function consumeRessources($type, $amount)
    {
        if (!isset($this->ressources[$type])){
            $this->ressources[$type] = 0; // il faut que ressources existe : isset et que j'en ai + que 0
        }
        $this->ressources[$type]-= $amount;
    }
    
    abstract public function buildLighter();//abstract car les factories ont leur propre façon de faire
}
//ManualLighterFactory child of abstractLighterFactory
class ManualLighterFactory extends AbstractLighterFactory
{
    public function buildlighter(){// la seule chose à définir c'est ce qui est particulier à chaque factory : how to build
        if (isset($this->ressources['fuel']) && $this->ressources['fuel']>0){
            $this->consumeRessources ('fuel', 1);
            return 'manual lighter';
        }
        return 'No fuel';
    }
}

//ElectricLighterFactory child of abstractLighterFactory
class ElectricLighterFactory extends AbstractLighterFactory
{
    public function buildLighter(){
        if (isset($this->ressources['fuel']) && $this->ressources['fuel']>0){
            $this->consumeRessources ('fuel', 1);
            return 'electric lighter';
    }
    return 'No fuel';
    }
}
//create a factory from the appropriate class  
$factory = new ManualLighterFactory();
$factory->addRessources('fuel', 10);
echo $factory->buildlighter();

echo "\n";
$factory = new ElectricLighterFactory();
$factory->addRessources('fuel', 10);
echo $factory->buildlighter();


