<?php
    require_once '../autoload.php';
    
    class User {
        private $identification;
        private $name;
        private $last_name;
        private $email;
        private $type;
        private $username;
        private $password;
        private $dep_prog;
        private $status;
        private $hash_activation;
        private $recovery_code;
        private $DataBase;

        public function __construct() {
			$this->identification = "";
            $this->name = "";
            $this->last_name = "";
            $this->email = "";
            $this->type = "";
            $this->username = "";
            $this->password = "";
            $this->dep_prog = "";
            $this->status = "";
            $this->hash_activation = "";
            $this->recovery_code = "";

            $connection = new Conexion();
            $this->DataBase = $connection->get_conexion();
		}

        /* --------------------------------- SET ----------------------------------- */
        public function setIdentification($identification) { $this->identification = $identification; }
        public function setName($name) { $this->name = $name; }
        public function setLastName($last_name) { $this->last_name = $last_name; }
        public function setEmail($email) { $this->email = $email; }
        public function setType($type) { $this->type = $type; }
        public function setUsername($username) { $this->username = $username; }
        public function setPassword($password) { $this->password = $password; }
        public function setDepProg($dep_prog) { $this->dep_prog = $dep_prog; }
        public function setStatus($status) { $this->status = $status; }
        public function setHashActivation($hash_activation) { $this->hash_activation = $hash_activation; }
        public function setRecoveryCode($recovery_code) { $this->recovery_code = $recovery_code; }

        /* --------------------------------- GET ----------------------------------- */
        public function getIdentification () {return $this->identification; }
        public function getName() { return $this->name; }
        public function getLastName() { return $this->last_name; }
        public function getEmail() { return $this->email; }
        public function getType() { return $this->type; }
        public function getUsername() { return $this->username; }
        public function getPassword() { return $this->password; }
        public function getDepProg() { return $this->dep_prog; }
        public function getStatus() { return $this->status; }
        public function getHashActivation() { return $this->hash_activation; }
        public function getRecoveryCode() { return $this->recovery_code; }

        /* --------------------------------- METHODS FOR USER TABLE ----------------------------------- */
        public function getAll(){
            try {
		    	$sql = "SELECT * FROM users";
		    	$query = $this->DataBase->prepare($sql);
		    	$query->execute();
		    	$data = $query->fetchAll(PDO::FETCH_CLASS);
		    	$response = ['status' => 1, 'users' => $data];
	    	} catch (Exception $e) {
	    		$response = ['status' => 0, 'error' => $e];
	    	}
            return $response;
        }

        public function getByPk($pk){
	    	try {
	    		$sql = "SELECT * FROM users WHERE id=?";
	    		$query = $this->DataBase->prepare($sql);
	    		$data = [$pk];
	    		$query->execute($data);
	    		$user = $query->fetch(PDO::FETCH_ASSOC);
	    		$response = ['status' => 1, 'user' => $user];
	    	} catch (Exception $e) {
				$response = ['status' => 0, 'error' => $e];	    		
	    	}

	    	return $response;
	    }

        public function getByHash($hash){
	    	try {
	    		$sql = "SELECT * FROM users WHERE hash_activation=?";
	    		$query = $this->DataBase->prepare($sql);
	    		$data = [$hash];
	    		$query->execute($data);
	    		$user = $query->fetch(PDO::FETCH_ASSOC);
	    		$response = ['status' => 1, 'user' => $user];
	    	} catch (Exception $e) {
				$response = ['status' => 0, 'error' => $e];	    		
	    	}

	    	return $response;
	    }

        public function create() {
            try {
	    		$sql = "INSERT INTO users (identification, name, last_name, email, type, username, password, dep_prog, status, hash_activation, recovery_code) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
                $query = $this->DataBase->prepare($sql);
	    		$data = [
                    $this->getIdentification(), $this->getName(), $this->getLastName(), $this->getEmail(),
                    $this->getType(), $this->getUsername(), $this->getPassword(), $this->getDepProg(), 
                    $this->getStatus(), $this->getHashActivation(), $this->getRecoveryCode()];

	    		$query->execute($data);
	    		$response = ['status' => 1, 'message' => "Usuario creado correctamente"];
	    	} catch (Exception $e) {
	    		$response = ['status' => 0, 'error' => $e];	   
	    	}
	    	return $response;
        }

        public function update($id) {
            try {
	    		$sql = "UPDATE users SET identification=?, name=?, last_name=?, email=?, type=?, username=?,
                password=?, dep_prog=?, status=?, hash_activation=?, recovery_code=? WHERE id=?";
                $query = $this->DataBase->prepare($sql);

	    		$data = [
                    $this->getIdentification(), $this->getName(), $this->getLastName(), $this->getEmail(),
                    $this->getType(), $this->getUsername(), $this->getPassword(), $this->getDepProg(), 
                    $this->getStatus(), $this->getHashActivation(), $this->getRecoveryCode(), $id
                ];

	    		$query->execute($data);
	    		$response = ['status' => 1, 'message' => "Usuario actulizado correctamente"];
	    	} catch (Exception $e) {
	    		$response = ['status' => 0, 'error' => $e];	   
	    	}
	    	return $response;
        }

        public function login() {
            try {
	    		$sql = "SELECT * FROM users WHERE username = ? AND status = ?";
	    		$query = $this->DataBase->prepare($sql);
	    		$data = [$this->getUsername(), 'ACTIVE'];
	    		$query->execute($data);
	    		$user = $query->fetch(PDO::FETCH_ASSOC);
	    		$response = ['status' => 1, 'user' => $user];
	    	} catch (Exception $e) {
				$response = ['status' => 0, 'error' => $e];	    		
	    	}
	    	return $response;
        }

        public function recoveryPassword($type, $value) {
            try {
                $sql = "SELECT * FROM users WHERE {$type} = ?";
                $query = $this->DataBase->prepare($sql);
	    		$data = [$value];
                $query->execute($data);
	    		$user = $query->fetch(PDO::FETCH_ASSOC);
	    		$response = ['status' => 1, 'user' => $user];
            } catch (Exception $e) {
                $response = ['status' => 0, 'error' => $e];
            }
            return $response;
        }
    }