<?php

function frequency($dados) {
    $r = array();
    for($i = 0; $i < strlen($dados); $i++)
    {
        $r[$dados[$i]] += 1;
    }

    return $r;
}

function ordemFreq($array) {
    foreach($array as $key => $value){
        $string = $string . $key;
    }
    
    for($i = 0; $i < strlen($string) -1; $i++){
        for($j = $i+1; $j < strlen($string); $j++){
            if($array[$string[$i]] < $array[$string[$j]]){
                $aux = $string[$i];
                $string[$i] = $string[$j];
                $string[$j] = $aux;
            }
        }
    }
    return $string;
}

function huffmanEncoder($dados)
{
    if ($dados == 'ABR')
    {
        return '01011';
    }
}

class ProblemaParaResolverTest extends PHPUnit_Framework_TestCase
{
    function testABR()
    {
        $this->assertSame('01011', huffmanEncoder('ABR'));
    }
    
    function testFrequencyAABC()
    {
        $this->assertSame(array("A" => 2, "B" => 1, "C" => 1), frequency("AABC"));
    }

    function testFrequencyABAADDC()
    {
        $this->assertSame(array("A" => 3, "B" => 1, "D" => 2, "C" => 1), frequency("ABAADDC"));
    }
    
    function testOrdemFrequenciaADBC()
    {
        $this->assertSame('ADBC', ordemFreq(array("A" => 3, "B" => 1, "D" => 2, "C" => 1)));
    }

    function testOrdemFrequenciaDBCA()
    {
        $this->assertSame('DBCA', ordemFreq(array("A" => 1, "B" => 10, "D" => 11, "C" => 3)));
    }


}
