<?php
class CustomerController extends Controller{

    function login(){
       $this->loadModel('Customers');
         
    }

    function register(){
        $data = $this->_request->_data;
        if(isset($data['name'], $data['firstName'], $data['address'], $data['city'], $data['country'], $data['phoneNumber'], $data['password'], $data['confirmPassword']) && 
        !empty($data['name']) && !empty($data['firstName']) && !empty($data['address']) && !empty($data['city']) && !empty($data['country']) && 
        !empty($data['phoneNumber']) && !empty($data['password']) && !empty($data['confirmPassword'])){
            $city =  $this->_format->validateSimpleString($data['city']);
            $country = $this->_format->validateSimpleString($data['country']);
            $name = $this->_format->validateName($data['name']);
            $firstName = $this->_format->validateName($data['firstName']);
            $address = $this->_format->validateEmail($data['address']);
            $phoneNumber = $this->_format->validateNumber($data['phoneNumber']);
            $date = $this->_format->formatDate();
            if($this->_format->validatePassword($data['password'], $data['confirmPassword'])){
                $password = md5($this->_format->validatePassword($data['password'], $data['confirmPassword']));
                $password;
                $this->loadModel('Customers');
                $this->Customers->createCustomer(array(
                    'name' => $name,
                    'firstName' => $firstName,
                    'address' => $address,
                    'phoneNumber' => $phoneNumber,
                    'date' => $date,
                    'password' => $password,
                    'country' => $country,
                    'city' => $city
                ));
            }else{
                $_invalidPassword = $this->_format->_message['invalidPassword'];
            }
        }
            
        
        if(empty($data['name']) || isset($this->_format->_message['invalidName'])){
            $_invalidName = 'Nom invalide';
        }
        else{
            $_invalidName = "";
        }
        if(empty($data['firstName']) || isset($this->_format->_message['invalidName'])){
            $_invalidFirstName = 'Prénom invalide';
        }
        else{
            $_invalidFirstName = "";
        }
        if(empty($data['email']) || isset($this->_format->_message['invalidEmail'])){
            $_invalidEmail = 'Email invalide';
        }
        else{
            $_invalidEmail = "";
        }
        if(empty($data['phoneNumber']) || isset($this->_format->_message['invalidNumber'])){
            $_invalidNumber = 'Numéro invalide';
        }
        else{
            $_invalidNumber = "";
        }
        if(empty($data['address'])){
            $_invalidAddress = "Adresse invalide";
        }
        else{
            $_invalidAddress = "";
        }
        if(empty($data['city'])){
            $_invalidCity = "Ville invalide";
        }
        else{
            $_invalidCity = "";
        }
        if(empty($data['country'])){
            $_invalidCountry = "Pays invalide";
        }
        else{
            $_invalidCountry = "";
        }
        
    }


}