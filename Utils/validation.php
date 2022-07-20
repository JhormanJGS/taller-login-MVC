<?php
    require_once '../autoload.php';
    use Rakit\Validation\Validator;
    
    class Validation {
        
        private $validator;

        public function __construct() {
            $this->validator = new Validator;
		}

        public function validateData($data, $validations, $alises) {
            $validation = $this->validator->make($data, $validations);
            $validation->setAliases($alises);

            $validation->validate();
            
            if ($validation->fails()) {
                $errors = $validation->errors();
                return ['status' => 1, 'messages' => $errors->firstOfAll()];
            } else {
                return ['status' => 0 , 'messages' => 'No erros'];
            }
        }
    }