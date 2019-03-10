<?php

class Bob {

    private static $responses = [
        "question" => "Sure.", 
        "yell" => "Whoa, chill out!",
        "yellQuestion" => "Calm down, I know what I'm doing!",
        "empty" => "Fine. Be that way!",
        "other" => "Whatever."
    ];

    function respondTo($input) {
        $input = trim($input);
        $response; 

        if ($this->isEmpty($input)) {
            $response = self::$responses['empty'];
        }
        elseif ($this->isQuestion($input)) {
            if ($this->isYell($input)) {
                $response = self::$responses['yellQuestion'];
            }
            else {
                $response = self::$responses['question'];
            }
        }
        elseif ($this->isYell($input)) {
            $response = self::$responses['yell'];
        }
        else {
            $response = self::$responses['other'];
        }

        return $response;
    }

    //Checks if last character is '?'
    function isQuestion($input) {
        return (substr($input, -1) == '?') ? true : false;
    }

    //Checks if all characters are uppercase
    function isYell($input) {
        //Confirms all characters are in letter category
        if (preg_match('/^[\PL]*$/', $input)) {
            return false;
        }

        return (mb_strtoupper($input) === $input) ;
    }

    //Checks if string is whitespace
    function isEmpty($input) {
        //Removes unicode whitespace
        $input = preg_replace('/^[\pZ\pC]+|[\pZ\pC]+$/u','',$input);
        return ($input == '') ? true : false;
    }
}

?>