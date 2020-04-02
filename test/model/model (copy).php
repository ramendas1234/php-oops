<?php
ini_set(display_errors, 1);
include 'db.php';


class DataOperation extends Database{
    
    public function insert_record($table, $fields){
        $sql = "";
        $sql .= "INSERT INTO ".$table;
        $sql .= " (".implode( ",", array_keys($fields)).") VALUES ";
        $sql .= "('".implode("','", array_values($fields))."')";
        $query = $this->con->query($sql);
        return ($query)?$this->con->insert_id:'' ;
    }
    public function get_record($table, $fields=array()){
        $sql = "";
        $sql .= "SELECT * FROM ".$table;
        if(!empty($fields)):
            $sql .= " WHERE ";
            foreach ($fields as $key => $values):
                $sql .= " $key = '$values' ";
                if(count($fields)>1 && next( $fields )):
                    $sql .= " AND ";
                endif;
            endforeach;
        endif;
        $result = $this->con->query($sql);
        $data = array();
        while($row = $result->fetch_assoc()):
            array_push($data, $row);
        endwhile;
        
        return $data ;
    }
    public function get_data(){
        $sql = "SELECT employee.ID,employee.name,employee.email,employee_meta.pan,employee_meta.date_of_joining,employee_meta.salary,category.name FROM employee INNER JOIN employee_meta ON employee.ID = employee_meta.employee_id INNER JOIN category ON employee_meta.cat_id = category.id LIMIT 0,3";
        $result = $this->con->query($sql);
        echo '<pre>';
        print_r($result->fetch_all());
        exit();
    }
}
$abc = new DataOperation();
$abc->get_data();exit();
?>