<?php
;

/*-----------------------------------------------------------\
| Class : DataProcessing                                     |
| Used for data processing, such as cleaning and validation  |
\-----------------------------------------------------------*/
class DataProcessing
{
    /**
     * Sanitaze data
     * Removing all HTML characters
     *
     * @param string $args
      * @return string $args
     */
    static function clearData($args)
    {
        $args = htmlspecialchars($args);
        $args = strip_tags($args);
        $args = filter_var($args, FILTER_SANITIZE_SPECIAL_CHARS);
        return $args;
    }

    /**
     * Returns name if it's an name válid, or false if an not válid name
     *
     * @param string $name
     * @return string $name
     * or
     * @return bool false
     */
    static function isName($name)
    {
        $name = str_replace(" ", "", $name);
        if(!preg_match("/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ]+$/", $name)){
            return false;
        }
        return true;
    }

    /**
     * Returns true if it's an telephone number válid, or false if an not válid
     *
     * @param string $number
     * @return bool
     */
    static function isTelephone($number)
    {
        $number = str_replace("(", "", $number);
        $number = str_replace(")", "", $number);
        $number = str_replace(" ", "", $number);
        $number = str_replace("-", "", $number);

        if(strlen($number) >= 12 or strlen($number) <= 9){
            return false;
        }
        if(preg_match("/^[A-Za-záàâãéèêíïóôõö'úçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ]/",$number)){
            return false;
        }
        if(preg_match("/^[@#$%¨&*()!-+=;.,|]/",$number)){
            return false;
        }
        return true;
    }

    /**
     * Returns true if it's an password valid
     *
     * @param string $password
     * @return bool
     */
    static function validPassword($password)
    {
        $password = str_replace(" ", "", $password);
        if(strlen($password) <= 7){
            return false;
        }
        return true;
    }

     /**
     * Returns true if it is an CNPJ, or false if it was not an CNPJ
     *
     * @param string $cnpj
     * @return bool
     */
    static function isCnpj($cnpj)
    {
        $cnpj = str_replace("/", "", $cnpj);
        $cnpj = str_replace("-", "", $cnpj);
        $cnpj = str_replace(".", "", $cnpj);

        if(strlen($cnpj) > 14 or strlen($cnpj) < 14 or !preg_match("/^[0-9]+$/", $cnpj)){
            return false;
        }

        if(strlen($cnpj) < 14){
            return false;
        }
        $calc = 0;
        $numbers = [5,4,3,2,9,8,7,6,5,4,3,2];
        for($i=0; $i<=11; $i++){
            $calc += $numbers[$i] * intval($cnpj[$i]);
        }

        if(($calc%11 < 2)){
            $firstDigit = 0;
        }else{
            $firstDigit = 11 - ($calc%11);
        }

        $calc = 0;
        $numbers = [6,5,4,3,2,9,8,7,6,5,4,3,2];

        for($i=0; $i<=12; $i++){
            $calc += $numbers[$i] * intval($cnpj[$i]);
        }

        if(($calc%11 < 2)){
            $secondDigit = 0;
        }else{
            $secondDigit = 11 - ($calc%11);
        }

        if($cnpj[12] == $firstDigit && $cnpj[13] == $secondDigit){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Returns true if it is an CPF, or false if it was not an CPF
     *
     * @param string $cpf
     * @return bool
     */
    static function isCpf($cpf)
    {
        if ($cpf == NULL){
            return false;
        }

        $cpf   = str_replace(".","", $cpf);
        $cpf   = str_replace("-","", $cpf);
        $value = 0;

        //First verification
        if(strlen($cpf) != 11 or !preg_match("/^[0-9]+$/", $cpf)){
            return false;
        }
        //Second verification
        for($i=0; $i<9; $i++){
            $value += ($i+1) * intval($cpf[$i]);
        }
        $verificatorFirstNumber = $value % 11;
        $value = 0;
        for($i=0; $i<10; $i++){
            $value += intval($cpf[$i]) * $i;
        }
        $verificatorSecondNumber = $value % 11;
        if($cpf[9] != $verificatorFirstNumber or $cpf[10] != $verificatorSecondNumber){
            return false;
        }
        else{
            return true;
        }
    }

    /**
     *
     */
    static function cpfWithScore($cpf)
    {
        if(!self::isCpf($cpf)){
            return false;
        }
        return $cpf[0].$cpf[1].$cpf[2 ].".".$cpf[3].$cpf[4].$cpf[5].'.'.$cpf[6].$cpf[7].$cpf[8].'-'.$cpf[9].$cpf[10];
    }

    /**
     *
     */
    static function cnpjWithScore($cnpj)
    {
        if(!self::isCnpj($cnpj)){
            return false;
        }
        $cnpjDot = $cnpj[0].$cnpj[1].'.'.$cnpj[2].$cnpj[3].$cnpj[4].'.'.$cnpj[5].$cnpj[6].$cnpj[7].'/'.$cnpj[8].$cnpj[9].$cnpj[10].$cnpj[11].'-'.$cnpj[12].$cnpj[13];
        return $cnpjDot;
    }
}
