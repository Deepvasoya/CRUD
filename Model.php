<?php
   class Model{
   	   private $server = "localhost";
		private $username = "root";
		private $password;
		private $db = "practical";
		private $conn;

		// databse connection

		public function __construct(){
			try {
				
				$this->conn = new mysqli($this->server,$this->username,$this->password,$this->db);
			} catch (Exception $e) {
				echo "connection failed" . $e->getMessage();
			}
		}


		// insert data
		public function insert(){
			if (isset($_POST['submit'])){
				if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['country'])) {
					if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['country']) ) {
						
						$fname = $_POST['fname'];
						$lname = $_POST['lname'];
						$address = $_POST['address'];
						$city = $_POST['city'];
						$country = $_POST['country'];
						

						$query = "INSERT INTO `practical` (`fname`, `lname`, `address`, `city`, `country`) VALUES ('$fname', '$lname', '$address', '$city', '$country')";
						if ($sql = $this->conn->query($query)) {
							echo "<script>alert('records added successfully');</script>";
							echo "<script>window.location.href = 'index.php';</script>";
						}else{
							echo "<script>alert('failed');</script>";
							echo "<script>window.location.href = 'index.php';</script>";
						}

					}else{
						echo "<script>alert('empty');</script>";
						echo "<script>window.location.href = 'index.php';</script>";
					}

			}
		}
   }
	 public function fetch(){
			$data = null;

			$query = "SELECT * FROM `practical`";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function delete($id){

			$query = "DELETE FROM `practical` WHERE id = '$id'";
			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
			}
		}


		public function edit($id){

			$data = null;

			$query = "SELECT * FROM `practical` WHERE id = '$id'";
			if ($sql = $this->conn->query($query)) {
				while($row = $sql->fetch_assoc()){
					$data = $row;
				}
			}
			return $data;
		}

		public function update($data){

			$query = "UPDATE `practical` SET fname = '$data[fname]', lname = '$data[lname]', address = '$data[address]', city = '$data[city]', country = '$data[country]' WHERE `practical`.`id` = '$data[id]'";

			if ($sql = $this->conn->query($query)) {

				return true;
			}else{
				return false;
			}
		}
}
