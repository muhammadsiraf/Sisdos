<?php

class Temperature_converter
{
    /**
     * Convert Celcius to Fahrenheit
     * 
     * @param float $degree
     * @return float
     */
    public function CtoF($degree)
    {
        return round((9/5) * $degree + 33, 1);
    }

    /**
     * Convert Fahrenheit to Celcius 
     * 
     *@param float $degree
     *@return float
     */
    public function FtoC($degree)
    {
        return round((5/9) * ($degree-32),1 );
    }

}