<?php
class ParseArgv
{
private $argsParsed;
private $argsUnparsed;
private $DoubleEXP;
private $DoubleName;
private $DoubleNameEXP;
    /**
     * ParseArgv constructor.
     * @param $args
     */
    public function __construct($args)
{
    $this->DoubleEXP = array();
    $this->DoubleNameEXP = array();
$this->argsUnparsed = $args;
$this->argsParsed = array(

    '-v --grades=good -T 5 -l val1,val2,val3, --names=Dominic,Mimi,Luke'
);

}


    /**
     * @return array
     */
    public function getParsed()
{
    $ImpParsed =array();
    foreach ($this->argsParsed as $k)
    {
        $ImpParsed = explode(' ', $k);
        print_r($ImpParsed);

    }


    foreach ($ImpParsed as $k)
    {
        $string=current($ImpParsed);
       next($ImpParsed);
            if(substr("$k",0,2)== '--') {
                $this->DoubleEXP = explode('=',$k);
                foreach($this->DoubleEXP as $items)
                {
                    if(substr("$items",0,2)== '--')
                    {
                       $this->DoubleName=substr("$items",2);
                    }
                    else
                    {
                        $this->DoubleNameEXP = explode(',',$items);
                        print_r($this->DoubleNameEXP);
                        $Counter = 0;
                        foreach($this->DoubleNameEXP as $value)
                        {
                            $this->argsUnparsed['double'][$this->DoubleName] .=" [$Counter]  '$value'  ,  ";
                            $Counter++;
                        }
                        $this->argsUnparsed['double'][$this->DoubleName] .= " ($Counter arguments) ";
                    }
                }
            }
            elseif(substr("$k",0,1)== '-')
            {
                if(substr("$string",0,1)!= '-')
                {
                    $this->argsUnparsed['Single'][$k]=$string;
                }
                else {

                   $this->argsUnparsed['flag'][] = $k;
                }
            }
        }

        foreach($this->argsUnparsed as $k=>$v)
        {
            echo "<br>";
            print("$k");
            echo"<br>";
            foreach($v as $t=>$r)
            {
                echo "<br>";
                print ("$t ");
                print("$r  ");

            }
        }

    return $this->argsParsed;
}
}