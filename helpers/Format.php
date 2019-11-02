<?php 

	Class Format{

		public static function validation($data){
			
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		public static function formatDate($date){
			return date('F j, Y, g:i a', strtotime($date));
		}
	}