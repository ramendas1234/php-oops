<?php
ini_set(display_errors, 1);
include 'db.php';


class DataOperation extends Database{
    
    public function caegories(){
        $sql = "SELECT * FROM category";
        $results = $this->get_record($sql);
        return $results;
    }
    public function employees($per_page='',$offset='',$search='',$employee_id = ''){
        
        $sql = "SELECT employee.ID,employee.name,employee.email,employee.phone,employee_meta.gender,employee_meta.date_of_joining,employee_meta.addhar,employee_meta.pan,employee_meta.date_of_joining,employee_meta.salary,category.id AS cat_id,category.name AS cat_name FROM employee INNER JOIN employee_meta ON employee.ID = employee_meta.employee_id INNER JOIN category ON employee_meta.cat_id = category.id ";
        if($search || $employee_id)
            $sql .= "  WHERE ";
        if($search)
            $sql .= " employee.name LIKE '%$search%' ";
        if($search && $employee_id)
            $sql .= " OR ";
        if($employee_id)
            $sql .= " employee.ID = '$employee_id' ";
        $sql .= " ORDER BY ID DESC ";
        if($per_page || $offset)
            $sql .= "LIMIT $offset,$per_page";
        $results = $this->get_record($sql);
        return $results; 
    }
}
?>