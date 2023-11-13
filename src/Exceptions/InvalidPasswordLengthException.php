<?php

    namespace BadarNadeem\RandomPassword\Exceptions;

    use InvalidArgumentException;

    class InvalidPasswordLengthException extends InvalidArgumentException {

        public static function create() {

            return new static("Password length cannot be zero or negative.");
            
        }
    }
?>