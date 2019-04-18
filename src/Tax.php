<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 4/18/19
 * Time: 5:20 PM
 */

namespace geeklearners;


class Tax
{
    private $amtBeforeTax;
    private $wageType;
    private $dataForLabel1=[
        '72'=>[0.1900,0.1900],
        '361'=>[0.2342,3.2130],
        '932'=>[0.3477,44.2476],
        '1380'=>[0.3450,41.7311],
        '3111'=>[0.3900,103.8657],
        '10000'=>[0.4700,352.7888],
    ];
    private  $dataForLabel2=[
        '355'=>[0,0],
        '422'=>[0.1900,67.4635],
        '528'=>[0.2900,109.7327],
        '711'=>[0.2100,67.4635],
        '1282'=>[0.3477,165.4423],
        '1730'=>[0.3450,161.9808],
        '3461'=>[0.3900,239.8654],
        '10000'=>[0.4700,516.7885],
    ];
    private  $dataForLabel3=[
        '1730'=>[0.3250,0.3250],
        '3461'=>[0.3700,77.8846],
        '10000'=>[0.4500,354.8077],
    ];
    public function __construct($amtBeforeTax,$wageType)
    {
        $this->amtBeforeTax=$amtBeforeTax;
        $this->wageType=$wageType;
    }

    public function getTaxCoeficient($label){
        $mins=[];
        $l='dataForLabel'.$label;
        array_map(function($item)use(&$mins,$label,$l){
            if(($this->amtBeforeTax)/$this->wageType-$item<0){
                array_push($mins,$item);
            }
        },array_keys($this->$l));
        return $this->$l[$mins[0]];
    }
    public function getTax($label){
        $wage=round((((($this->amtBeforeTax/$this->wageType)+.99)*$this->getTaxCoeficient($label)[0])-$this->getTaxCoeficient($label)[1]))*$this->wageType;
        return ($wage<=0)?0:round($wage);
    }
}