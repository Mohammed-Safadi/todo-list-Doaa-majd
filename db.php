<?php
class Db { 
      
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $conn= null;

      
    function __construct() { 
                
        try {
            $this->conn = new PDO('mysql:host='.$this->servername.';dbname=todolist', $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
            }
        catch(PDOException $e)
            {
            echo "Connection failed: " . $e->getMessage();
            }
    }
    private function executeStatement( $statement = "" , $parameters = [] ){
            try{
			
                $stmt = $this->conn->prepare($statement);
                $stmt->execute($parameters);
                return $stmt;
				
            }catch(Exception $e){
                throw new Exception($e->getMessage());   
            }		
    }
    
    public function getAllRecords(){
        
         $statement = $this->conn->prepare("SELECT * FROM tasks ORDER BY id ASC");
         $statement->execute();
         $result = $statement->fetchAll();
         if($statement->rowCount() > 0)
           {
            return $result;
           }
    } 
    
    public function addTask( $statement = "" , $parameters = [] ){
            try{	
                $this->executeStatement( $statement , $parameters );
                return $this->conn->lastInsertId();
				
            }catch(Exception $e){
                throw new Exception($e->getMessage());   
            }		
    }
     public function delete( $statement = "" , $parameters = [] ){
            try{
				
                $this->executeStatement( $statement , $parameters );
				
            }catch(Exception $e){
                throw new Exception($e->getMessage());   
            }		
     }
     public function Update( $statement = "" , $parameters = [] ){
            try{
				
                $this->executeStatement( $statement , $parameters );
				
            }catch(Exception $e){
                throw new Exception($e->getMessage());   
            }		
     }		
    

    
    
} 
?>