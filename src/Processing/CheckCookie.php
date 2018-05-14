<?php
/**
 * Created by PhpStorm.
 * User: Инга
 * Date: 13.05.2018
 * Time: 18:20
 */

namespace Socket\Processing;

class CheckCookie
{

    /**
     * CheckCookie constructor.
     */
    private $arrCookie;
    private $key;
    private $testCoockie;

    public function __construct($cookie, $key, $testCoockie)
    {
        $this->arrCookie = $cookie;
        $this->key = $key;
        $this->testCoockie = $testCoockie;
    }

    public function checkCookie()
    {
        $check = false;
        if ($this->arrCookie[$this->key] === $this->testCoockie) {
            $check = true;
        }
        return $check;
    }
}
