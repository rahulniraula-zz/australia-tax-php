<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 4/18/19
 * Time: 5:22 PM
 */

namespace geeklearners\test;


use geeklearners\Tax;

class TaxTest
{
    /**
     * A basic test example.
     *
     * @return array
     */
    public function label1DataProvider(){
        return [
            ["1152","108"],
            ['1366','152'],
            ['402','0'],
            ['1530','202'],
            ['2000','366'],
            ['3530','898'],
        ];
    }
    public function label2DataProvider(){
        return [
            ['892','40'],
            ['498','0'],
            ['1744','276'],
            ['2808','646'],
            ['4408','1240'],
            ['5332','1600'],
            ['6550','2076'],
        ];
    }

    /**
     *
     * @dataProvider label1DataProvider
     * @dataProvider label2DataProvider
     * @param $wage
     * @param $taxAmount
     */
    public function testTaxLevelCalculation($wage,$taxAmount)
    {
        $tax=new Tax($wage,2);
        $this->assertEquals($taxAmount,$tax->getTax(2));
    }
}