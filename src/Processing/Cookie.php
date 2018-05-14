<?php
/**
 * Created by PhpStorm.
 * User: Инга
 * Date: 13.05.2018
 * Time: 18:20
 */

namespace Socket\Processing;

class Cookie
{

    /**
     * CheckCookie constructor.
     */
    private $text = "qwertyuiopasdfghjklzxcvbnm1234567890";

    

    public function setRandomCookie()
    {
        $strlen = strlen($this->text);
        for ($i=0; $i < 32; $i++) {
            $value .= substr($this->text, rand(0, $strlen), 1);
        }
        return $value;
    }
}
