<?php 

    namespace BadarNadeem\RandomPassword;


    use BadarNadeem\RandomPassword\PasswordStrength;
    use BadarNadeem\RandomPassword\Exceptions\InvalidPasswordLengthException;
    use BadarNadeem\RandomPassword\Exceptions\InvalidPasswordStrengthException;

    class Password {

        public const DEFAULT_LENGTH = 8;

        protected const SPECIAL_CHARACTERS  = "!\"#$%&'()*+,-./:;<=>?@[\\]^_`{|}~";
        protected const LOWERCASE_ALPHABETS = "abcdefghijklmnopqrstuvwxyz";
        protected const UPPERCASE_ALPHABETS = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        protected const DIGITS              = "0123456789";
        
        protected $strength;
        protected $length;

        public function __construct($args=[]) {

            $length   = $args['length']   ?? self::DEFAULT_LENGTH;
            $strength = $args['strength'] ?? PasswordStrength::STRONG;

            if($length < 1){
                throw InvalidPasswordLengthException::create();
            }

            if(!in_array($strength, PasswordStrength::cases())) {
                throw InvalidPasswordStrengthException::create();
            }

            $this->length   = $length;
            $this->strength = $strength;

        }

        public function generate() {

            $characters = self::LOWERCASE_ALPHABETS;

            if($this->strength == PasswordStrength::STRONG) {
                $characters .= (self::UPPERCASE_ALPHABETS . self::DIGITS . self::SPECIAL_CHARACTERS);
            }

            if($this->strength == PasswordStrength::MEDIUM) {
                $characters .= self::DIGITS;
            }

            $password = [];

            for($i = 1; $i <= $this->length; $i++) {

                $password[] = $characters[rand(0, (strlen($characters) - 1))];

            }

            return implode($password);
        }
    }

?>