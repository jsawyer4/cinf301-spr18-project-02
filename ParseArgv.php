<?php
class ParseArgv
{
private $argsUnparsed;
private $argsParsed;
private $doubleEXP;
private $doubleName;
private $doubleNameEXP;
    public function __construct($args)
{
    // initilizes all of the arrays in the program
    $this->doubleEXP = array();
    $this->doubleNameEXP = array();
$this->argsParsed = $args;
$this->argsUnparsed = array();
}

    /**
     * getParsed takes the Unparsed array that we enter while we are in the constructor and then we parsed
     * the entire array then we return the parsed array
     */
    public function getParsed()
{
    foreach ($this->argsUnparsed as $k)
    {
        $string=current($this->argsUnparsed); // this check to see what the next element for the array for Single
       next($this->argsUnparsed); // this somehow helps with the next element wity works with current to do the deal
            if(substr("$k",0,2)== '--') { // checks to see if the first two letters are -- to make it double
                $this->doubleParsed($k);// this sends it to the dobuleParsed
            }
            elseif(substr("$k",0,1)== '-') // checks to see if it is a Single or FLag
            {
                if(substr("$string",0,1)!= '-') { // if the next elelment != to '-' then it makes it a Single
                    $this->doubleNameEXP = explode(',', $string);
                    // line above makes the words inside the string into an array so we can add it later
                    $this->singleParsed($k); // sends it to singleParsed
                }
                else { // if the first if does not work then it is a Flag
                   $this->argsParsed['FLAG'][$k] = "";//it creates a FLAG inside of a argsParsed
                }
            }
        }
    return $this->argsParsed; // returns the final array
}

    /**
     * doubleParsed for this we took all the information from the getParsed about the Double if statement.
     * with that information we follow the guide lines then we put it in the argsParsed array
     */
private function doubleParsed($input)
{
    $this->doubleEXP = explode('=',$input); // this expands and spreads out the first part and the second part int he stirng
    foreach($this->doubleEXP as $items)
    {
        if(substr("$items",0,2)== '--')// this checks to see if it is the first part of the string
        {
            $this->doubleName=substr("$items",2); // if it is the first part then we save it under dobule name and get ride of the '--'
        }
        else // if it is not the first part then it is the second part of the string
        {
            $this->doubleNameEXP = explode(',',$items); // this explodes the second part and made it into a another array with dobuleNameEXP
            $Counter = 0;
            foreach($this->doubleNameEXP as $value) //go thought the exploded second part and goes thought the array
            {
                $this->argsParsed['DOUBLE'][$this->doubleName] .=" [$Counter]  '$value'  ,  ";
                //the line above is where the argsParsed gets the DOUBLE and with the first part of orignal string then appends the second part to it
                $Counter++; // adds the counter to get to see what element we are on
            }
            if($Counter==1)//if the array only has one argument
            {
                $this->argsParsed['DOUBLE'][$this->doubleName] .= " ($Counter argument) ";// adds how many are in the argument
            }
            else{ // then there are more then one argument in the array
            $this->argsParsed['DOUBLE'][$this->doubleName] .= " ($Counter arguments) ";// adds how many are in the arguments
            }
        }
    }
}

    /**
     * singleParsed for this we took all the information from the getParsed about the single if statement.
     * with that information we follow the guide lines then we put it in the argsParsed array
     */
private  function singleParsed($input)
{
   $Counter=0;// makes the counter
    foreach ($this->doubleNameEXP as $value) {
        if ($value != NULL) {// just checks to make sure that the elements is not NULL
            $this->argsParsed['SINGLE'][$input] .= " [$Counter] '$value', "; // appends the value to the input in the constuctor
            $Counter++;//add for the next element
        }
    }
    if ($Counter == 1) { // check to see if onyl one argument
        $this->argsParsed['SINGLE'][$input] .= " ($Counter argument) ";// adds how any argument are in the array
    } else { // then there are more then one argument in the array
        $this->argsParsed['SINGLE'][$input] .= " ($Counter arguments) "; // adds how many arguments are in the array
    }
}
}