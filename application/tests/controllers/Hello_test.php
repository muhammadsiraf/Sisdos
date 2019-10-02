<?php
require_once '\TestCase.php';
class Hello_test extends TestCase
{
    public function test_get_hello()
    {
        $output= $this->request('GET', ['Hello', 'get_hello']);
        $expected= "<H1>Hi There </H1>";
        $this->assertContains($expected,$output);
    }
}