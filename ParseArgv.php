<?php
class ParseArgv
{
private $argsParsed;
private $argsUnparsed;

    /**
     * ParseArgv constructor.
     * @param $args
     */
    public function __construct($args)
{
$this->argsUnparsed = $args;
$this->argsParsed = array(

    '-v --grades=good -T 5 -l val1,val2,val3, --names=Dominic,Mimi,Luke'
);

}


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

            if(substr("$k",0,2)== '--') {
                $this->argsUnparsed['double'][]= $k;

            }
            elseif(substr("$k",0,1)== '-')
            {
                if(substr("$k",0,1)!= '-')
                {

                }
                else {
                   $this->argsUnparsed['flag'][] = $k;
                }
            }
        }

        foreach($this->argsUnparsed as $k=>$v)
        {
            foreach($v as $t=>$r)
            {
                print("$r  ");
            }
        }

    return $this->argsParsed;
}
}