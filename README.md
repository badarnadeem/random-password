# Random Password Generator

Generate random passwords of different types and lengths

## Installation

Install the package using the following composer command

`

    composer require badarnadeem/random-password


`

## Usage

Using the Password class to generate random passwords

`

    <?php

        use BadarNadeem\RandomPassword\Password;

        $password = new Password();

        print_r($password->generate());

    ?>

`

## Set Password Length and Strength

Pass in custom length and strength for your passwords. The default password length is set to 8 and default strength is set to strong.

`

    <?php

        use BadarNadeem\RandomPassword\Password;
        use BadarNadeem\RandomPassword\PasswordStrength;

        $password = new Password([
            'length' => 12,
            'strength' => PasswordStrength::STRONG
        ]);

    ?>


`

## Password Strength Options

The following 3 options are available for password strength

`

    <?php

        use BadarNadeem\RandomPassword\PasswordStrength;

        PasswordStrength::STRONG
        PasswordStrength::MEDIUM
        PasswordStrength::WEAK

    ?>


`