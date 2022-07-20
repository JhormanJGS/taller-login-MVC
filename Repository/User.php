<?php
    require_once '../autoload.php';
    
    class UserRepository {
        private $user_model;

        public function __construct() {
            $this->user_model = new User();    
        }

        public function login($data) {
            $this->user_model->setUsername($data['username']);
            $user = $this->user_model->login();
            return $user;
        }

        public function all () {
            $users = $this->user_model->getAll();
            return $users;
        }

        public function create ($data) {
            $this->user_model->setIdentification($data['identification']);
            $this->user_model->setName($data['name']);
            $this->user_model->setLastName($data['last_name']);
            $this->user_model->setEmail($data['email']);
            $this->user_model->setType($data['type']);
            $this->user_model->setUsername($data['username']);
            $this->user_model->setPassword($data['password']);
            $this->user_model->setDepProg($data['dep_prog']);
            $this->user_model->setStatus('INACTIVE');
            $this->user_model->setHashActivation($data['hash_activation']);
            $this->user_model->setRecoveryCode('0');

            $user = $this->user_model->create();
            return $user;
        }

        public function getByPk ($pk) {
            return $this->user_model->getByPk($pk);
        }

        public function getByHash ($hash) {
            return $this->user_model->getByHash($hash);
        }

        public function update($data) {
            $this->user_model->setIdentification($data['identification']);
            $this->user_model->setName($data['name']);
            $this->user_model->setLastName($data['last_name']);
            $this->user_model->setEmail($data['email']);
            $this->user_model->setType($data['type']);
            $this->user_model->setUsername($data['username']);
            $this->user_model->setPassword($data['password']);
            $this->user_model->setDepProg($data['dep_prog']);
            $this->user_model->setStatus($data['status']);
            $this->user_model->setHashActivation($data['hash_activation']);
            $this->user_model->setRecoveryCode($data['recovery_code']);

            $user = $this->user_model->update($data['id']);
            return $user;
        }

        public function recoveryPassword($data) {
            $user = $this->user_model->recoveryPassword($data['option_recovery'], $data['recovery']);
            return $user;
        }
    }