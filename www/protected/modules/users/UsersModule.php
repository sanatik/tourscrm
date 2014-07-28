<?php

class UsersModule extends CWebModule {
    /**
     * Type of hash to use for passwords. Any algorithm supported by the hash function
     * can be used here. Note that the length of your password is determined by the
     * hash type + the number of salt characters.
     * @see http://php.net/hash
     * @see http://php.net/hash_algos
     */
    private $hash_method = 'sha1';
    /**
     * Defines the hash offsets to insert the salt at. The password hash length
     * will be increased by the total number of offsets.
     */
    private $salt_pattern = '1, 3, 7, 11, 13, 15, 18, 21, 25, 30';

    public function init() {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application

        $endName = Yii::app()->endName;
        $this->setImport(array(
            "users.models.*",
            "points.models.*",
            "users.{$endName}.components.*",
        ));
        Yii::app()->onModuleCreate(new CEvent($this));
    }

    private function generateSalt() {
        if (!is_array($this->salt_pattern)) {
            $this->salt_pattern = preg_split('/,\s*/', $this->salt_pattern);
        }
    }

    public function validatePassword($password, $checkPassword) {
        $this->generateSalt();
        // Get the salt from the stored password
        $salt = $this->findSalt($password);
        // Create a hashed password using the salt from the stored password
        $checkPassword = $this->hashPassword($checkPassword, $salt);

        if ($password == $checkPassword) {
            return true;
        }

        return false;
    }

    /**
     * Creates a hashed password from a plaintext password, inserting salt
     * based on the configured salt pattern.
     *
     * @param   string  plaintext password
     * @return  string  hashed password string
     */
    public function hashPassword($password, $salt = FALSE) {

        $this->generateSalt();

        if ($salt === FALSE) {
            // Create a salt seed, same length as the number of offsets in the pattern
            $salt = substr($this->hash(uniqid(NULL, TRUE)), 0, count($this->salt_pattern));
        }

        // Password hash that the salt will be inserted into
        $hash = $this->hash($salt . $password);

        // Change salt to an array
        $salt = str_split($salt, 1);


        // Returned password
        $password = '';

        // Used to calculate the length of splits
        $last_offset = 0;

        foreach ($this->salt_pattern as $i => $offset) {
            // Split a new part of the hash off
            $part = substr($hash, 0, $offset - $last_offset);

            // Cut the current part out of the hash
            $hash = substr($hash, $offset - $last_offset);

            // Add the part to the password, appending the salt character
            $password .= $part . array_shift($salt);

            // Set the last offset to the current offset
            $last_offset = $offset;
        }
        // Return the password, with the remaining hash appended
        return $password . $hash;
    }

    /**
     * Perform a hash, using the configured method.
     *
     * @param   string  string to hash
     * @return  string
     */
    public function hash($str) {

        return hash($this->hash_method, $str);
    }

    /**
     * Finds the salt from a password, based on the configured salt pattern.
     *
     * @param   string  hashed password
     * @return  string
     */
    public function findSalt($password) {

        $salt = '';

        foreach ($this->salt_pattern as $i => $offset) {
            // Find salt characters, take a good long look...
            $salt .= $password[$offset + $i];
        }

        return $salt;
    }


    public function generatePassword($number) {
        $arr = array('a', 'b', 'c', 'd', 'e', 'f',
            'g', 'h', 'i', 'j', 'k', 'l',
            'm', 'n', 'o', 'p', 'r', 's',
            't', 'u', 'v', 'x', 'y', 'z',
            'A', 'B', 'C', 'D', 'E', 'F',
            'G', 'H', 'I', 'J', 'K', 'L',
            'M', 'N', 'O', 'P', 'R', 'S',
            'T', 'U', 'V', 'X', 'Y', 'Z',
            '1', '2', '3', '4', '5', '6',
            '7', '8', '9', '0');
        // Генерируем пароль
        $pass = "";
        for ($i = 0; $i < $number; $i++) {
            // Вычисляем случайный индекс массива
            $index = rand(0, count($arr) - 1);
            $pass .= $arr[$index];
        }
        return $pass;
    }


}
