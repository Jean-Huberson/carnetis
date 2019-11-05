<?php
class CustomerController extends Controller{
    
    function login(){
        $data = $this->_request->_data;
        $this->loadModel('Customers');
        if(isset($data['email'], $data['password']) && !empty($data['email']) && !empty($data['password'])){
            $email = $this->_format->validateEmail($data['email']);
            $password = $this->_format->validatePasswordLog($data['password']);
            $password = md5($password);
            $array_customer = array(
                'email' => $email,
                'password' => $password
            );
            $result = $this->Customers->login($array_customer);
            $customer_id = $this->Customers->returnUserId($array_customer);

            if($result ==1){
               $session = array('email' =>  $email, 'password' => $password, 'id_customers' => $customer_id);
               $this->_session->setSession('login',$session);
               $this->_session->checkLogin('login');
               $this->set('session', $this->_session->getSession()); 
               $log_errors = "";
               $this->set('log_errors', $log_errors);
            }
            else{
               $log_errors = "Désolé, ce compte n'existe pas!";
               $this->set('log_errors', $log_errors);
            }   
       }    
    }

    function logout(){
        $this->_session->checkSession();
    }

    function register(){
        $data = $this->_request->_data;
        if(isset($data['name'], $data['firstName'], $data['email'], $data['city'], $data['country'], $data['phoneNumber'], $data['password'], $data['confirmPassword']) && 
        !empty($data['name']) && !empty($data['firstName']) && !empty($data['email']) && !empty($data['city']) && !empty($data['country']) && 
        !empty($data['phoneNumber']) && !empty($data['password']) && !empty($data['confirmPassword'])){
            $city =  $this->_format->validateSimpleString($data['city']);
            $country = $this->_format->validateSimpleString($data['country']);
            $name = $this->_format->validateName($data['name']);
            $firstName = $this->_format->validateName($data['firstName']);
            $email = $this->_format->validateEmail($data['email']);
            $phoneNumber = $this->_format->validateNumber($data['phoneNumber']);
            $date = $this->_format->formatDate();
            
            if($this->_format->validatePassword($data['password'], $data['confirmPassword'])){
                $password = md5($this->_format->validateSimpleString($data['password']));
                
                $this->loadModel('Customers');
                $arr = array(
                    'name' => $name,
                    'firstName' => $firstName,
                    'phoneNumber' => $phoneNumber,
                    'email' => $email,
                    'date' => $date,
                    'password' => $password,
                    'country' => $country,
                    'city' => $city
                );
                $callback = $this->Customers->createCustomer($arr);
                $customer_id = $this->Customers->returnUserId($arr);

                if($callback){
                    $session = array(
                        'id_customer' => $customer_id,
                        'name' => $name,
                        'firstName' =>$firstName,
                        'number' => $phoneNumber,
                        'email' => $email,
                        'password' => $password,
                        'city' => $city,
                        'country' => $country
                    );
                    $this->_session->setSession('login',$session);
                    $this->_session->checkLogin('login');
                    $this->set('session', $this->_session->getSession());
                }
            }else{
                $_invalidPassword = $this->_format->_message['invalidPassword'];
                $this->set('invalidPassword',$_invalidPassword);
            }
        }
            
        if(empty($data['name']) || isset($this->_format->_message['invalidName'])){
            $_invalidName = 'Nom invalide';
            $this->set('invalidName', $_invalidName);
        }
        else{
            $_invalidName = "";
        }
        if(empty($data['firstName']) || isset($this->_format->_message['invalidName'])){
            $_invalidFirstName = 'Prénom invalide';
            $this->set('invalidFisrtName', $_invalidFirstName);
        }
        else{
            $_invalidFirstName = "";
        }
        if(empty($data['email']) || isset($this->_format->_message['invalidEmail'])){
            $_invalidEmail = 'Email invalide';
            $this->set('invalidEmail', $_invalidEmail);
        }
        else{
            $_invalidEmail = "";
        }
        if(empty($data['phoneNumber']) || isset($this->_format->_message['invalidNumber'])){
            $_invalidNumber = 'Numéro invalide';
            $this->set('invalidNumber', $_invalidNumber);
        }
        else{
            $_invalidNumber = "";
        }
        
        if(empty($data['city'])){
            $_invalidCity = "Ville invalide";
            $this->set('invalidCity', $_invalidCity);
        }
        else{
            $_invalidCity = "";
        }
        if(empty($data['country'])){
            $_invalidCountry = "Pays invalide";
            $this->set('invalidCountry', $_invalidCountry);
        }
        else{
            $_invalidCountry = "";
        }
        
    }


}