<?php 

    namespace BadarNadeem\RandomPassword\Exceptions;

    use InvalidArgumentException;

    class InvalidPasswordStrengthException extends InvalidArgumentException {

        public static function create() {
            return new static("Invalid password strength passed to constructor.");
        }
    }
?>