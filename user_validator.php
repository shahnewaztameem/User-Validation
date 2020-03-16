<?php

 class UserValidator {
     private $data;
     private $errors = [];
     private static $fields = ['username', 'email'];

     public function __construct($form_data) {
         $this->data = $form_data;
     }

     public function validateForm() {
        foreach(self::$fields as $field) {
            if(!array_key_exists($field,$this->data)){
                trigger_error("$field is not present");
                return;
            }
        }
        $this->validateUsername();
        $this->validateEmail();
     }

     private function validateUsername() {
        $username = trim($this->data['username']);
        if(empty($username)) {
            $this->addErrors('username', 'Username can not be empty');
        }
        else {
            if(!preg_match('/^[a-zA-z0-9]{6,12}$/', $username)) {
                $this->addErrors('username', 'Username must be 6-12 characters long and alphanumeric');
            }
        }
     }

     private function validateEmail() {
        $email = trim($this->data['email']);
        if(empty($email)) {
            $this->addErrors('email', 'Email can not be empty');
        }
        else {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->addErrors('email', 'Invalid email address');
            }
        }
     }

     private function addErrors($key, $message) {
        $this->errors[$key] = $message;
     }
 }