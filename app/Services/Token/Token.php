<?php
namespace App\Services\Token;

class Token
{

    /**
     * Generate token
     * 
     * @param number $length            
     * @param boolean $lowerCase            
     * @param boolean $capitalCase            
     * @param boolean $numeric            
     * @return string
     * @author Amir Eslamdoust <amireslamdoust@gmail.com>
     */
    public function getToken($length = 6, $capitalCase = true, $lowerCase = true, $numeric = true, $character = false)
    {
        $token = '';
        $codeAlphabet = '';
        
        if ($capitalCase)
            $codeAlphabet .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if ($lowerCase)
            $codeAlphabet .= 'abcdefghijklmnopqrstuvwxyz';
        if ($numeric)
            $codeAlphabet .= '0123456789';
        if ($character)
            $codeAlphabet .= '!@#$%^&*()_+.,=-[]{}';
        
        $max = strlen($codeAlphabet) - 1;
        for ($i = 0; $i < $length; $i ++) {
            $token .= $codeAlphabet[$this->cryptoRandSecure(0, $max)];
        }
        return $token;
    }

    /**
     * crypt and random and secure generate token
     *
     * @param int $min            
     * @param int $max            
     * @author Amir Eslamdoust <amireslamdoust@gmail.com>
     */
    private function cryptoRandSecure($min, $max)
    {
        $range = $max - $min;
        if ($range < 1)
            return $min;
        $log = ceil(log($range, 2));
        $bytes = (int) ($log / 8) + 1;
        $bits = (int) $log + 1;
        $filter = (int) (1 << $bits) - 1;
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter;
        } while ($rnd >= $range);
        return $min + $rnd;
    }
}