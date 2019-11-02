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
        if(_isNewCustomer($request)){
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
            customers_address) 
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
            :address)';
    
            $insertCustomer = $this->_db->prepare($sql);
            $insertCustomer->bindValue(':nom', $request->_name);
            $insertCustomer->bindValue(':firstName', $request->_firstName);
            $insertCustomer->bindValue(':number', $request->_phoneNumber);
            $insertCustomer->bindValue(':email', $request->_email);
            $insertCustomer->bindValue(':password', $request->_password);
            $insertCustomer->bindValue(':city', $request->_city);
            $insertCustomer->bindValue(':country', $request->_country);
            $insertCustomer->bindValue(':latitude', $request->_latitude);
            $insertCustomer->bindValue(':longitude', $request->_longitude);
            $insertCustomer->bindValue(':inscriptionDate', $request->_registryDate);
            $insertCustomer->bindValue(':address', $request->_address);
            if($insertCustomer->execute()){
                $session = array(
                    'nom' => $request->_name,
                    'firstName' => $request->_firstName,
                    'number' => $request->_phoneNumber,
                    'email' => $request->_email,
                    'password' => $request->_password,
                    'city' => $request->_city,
                    'country' => $request->_country
                );
                Session::set('login', $session);
                Session::checkLogin();
                $insertCustomer->closeCursor(); 
                return true;
            }  
        }
        
    }

    function _isNewCustomer($request){
        $sql = "SELECT * FROM " .$this->_table. " WHERE customers_email=:email";
        $statement = $this->_db->prepare($sql);
        $request->_email = htmlspecialchars(trim($request->_email));
        $statement->bindValue(":email", $request->_email);
        $statement->execute();
        $verif_customer_exists = $statement->rowCount();
        if($verif_customer_exists == 0){
            $statement->closeCursor();
            return true;
        } 
        
    }

}