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

function criaMapa($string)
{
    $mapa = array();
    for($i = 0; $i < strlen($string); $i++) {
        if($i == strlen($string)-1){
            $str = '';
        }else{
            $str = '0';
        }
        for($j = 0; $j < $i; $j++){
            $str = '1'.$str;
        }
        $mapa[$string[$i]] = $str;
    }

    return $mapa;
}

function huffmanEncoder($dados)
{
    $mapa = criaMapa(ordemFreq(frequency($dados)));
    $r = '';
    for($i = 0; $i < strlen($dados); $i++) {
        $r = $r . $mapa[$dados[$i]];
    }
    
    return $r;
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

    function testMapa()
    {
        $this->assertSame(array('D' => '0', 'B' => '10', 'C' => '110', 'A' => '111'), criaMapa('DBCA'));
    }
    
    function testHoraExtra()
    {
        $this->assertSame('01101010111110001000', huffmanEncoder('ABRRKBAARAA'));
    }
}
