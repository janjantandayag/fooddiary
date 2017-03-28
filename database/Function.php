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
		$_SESSION['name'] = $result['name'];
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
		$stmt = $this->conn->prepare("SELECT * FROM entries WHERE user_id = $uid"); 
 		$stmt->execute(); 
 		$result = $stmt->fetchAll();
 		return $result;
	}
	public function getBorderColor($eid){
		if($eid == 1){
			$border = '3px solid green';
		}
		else if($eid == 2){	
			$border = '3px solid blue';
		}
		else if($eid == 3){			
			$border = '3px solid red';		
		}
		else if($eid == 4){
			$border = '3px solid orange';			
		}
		else if($eid == 5){
			$border = '3px solid violet';			
		}
		else if($eid == 6){
			$border = '3px solid yellow';			
		}
		else if($eid == 7){
			$border = '3px solid pink';				
		}
		else if($eid == 8){
			$border = '3px solid black';			
		}
		return $border;
	}
	public function getEmotion(){
		$stmt = $this->conn->prepare("SELECT * FROM emotions"); 
 		$stmt->execute(); 
 		$result = $stmt->fetchAll();
 		return $result;
	}
	public function getEmotionCount($emotionId){
		$uid = $_SESSION['userId'];
		$stmt = $this->conn->prepare("SELECT * FROM entries WHERE user_id = $uid AND emotion_id=$emotionId");
 		$stmt->execute();
		$count = $stmt->rowCount();
		if(!$count){
			$count = 0;
		}
		return $count;
	}
	public function getRecentEntries(){
		$uid = $_SESSION['userId'];
		$stmt = $this->conn->prepare("SELECT * FROM entries WHERE user_id = $uid ORDER BY entry_date DESC LIMIT 6" ); 
 		$stmt->execute(); 
 		$result = $stmt->fetchAll();
 		return $result;
	}
}

	// $test = new Database;
	// $test->getData();




