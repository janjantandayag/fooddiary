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
			$border = '3px dotted green';
		}
		else if($eid == 2){	
			$border = '3px dotted blue';
		}
		else if($eid == 3){			
			$border = '3px dotted red';		
		}
		else if($eid == 4){
			$border = '3px dotted orange';			
		}
		else if($eid == 5){
			$border = '3px dotted violet';			
		}
		else if($eid == 6){
			$border = '3px dotted yellow';			
		}
		else if($eid == 7){
			$border = '3px dotted pink';				
		}
		else if($eid == 8){
			$border = '3px dotted black';			
		}
		return $border;
	}
	public function getData(){		
		$uid = $_SESSION['userId'];
		$emotionId = [1,2,3,4,5,6,7,8];
		$data = [];
		foreach ($emotionId as $eid) {
			$stmt = $this->conn->prepare("SELECT emotions.emotion_name,entries.user_id,entries.emotion_id FROM entries,emotions WHERE entries.user_id = $uid AND entries.emotion_id = $eid AND entries.emotion_id = emotions.emotion_id");
	 		$stmt->execute();
			$count = $stmt->rowCount();
 			$result = $stmt->fetchAll();
 			$data['data'] = $count;
		}
		return $data;
	}
}




