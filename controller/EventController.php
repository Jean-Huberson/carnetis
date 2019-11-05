<?php
class EventController extends Controller{
    const _VALID = 'NO';
    var $_events_updateDate = "NONE";
    var $_events_deleteDate= "NONE";

    function category(){

    }

    function events(){

    }

    function event_edit(){
        if(!isset($_SESSION) && !empty($_SESSION)){
            header('Location:'.BASE_URL.DS.'customer'.DS.'login');
        }
        
        $data = $this->_request->_data;
        $files = $this->_request->_files;
        
        if(isset($data['category'], $data['title'], $data['beginDate'], 
        $data['endDate'], $data['beginTime'], $data['endTime'], 
        $data['country'], $data['city'], $data['region'], $data['section'], $data['structure'], 
        $data['description'], $data['price'], $data['id_sender'], $files['file']['name']) && 
        !empty($data['category']) && !empty($data['title']) && !empty($data['beginDate']) 
        && !empty($data['endDate']) && !empty($data['beginTime']) 
        && !empty($data['endTime']) && !empty($data['country']) && !empty($data['city']) 
        && !empty($data['region']) && !empty($data['section']) && !empty($data['structure']) 
        && !empty($data['price']) && !empty($files['file']['name'])){
            $category = $this->_format->validateSimpleString($data['category']);
            $title = $this->_format->validateSimpleString($data['title']);
            $dateBegin = $this->_format->validateSimpleString($data['beginDate']);
            $dateEnd = $this->_format->validateSimpleString($data['endDate']);
            $timeBegin = $this->_format->validateSimpleString($data['beginTime']);
            $timeEnd = $this->_format->validateSimpleString($data['endTime']);
            $country = $this->_format->validateSimpleString($data['country']);
            $city = $this->_format->validateSimpleString($data['city']);
            $region = $this->_format->validateSimpleString($data['region']);
            $section = $this->_format->validateSimpleString($data['section']);
            $structure = $this->_format->validateSimpleString($data['structure']);
            $description = $this->_format->validateSimpleString($data['description']);
            $price = $this->_format->validateSimpleString($data['price']);
            $user = $this->_session->getSession("login");
            print_r($user);
            //$id_sender = 
            $createDate = $this->_format->formatDate();
            $updateDate = $this->_events_updateDate;
            $deleteDate = $this->_events_deleteDate;
            
            $category = strtolower($data['category']);
            $this->loadModel('Category_events');
            $this->Category_events->createCategory($category);
            $cat_info = $this->Category_events->getCategory($category);
            $category_id = $cat_info['id_category_events'];
            
            /***
             * createEvent() permet d'inserer un evenement 
             */

            $arrayEvent = array(
            'category_id' => $category_id,
            'title'  => $title,
            'dateBegin'  => $dateBegin,
            'dateEnd'  => $dateEnd,
            'timeBegin'  => $timeBegin,
            'timeEnd'  => $timeEnd,
            'country'  => $country,
            'city'  => $city,
            'price'  => $price,
            'region'  => $region,
            'section'  => $section,
            'structure'  => $structure,
            'description'  => $description,
            //'id_sender'  => $id_sender,
            'updateDate' => $updateDate,
            'deleteDate' => $deleteDate,
            'valid' => self::_VALID);
            $this->loadModel('Events');

            if($this->Events->createEvent($arrayEvent)){
                $event_id = $this->Events->getIdEvent($arrayEvent);

            /**
            * traitement des fichiers images
            */ 
            $countFile = count($files['file']['name']);
            
            for($i = 0; $i < $countFile; $i++){
                $fileName = $files['file']['name'][$i];
                if(isset($fileName) && !empty($fileName) && $files['file']['size'][$i] > 0){
                    // obtention de l'extension
                    $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                    if(in_array($ext, array('jpg', 'jpeg', 'png'))){
                    // verification du type de fichier 
                    $filename_without_ext = basename($fileName, '.'.$ext);
                    $new_filename = str_replace('', '_', $filename_without_ext).'_'.time().'.'.$ext; 
                    $directory = WEBROOT.DS.'img'.DS.date('d-m-Y');
                    if(!file_exists($directory))mkdir($directory, 0777);
                    move_uploaded_file($files['file']['tmp_name'][$i], $directory.DS.$new_filename);
                    $this->loadModel('Medias_events');
                    $new_filepath = 'img'.DS.date('d-m-Y').DS.$new_filename;
                        if(isset($event_id)){
                            $this->Medias_events->insertMediasForEvent(array(
                                'new_filepath' => $new_filepath,
                                'event_id' => $event_id
                            ));
                            $messageFile = "ok";
                            $this->set('messageFile', $messageFile);
                        }else{
                        $messageFile = "Erreur lors du Téléchargment...";
                        $this->set('messageFile', $messageFile);
                        }
                    
                    }
                    else{
                        $messageFile = "Désolé, veuillez choisir des images";
                        $this->set('messageFile', $messageFile);
                    }                            
                }                            
            }


            }
            
        }
    }

    function getCategoryId(){
        
    }
    
    function events_update(){

    }

    function events_delete(){

    }
}