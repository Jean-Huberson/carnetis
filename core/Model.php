<?php
	
Class Model{
    private $_db;
    public $_table = false;
    
    function __construct(){

        /**
         *if(isset(Database::$_saveConnectionDB)): cette condition verifie si une connection à la base de données est deja etablie
        */
        if(isset(Database::$_saveConnectionDB)){
            $this->_db = Database::$_saveConnectionDB; 
            return true;

        }else{
            Database::connectDB();
            $this->_db = Database::$_saveConnectionDB; 
        } 

        if($this->_table === false){
            $this->_table =  strtolower(get_class($this));
        }
    }

    function createCustomer($request){
        if($this->_isNewCustomer($request)){
            $sql = 'INSERT INTO '.$this->_table.' (
            customers_name,
            customers_firstName,
            customers_number,
            customers_email,
            customers_password,
            customers_city,
            customers_country,
            customers_latitude,
            customers_longitude,
            customers_inscriptionDate,
            customers_address,
            customers_medias) 
            VALUES(
            :name,
            :firstName,
            :number,
            :email,
            :password, 
            :city, 
            :country, 
            :latitude, 
            :longitude, 
            :inscriptionDate, 
            :address,
            :medias)';
        
            $insertCustomer = $this->_db->prepare($sql);
            $insertCustomer->bindValue(':name', ucfirst(strtolower($request['name'])));
            $insertCustomer->bindValue(':firstName', ucfirst(strtolower($request['firstName'])));
            $insertCustomer->bindValue(':number', $request['phoneNumber']);
            $insertCustomer->bindValue(':email', $request['address']);
            $insertCustomer->bindValue(':password', $request['password']);
            $insertCustomer->bindValue(':city', ucfirst($request['city']));
            $insertCustomer->bindValue(':country', ucfirst($request['country']));
            $insertCustomer->bindValue(':latitude', 10000000000000000000);
            $insertCustomer->bindValue(':longitude', 1000000000000000000);
            $insertCustomer->bindValue(':inscriptionDate', $request['date']);
            $insertCustomer->bindValue(':address', $request['address']);
            $insertCustomer->bindValue(':medias', "null");
            if($insertCustomer->execute()){
                $session = array(
                    'name' => $request['name'],
                    'firstName' => $request['firstName'],
                    'number' => $request['phoneNumber'],
                    'email' => $request['address'],
                    'password' => $request['password'],
                    'city' => $request['city'],
                    'country' => $request['country']
                );
                Session::set('login', $session);
                Session::checkLogin();
                $insertCustomer->closeCursor(); 
                return true;
            }
        }
    }

    function _isNewCustomer($request){
        $sql = "SELECT * FROM " .$this->_table. " WHERE customers_number =:number || customers_email=:email";
        $statement = $this->_db->prepare($sql);
        $request['address'] = htmlspecialchars(trim($request['address']));
        $request['phoneNumber'] = htmlspecialchars(trim($request['phoneNumber']));
        $statement->bindValue(":number", $request['phoneNumber']);
        $statement->bindValue(":email", $request['address']);
        $statement->execute();
        $verif_customer_exists = $statement->rowCount();
        if($verif_customer_exists == 0){
            $statement->closeCursor();
            return true;
        } 
        
    }

}