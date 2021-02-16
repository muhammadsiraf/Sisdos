<?php

class Temperature_converter_test extends TestCase
{
   
    // $obj=new Temperature_converter();
    // private $obj;
    public function setUp()
    {
        $this->obj = new Temperature_converter();
    }

    /**
     * @dataProvider provide_temperature_data
     */
    public function test_FtoC($degree, $expected)
    {
        // $obj = new Temperature_converter();
        // $this->setUp();
        $actual = $this->obj->FtoC($degree);
        $this->assertEquals($expected, $actual, '', 0.01);
    }

    public function provide_temperature_data()
    {
        return [
            //[Fahrenheit, Celcius]
            [-40, -40],
            [0, -17.8],
            [32, 0.0],
            [100, 37.8],
            [212, 100.0],

        ];
    }


    /**
     * @dataProvider provide_temperature_data_celcius
     */
    public function test_CtoF($degree, $expected)
    {
        // $obj = new Temperature_converter();
        // $this->setUp();
        $actual = $this->obj->CtoF($degree);
        $this->assertEquals($expected, $actual, '', 0.01);
    }

    public function provide_temperature_data_celcius()
    {
        return [
            // Celcius to Fahrenheit
            [-40,-39.0],
            [-17.8,1],
            [0,33],
            [37.8,101.0],
            [100,213],
        ];
    }


}