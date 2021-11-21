<?php
   // Šī ir klase, kurā ir servera konfigurācijas parametri un visas nepieciešamās funkcijas
   
   class Model
   
   	{
   // servera konfigurācijas parametri
         private $server = "localhost";
         private $username = "root";
         private $password = "root";
         private $db = "to_do_list";
         private $conn;
   	    // izveidojot jaunu objektu, tiek izveidots savienojums ar datubāzi
   	    public function __construct()
   	    {
   	        try {
   	            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
   	        } catch (Exception $e) {
   	            echo "Savienojums ar datubāzi neizdevās!" . $e->getMessage();
   	        }
   	    }
   	    // funkcija, kas uzveido un ievieto datubāzē datus par jauna uzdevumu
   	    public function insert()
   	    {
   //pārbauda vai ir ierakstīts virsraksts:	    	
   	        if (isset($_POST['heading'])) {
   //pārbauda vai virsraksta lauks nav tukšs:	        	
   	            if (!empty($_POST['heading'])) {
   // piešķir vērtības mainīgajiem ar formas datiem: 	            	
   	                $heading = $_POST['heading'];
   	                $description = $_POST['description'];
   	                $status = $_POST['status'];
   // šo nevarēja ielasīt datubāzes tabulā:	                
   	                // $date = "STR_TO_DATE('" . $_POST['date'] . "', '%Y-%m-%d')";
   // izveido SQL komandu konkrēto vērtību ievietošanai tabulā:
   	                $query = "INSERT INTO tasks (virsraksts, apraksts, izpildits) VALUES ('$heading', '$description', '$status')";
   // ja SQL komanda ir nostrādājusi, tad jauns uzdevums ir ticis pievienots un attiecīgi parāda paziņojumu:
   	                if ($sql = $this->conn->query($query)) {
   	                    echo "<script>alert('Uzdevums veiksmīgi pievienots!');</script>";
   	                    echo "<script>window.location.href = 'index.php';</script>";
   	                } else 
   // ja SQL komanda nav nostrādājusi, tad jauns uzdevums nav ticis pievienots un attiecīgi parāda paziņojumu un atgriežas sākuma lapā:
   	                 {	                	
   	                    echo "<script>alert('Neizdevās pievienot uzdevumu!');</script>";
   	                    echo "<script>window.location.href = 'index.php';</script>";
   	                }
   // ja nav ierakstīts virsraksts, tad attiecīgi parāda paziņojumu un atgriežas sākuma lapā:	                
   	            } else {
   	                echo "<script>alert('Uzdevums nav pievienots!');</script>";
   	                echo "<script>window.location.href = 'index.php';</script>";
   	            }
   	        }
   		    }
   		    // funkcija, kas attēlo visus datus no tasks tabulas detalizētā skatā
   	    public function fetch() {
   
   	    $data = null;
   
   	    $query = "SELECT * FROM tasks";
   	  
   	    if ($sql = $this->conn->query($query)) {
   	    	while ($row = mysqli_fetch_assoc($sql)) {
   	    		$data[] = $row;
   	    		} 
   	    	}
   	    return $data;
   		}
   
   // funkcija, kas izdzēš ierakstus no tasks tabulas
   		public function delete($id){
   
   			$query = "DELETE FROM tasks where id = '$id'";
   			if ($sql = $this->conn->query($query)) {
   				return true;
   			}else{
   				return false;
   			}
   		}
   
   // funkcija, kas attēlo konkrēta ID uzdevumu no tasks tabulas
   		public function edit($id){
   
   			$data = null;
   
   			$query = "SELECT * FROM tasks WHERE id = '$id'";
   			if ($sql = $this->conn->query($query)) {
   				while($row = $sql->fetch_assoc()){
   					$data = $row;
   				}
   			}
   			return $data;
   		}
   
   //Funkcija kas attēlo no uzdevuma publicēšanas pagājušo dienu skaitu latviski (nav izveidota)
   		public function fetch_days_ago() {
   			$data = null;
   			$query = "SELECT date_format(datums, '%W') FROM test";
   			if ($sql = $this->conn->query($query)) {
   				return true;
   			}else{
   				return false;
   			}
   		}
   
   // funkcija, kas atjaunina uzdevumu datubāzē
   		public function update($data){
   
   			$query = "UPDATE tasks SET virsraksts='$data[heading]', apraksts='$data[description]' WHERE id='$data[id]'";
   
   			if ($sql = $this->conn->query($query)) {
   				return true;
   			}else{
   				return false;
   			}
   		}
   	}
          
   ?>