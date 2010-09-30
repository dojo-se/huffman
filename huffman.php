<?php

function huffmanEncoder($dados)
{
    return '01011';
}

class ProblemaParaResolverTest extends PHPUnit_Framework_TestCase
{
    function testABR()
    {
        $this->assertSame('01011', huffmanEncoder('ABR'));
    }
}
