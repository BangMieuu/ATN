<?php class DBConnector {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "atm-toys";
	private $conn;
	
	function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		$conn = pg_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
	
	function runQuery($query) {
		$result = pg_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = pg_query($this->conn,$query);
		$rowcount = pg_num_rows($result);
		return $rowcount;	
	}
        
        function add($query) {
           $result = pg_query($this->conn, $query);
            return $result;
        }
        
        function printError() {
            return pg_error($this->conn);
        }
}

//	 $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=atm-toys', 'root', '');
//		echo "done";
//		$db = parse_url(getenv("DATABASE_URL"));
//		$pdo = new PDO("pgsql:" . sprintf(
//		    "host=%s;port=%s;user=%s;password=%s;dbname=%s",
//		    $db["host"],
//		    $db["port"],
//		    $db["user"],
//		    $db["pass"],
//		    ltrim($db["path"], "/")
//		));
//		
//		$sql = "SELECT * FROM tblproduct";
//		$stmt = $pdo->prepare($sql);
//		//Thi?t l?p ki?u d? li?u tr? v?
//		$stmt->setFetchMode(PDO::FETCH_ASSOC);
//		$stmt->execute();
//		$resultSet = $stmt->fetchAll();
//				
//	
//		  
//			foreach ($resultSet as $row) {
//			echo '<li>' .
//				$row['product'] . ' --' . $row['tblproduct'] 
//				. '</li>';
//			}
//		

//
//  
?>