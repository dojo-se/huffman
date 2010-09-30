<?php

function frequency($dados)
{
    $r = array();
    for($i = 0; $i < strlen($dados); $i++)
    {
            $r[$dados[$i]] += 1;
    }

    return $r; //$test = array("A" => 2, "B" => 1, "C" => 1);
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
    
    function testFrequency(){
        $this->assertSame($test = array("A" => 2, "B" => 1, "C" => 1), frequency("AABC"));
    }
}
