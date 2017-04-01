<?php	
session_start();
Class Database{
	public $servername = 'localhost';
	public $dbname = 'diary';
	public $password = '';
	public $username = 'root';
	public $conn;

	public function __construct(){
		try {
			    $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
			    // set the PDO error mode to exception
			    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    }
		catch(PDOException $e)
		    {
		    	echo "Connection failed: " . $e->getMessage();
		    }
	}
	public function isExist($username, $password){
		$stmt = $this->conn->prepare("SELECT * FROM users WHERE users.username = '$username' AND users.password=md5('$password')"); 
 		$stmt->execute();
 		$exist = $stmt->rowCount();
 		return $exist;
	}
	public function login($username, $password){
		$stmt = $this->conn->prepare("SELECT * FROM users WHERE users.username = '$username' AND users.password=md5('$password')"); 
 		$stmt->execute();
		$result = $stmt->fetch(); 			
		$_SESSION['loggedIn'] =  true;
		$_SESSION['userId'] = $result['user_id'];
		$_SESSION['name'] = $result['first_name'];
		header("location: dashboard.php");
	}
	public function isLogin(){
		if(isset($_SESSION['loggedIn'])){
		}
		else{
			echo "
				<script>
					alert('You are not login! Please login to continue!');
					window.location = './index.php';
				</script>
			";
		}
	}
	public function getEntries(){
		$uid = $_SESSION['userId'];
		$stmt = $this->conn->prepare("SELECT * FROM entries,item WHERE entries.user_id = $uid AND entries.entry_id = item.entry_id"); 
 		$stmt->execute(); 
 		$result = $stmt->fetchAll();
 		return $result;
	}
	public function getBorderColor($eid){
		if($eid == 1){
			$border = '5px solid #ecec1c';
		}
		else if($eid == 2){	
			$border = '5px solid #f38c25';
		}
		else if($eid == 3){			
			$border = '5px solid #e10823';		
		}
		else if($eid == 4){
			$border = '5px solid #d57193';			
		}
		else if($eid == 5){
			$border = '5px solid #63519d';			
		}
		else if($eid == 6){
			$border = '5px solid #5970b3';
		}
		else if($eid == 7){
			$border = '5px solid #138047';				
		}
		else if($eid == 8){
			$border = '5px solid #85c435';			
		}
		return $border;
	}
	public function getEmotion(){
		$stmt = $this->conn->prepare("SELECT * FROM emotions"); 
 		$stmt->execute(); 
 		$result = $stmt->fetchAll();
 		return $result;
	}
	public function getBgColor($emotionId){
		if($emotionId==1){
			$color='#ecec1c';
		}
		if($emotionId==2){
			$color='#f38c25';
		}
		if($emotionId==3){
			$color='#e10823';
		}
		if($emotionId==4){
			$color='#d57193';
		}
		if($emotionId==5){
			$color='#63519d';
		}
		if($emotionId==6){
			$color='#5970b3';
		}
		if($emotionId==7){
			$color='#138047';
		}
		if($emotionId==8){
			$color='#85c435';
		}
		return $color;
	}
	public function getEmotionCount($emotionId){
		$uid = $_SESSION['userId'];
		$stmt = $this->conn->prepare("SELECT * FROM entries,item WHERE user_id = $uid AND emotion_id=$emotionId AND item.entry_id = entries.entry_id");
 		$stmt->execute();
		$count = $stmt->rowCount();
		if(!$count){
			$count = 0;
		}
		return $count;
	}
	public function getRecentEntries(){
		$uid = $_SESSION['userId'];
		$stmt = $this->conn->prepare("SELECT * FROM entries,item WHERE user_id = $uid AND item.entry_id=entries.entry_id ORDER BY entry_date DESC LIMIT 6" ); 
 		$stmt->execute(); 
 		$result = $stmt->fetchAll();
 		return $result;
	}
	public function getMealName($id){
		$stmt = $this->conn->prepare("SELECT * FROM meals WHERE meal_id=$id" ); 
 		$stmt->execute(); 
 		$result = $stmt->fetch();
 		return $result['meal_name'];
	}
	public function getMealCount($id){
		$uid = $_SESSION['userId'];
		$date = date("Y-m-d",time() + 43200);
		$stmt = $this->conn->prepare("SELECT * FROM entries,item WHERE user_id=$uid AND meal_id=$id AND item.entry_id=entries.entry_id AND DATE_FORMAT(entry_date,'%Y-%m-%d') = '$date'" ); 
		$stmt->execute();
		$count = $stmt->rowCount();
		return $count;
	}
	public function getMeals($id){
		$uid = $_SESSION['userId'];
		$date = date("Y-m-d",time() + 43200);
		$stmt = $this->conn->prepare("SELECT * FROM entries,item WHERE user_id=$uid AND meal_id=$id AND item.entry_id=entries.entry_id AND DATE_FORMAT(entry_date,'%Y-%m-%d') = '$date' ORDER BY entry_date ASC"  ); 
 		$stmt->execute(); 
 		$result = $stmt->fetchAll();
 		return $result;
	}
}


