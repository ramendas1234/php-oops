<?php
class Database{
    
    public $con ;
    
    public function __construct(){
        $this->con = mysqli_connect("localhost", "root", "123", "test");
    }
    
    public function insert_record($table, $fields){
        $sql = "";
        $sql .= "INSERT INTO ".$table;
        $sql .= " (".implode( ",", array_keys($fields)).") VALUES ";
        $sql .= "('".implode("','", array_values($fields))."')";
        $query = $this->con->query($sql);
        return ($query)?$this->con->insert_id:'' ;
    }
    public function get_record($sql=''){
        $data = array();
        $result = $this->con->query($sql);
        while($row = $result->fetch_assoc()):
            array_push($data, $row);
        endwhile;
        return $data ;
    }
   public function update_record($table, $fields, $where){
        $sql = "";
        $condition="";
        foreach ($where as $key => $value){
            $condition .= $key . "='".$value."' AND ";
        }
        $condition = substr($condition, 0, -5);
        foreach ($fields as $key => $value){
            // UPDATE table set m_name = '', qty = ''
            $sql .= $key . "='".$value."',";
        }
        $sql = substr($sql, 0,-1);
        $sql = "UPDATE ".$table." SET ".$sql." WHERE ".$condition;
        $query = $this->con->query($sql);
        return ($query)?TRUE:FALSE ;
    }
  public function delete_record($table, $where){
        $sql ="";
        $condition="";
        foreach ($where as $key => $value){
            $condition .= $key . " = '".$value."' AND ";
        }
        $condition = substr($condition, 0, -5);
        $sql .= " DELETE FROM ".$table." WHERE ".$condition ;
        $query = $this->con->query($sql);
        return ($query)?TRUE:FALSE ;
    }  
}

?>