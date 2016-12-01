<?php

class MyFilter extends  CFilter
{
    protected function preFilter($filterChain)
    {
        echo "--->MyFilter.preFilter.<br>";
        return true;
    }

    protected function postFilter($filterChain)
    {
        echo "<br> --->MyFilter.postFilter.<br>";
    }
}
