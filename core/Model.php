<?php
ini_set("display_errors", "on");
	
Class Model{
    private $_db;
    public $_table = false;
    
    function __construct(){

        Database::connectDB();
        $this->_db = Database::$_saveConnectionDB; 
        
        if($this->_table === false){
            echo($this->_table =  strtolower(get_class($this)));
        }
    }

    function returnUserId($request){
        $sql = "SELECT id_customers FROM " .$this->_table. " WHERE customers_number =:number and customers_email=:email";
        $statement = $this->_db->prepare($sql);
        $request['email'] = htmlspecialchars(trim($request['email']));
        $request['phoneNumber'] = htmlspecialchars(trim($request['phoneNumber']));
        $statement->bindValue(":number", $request['phoneNumber']);
        $statement->bindValue(":email", $request['email']);
        $statement->execute();
        $verif_customer_exists = $statement->rowCount();
        if($verif_customer_exists == 1){
            $user = $statement->fetch();
            $userId = $user['id_customers'];
            $statement->closeCursor();
            return $userId;
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
            customers_inscriptionDate,
            customers_medias) 
            VALUES(:name, :firstName, :number, :email, :password, :city, :country, :inscriptionDate, :medias)';
            $insertCustomer = $this->_db->prepare($sql);
            $insertCustomer->bindValue(':name', $request['name']);
            $insertCustomer->bindValue(':firstName', $request['firstName']);
            $insertCustomer->bindValue(':number', $request['phoneNumber']);
            $insertCustomer->bindValue(':email', $request['email']);
            $insertCustomer->bindValue(':password', $request['password']);
            $insertCustomer->bindValue(':city', $request['city']);
            $insertCustomer->bindValue(':country', $request['country']);
            $insertCustomer->bindValue(':inscriptionDate', "alloh");
            $insertCustomer->bindValue(':medias', "null");
            if($insertCustomer->execute()){
                $insertCustomer->closeCursor(); 
                return true;
            }
        }
    }

    function _isNewCustomer($request){
        $sql = "SELECT * FROM " .$this->_table. " WHERE customers_number =:number || customers_email=:email";
        $statement = $this->_db->prepare($sql);
        $request['email'] = htmlspecialchars(trim($request['email']));
        $request['phoneNumber'] = htmlspecialchars(trim($request['phoneNumber']));
        $statement->bindValue(":number", $request['phoneNumber']);
        $statement->bindValue(":email", $request['email']);
        $statement->execute();
        $verif_customer_exists = $statement->rowCount();
        if($verif_customer_exists == 0){
            $statement->closeCursor();
            return true;
        } 
        
    }

    function login($request){
        $sql = "SELECT * FROM " .$this->_table. " WHERE customers_email=:mail AND customers_password=:passw";
        $statement = $this->_db->prepare($sql);
        $request['email'] = htmlspecialchars(trim(strtolower($request['email'])));
        $request['password'] = htmlspecialchars(trim(strtolower($request['password'])));
        $statement->bindValue(":mail", $request['email']);
        $statement->bindValue(":passw", $request['password']);
        $statement->execute();
        $verif_customer_exists = $statement->rowCount();
        if($verif_customer_exists == 1){
            $statement->closeCursor();
            return $verif_customer_exists;
        }
        else{
            if($verif_customer_exists == 0){
                return $verif_customer_exists;
            }
        }
        return $verif_customer_exists;
    }

    function createCategory($request){
        if(($this->_isAlreadyExists($request))){
            $sql = "INSERT INTO category_events (category_events_description) VALUES(:cat_name)";
            $insertCategory = $this->_db->prepare($sql);
            $insertCategory->bindValue(':cat_name', $request);
            $insertCategory->execute();
            $insertCategory->closeCursor();
           return true;
        }
        
    }
	
    function _isAlreadyExists($req){
        $sql = 'SELECT * FROM '.$this->_table.' WHERE category_events_description=:cat_name';
        $selectCategory = $this->_db->prepare($sql);
        $selectCategory->bindValue(':cat_name', $req);
        $selectCategory->execute();
        $categoryExists = $selectCategory->rowCount();
        if($categoryExists == 0){
        $selectCategory->closeCursor();
        return true;
        }
    }

    function getCategory($request){
        $sql = 'SELECT id_category_events FROM '.$this->_table.' WHERE category_events_description=:cat_name';
        $selectCategory = $this->_db->prepare($sql);
        $selectCategory->bindValue(':cat_name', $request);
        $selectCategory->execute();
        $category = $selectCategory->fetch();
        $selectCategory->closeCursor();
        return $category;
    }

    function createEvent($request){
       if($this->_isNewEvent($request)){
        $sql = 'INSERT INTO '.$this->_table.' (
            events_title, 
            events_description, 
            events_dateBegin, 
            events_dateEnd, 
            events_price, 
            events_country, 
            events_city, 
            events_section, 
            events_region, 
            events_structure, 
            events_timeBegin, 
            events_timeEnd, 
            customers_id_customers, 
            category_events_id_category_events,
            events_updateDate,
            events_deleteDate,
            events_valid) 
            VALUES (
            :title, 
            :description, 
            :dateBegin, 
            :dateEnd, 
            :price, 
            :country, 
            :city, 
            :section, 
            :region, 
            :structure, 
            :timeBegin, 
            :timeEnd, 
            :id_customers, 
            :id_category, 
            :updateDate,
            :deleteDate, 
            :valid)';
          
            $insertEvent = $this->_db->prepare($sql);
            $insertEvent->bindValue(':title', $request['title']);
            $insertEvent->bindValue(':description', $request['description']);
            $insertEvent->bindValue(':dateBegin', $request['dateBegin']);
            $insertEvent->bindValue(':dateEnd', $request['dateEnd']);
            $insertEvent->bindValue(':price', $request['price']);
            $insertEvent->bindValue(':country', $request['country']);
            $insertEvent->bindValue(':city', $request['city']);
            $insertEvent->bindValue(':section', $request['section']);
            $insertEvent->bindValue(':region', $request['region']);
            $insertEvent->bindValue(':structure', $request['structure']);
            $insertEvent->bindValue(':timeBegin', $request['timeBegin']);
            $insertEvent->bindValue(':timeEnd', $request['timeEnd']);
            $insertEvent->bindValue(':id_customers', 1 /*$request['id_sender']*/);
            $insertEvent->bindValue('id_category', $request['category_id']);
            //$insertEvent->bindValue(':createDate', $request['createDate']);
            $insertEvent->bindValue(':updateDate', $request['updateDate']);
            $insertEvent->bindValue(':deleteDate', $request['deleteDate']);
            $insertEvent->bindValue(':valid', $request['valid']);
            if($insertEvent->execute()){
                echo "OK";
                $insertEvent->closeCursor();
                return true;
            }
            return false;
       }
    }

    function _isNewEvent($request){
        $sql = 'SELECT id_events FROM '.$this->_table.' WHERE(
        events_title=:title AND 
        events_description=:description AND 
        events_dateBegin=:dateBegin AND 
        events_dateEnd=:dateEnd AND
        events_price=:price AND 
        events_country=:country AND 
        events_city=:city AND 
        events_section=:section AND 
        events_region=:region AND
        events_structure=:structure AND 
        events_timeBegin=:timeBegin AND 
        events_timeEnd=:timeEnd AND
        customers_id_customers=:id_customers AND 
        category_events_id_category_events=:id_category)';

        $selectEvent = $this->_db->prepare($sql);
        $selectEvent->bindValue(':title', $request['title']);
        $selectEvent->bindValue(':description', $request['description']);
        $selectEvent->bindValue(':dateBegin', $request['dateBegin']);
        $selectEvent->bindValue(':dateEnd', $request['dateEnd']);
        $selectEvent->bindValue(':price', $request['price']);
        $selectEvent->bindValue(':country', $request['country']);
        $selectEvent->bindValue(':city', $request['city']);
        $selectEvent->bindValue(':section', $request['section']);
        $selectEvent->bindValue(':region', $request['region']);
        $selectEvent->bindValue(':structure', $request['structure']);
        $selectEvent->bindValue(':timeBegin', $request['timeBegin']);
        $selectEvent->bindValue(':timeEnd', $request['timeEnd']);
        $selectEvent->bindValue(':id_customers',1 /*$request['id_sender']*/);
        $selectEvent->bindValue('id_category', $request['category_id']);
        $selectEvent->execute();
        $eventRow = $selectEvent->rowCount();
        if($eventRow === 0){
            $selectEvent->closeCursor();
            return true;
        }
        else{
            echo'cet evenement existe deja';
            return false;
        }
            
        
    }

    function getIdEvent($request){
        $sql = 'SELECT id_events FROM '.$this->_table.' WHERE(
        events_title=:title AND 
        events_description=:description AND 
        events_dateBegin=:dateBegin AND 
        events_dateEnd=:dateEnd AND
        events_price=:price AND 
        events_country=:country AND 
        events_city=:city AND 
        events_section=:section AND 
        events_region=:region AND
        events_structure=:structure AND 
        events_timeBegin=:timeBegin AND 
        events_timeEnd=:timeEnd AND
        customers_id_customers=:id_customers AND 
        category_events_id_category_events=:id_category)';
        $selectEvent = $this->_db->prepare($sql);
        $selectEvent->bindValue(':title', $request['title']);
        $selectEvent->bindValue(':description', $request['description']);
        $selectEvent->bindValue(':dateBegin', $request['dateBegin']);
        $selectEvent->bindValue(':dateEnd', $request['dateEnd']);
        $selectEvent->bindValue(':price', $request['price']);
        $selectEvent->bindValue(':country', $request['country']);
        $selectEvent->bindValue(':city', $request['city']);
        $selectEvent->bindValue(':section', $request['section']);
        $selectEvent->bindValue(':region', $request['region']);
        $selectEvent->bindValue(':structure', $request['structure']);
        $selectEvent->bindValue(':timeBegin', $request['timeBegin']);
        $selectEvent->bindValue(':timeEnd', $request['timeEnd']);
        $selectEvent->bindValue(':id_customers', 1 /*$request['id_sender']*/);
        $selectEvent->bindValue('id_category', $request['category_id']);
        $selectEvent->execute();
        $eventRow = $selectEvent->rowCount();
        if($eventRow == 1){
            $event = $selectEvent->fetch();
            $event_id = $event['id_events'];
            echo($event_id);
            $selectEvent->closeCursor();
            return $event_id;
        }
            
            
    }

    function insertMediasForEvent($request){
        if($this->_isNewFile($request)){
            $sql = 'INSERT INTO '.$this->_table.' (
            medias_events_description,
            events_id_events) 
            VALUES(:filepath, :id_events)';
            $insertCustomer = $this->_db->prepare($sql);
            $insertCustomer->bindValue(':filepath', $request['new_filepath']);
            $insertCustomer->bindValue(':id_events', $request['event_id']);
            if($insertCustomer->execute()){
                $insertCustomer->closeCursor(); 
                echo('file enregistré');
                return true;
            }
            return false;
        }

    }

    function _isNewFile($request){
        $sql = 'SELECT * FROM '.$this->_table.' WHERE medias_events_description=:filepath';
        $selectFile = $this->_db->prepare($sql);
        $selectFile->bindValue(':filepath', $request['new_filepath']);
        $selectFile->execute();
        $fileExists = $selectFile->rowCount();
        if($fileExists == 0){
        $selectFile->closeCursor();
        return true;
        }
        else{
            echo('ce fichier existe deja');
            return false;
        }

    }



}