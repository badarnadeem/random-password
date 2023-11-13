<?php

    namespace BadarNadeem\Tests;
    

    use BadarNadeem\RandomPassword\Exceptions\InvalidPasswordLengthException;
    use BadarNadeem\RandomPassword\Exceptions\InvalidPasswordStrengthException;
    use BadarNadeem\RandomPassword\Password;
    use PHPUnit\Framework\TestCase;

    class PasswordTest extends TestCase {

        public function test_can_create_instance_successfully() {

            $password = new Password();
            $this->assertInstanceOf(Password::class, $password);
        }

        public function test_invalid_length_exception() {

            $this->expectException(InvalidPasswordLengthException::class);

            $password = new Password(['length' => -1]);
        }

        public function test_invalid_strength_exception() {

            $this->expectException(InvalidPasswordStrengthException::class);

            $password = new Password(['strength' => 'normal']);
        }

        public function test_default_password_length() {

            $password = new Password();
            $password_length = strlen($password->generate());

            $this->assertEquals(Password::DEFAULT_LENGTH, $password_length);
        }

        public function test_password_of_given_length($length = 12) {

            $password = new Password(['length' => $length]);

            $password_length = strlen($password->generate());

            $this->assertEquals($length, $password_length);
        }

    }

?>