<?php
class EmployeeController{
    public $model ;
    public function __construct(){
        include_once 'model/model.php';
        $this->model = new DataOperation();
    }


    public function employee_insert(){
        
        if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['gender']) || empty($_POST['category']) || empty($_POST['addhar']) || empty($_POST['pan'])):
            return false;
        else:
            $emp_arr = array(
                'name' => $_POST['name'],
                'email'=> $_POST['email'],
                'phone'=> $_POST['phone']
            );
            
            $emp_id = $this->model->insert_record('employee',$emp_arr);
            $emp_meta_arr = array(
                'employee_id' => $emp_id,
                'cat_id' => $_POST['category'],
                'addhar' => $_POST['addhar'],
                'pan' => $_POST['pan'],
                'gender' => $_POST['gender'],
                'salary' => $_POST['salary'],
                'date_of_joining' => $_POST['doj'],
            );
            $this->model->insert_record('employee_meta',$emp_meta_arr);
            return TRUE ;
        endif;
    }
    public function get_categories(){
        return $this->model->caegories();
    }
    public function get_employees($per_page='', $offset='', $search='',$emp_id=''){
        return $this->model->employees($per_page,$offset,$search,$emp_id);
    }
    
    public function employee_update(){
        
        if(empty($_POST['emp_id'] || $_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['gender']) || empty($_POST['category']) || empty($_POST['addhar']) || empty($_POST['pan'])):
            return false;
        else:
            $emp_id = $_POST['emp_id'] ;
            $emp_arr = array(
                'name' => $_POST['name'],
                'email'=> $_POST['email'],
                'phone'=> $_POST['phone']
            );
            $where = array('ID' => $emp_id);
            $this->model->update_record('employee',$emp_arr, $where);
            $emp_meta_arr = array(
                'cat_id' => $_POST['category'],
                'addhar' => $_POST['addhar'],
                'pan' => $_POST['pan'],
                'gender' => $_POST['gender'],
                'salary' => $_POST['salary'],
                'date_of_joining' => $_POST['doj'],
            );
            $where = array('employee_id' => $emp_id);
            $this->model->update_record('employee_meta',$emp_meta_arr,$where);
            return TRUE ;
        endif;
    }
    public function employee_delete(){
        if(empty($_GET['id'])):
            return FALSE ;
        else :
            $where = array('ID' => base64_decode($_GET['id']));
            $where = array('employee_id' => base64_decode($_GET['id']));
            $this->model->delete_record('employee',$where);
            $this->model->delete_record('employee_meta',$where);
            return TRUE;
        endif;
    }
}
?>