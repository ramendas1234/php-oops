<?php
include_once 'header.php';
if(!isset($_GET['id']))
    return FALSE ;
include_once 'controller/controller.php';
$emp_con = new EmployeeController();
$categories = $emp_con->get_categories();
$edit_id = base64_decode($_GET['id']);
$emp_data = $emp_con->get_employees('','','',$edit_id);
if(empty($emp_data))
    return FALSE;
if(isset($_POST['emplyee_update'])):
    $flag = $emp_con->employee_update();
    if($flag):
        header("location:listing.php?msg=Record Updated");
    endif;
else:
    $flag = TRUE ;
endif;
?>
    <div class="div-wrapper">
    <div class="col-sm-offset-3 col-sm-6">
        <div class="div-inner">
            <h2 style="display:inline-block;">Update This Employee</h2>
            <a href="listing.php" style="float:right;" class="cstm-btn">Back</a>
            <form method="post" action="">
                <input type="hidden" name="emp_id" value="<?php echo $edit_id; ?>">
                <div class="form-group">
                    <input type="text" name="name" class="form-control textInput" id="name" placeholder="Employee Name" value="<?php echo $emp_data[0]['name'];?>">
                    <?php if(!$flag && empty($_POST['name'])):?>
                    <span class="error">Enter employee name</span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control textInput" id="email" placeholder="Employee Email" value="<?php echo $emp_data[0]['email'];?>">
                    <?php if(!$flag && empty($_POST['email'])):?>
                    <span class="error">Enter employee email</span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <input type="number" name="phone" class="form-control textInput" id="phone" placeholder="Employee Phone" value="<?php echo $emp_data[0]['phone'];?>">
                    <?php if(!$flag && empty($_POST['phone'])):?>
                    <span class="error">Enter employee phone</span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <select class="form-control textInput" id="gender" name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <?php if(!$flag && empty($_POST['gender'])):?>
                    <span class="error">Select gender</span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <select class="form-control textInput" id="category" name="category">
                        <option value="">--choose employee position--</option>
                        <?php 
                        if(!empty($categories)):
                            foreach ($categories as $category):
                        ?>
                        <option value="<?php echo $category['id']; ?>" <?php echo ($emp_data[0]['cat_id'] == $category['id'])?'selected':'';?> ><?php echo $category['name']; ?></option>
                        <?php
                        endforeach;
                        endif; 
                        ?>
                    </select>
                    <?php if(!$flag && empty($_POST['category'])):?>
                    <span class="error">Select position</span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <input type="text" name="addhar" class="form-control textInput" id="addhar" placeholder="Employee Addhar Number" value="<?php echo $emp_data[0]['addhar']; ?>">
                    <?php if(!$flag && empty($_POST['addhar'])):?>
                    <span class="error">Enter Addhar number</span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <input type="text" name="pan" class="form-control textInput" id="pan" placeholder="Employee Pan Number" value="<?php echo $emp_data[0]['pan']; ?>">
                    <?php if(!$flag && empty($_POST['pan'])):?>
                    <span class="error">Enter Pan Number</span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <input type="number" name="salary" min="5000" class="form-control textInput" id="slary" placeholder="Employee Salary" value="<?php echo $emp_data[0]['salary']; ?>">
                </div>
                <div class="form-group">
                    <input type="date" name="doj" class="form-control textInput" id="doj" placeholder="Date of joining" value="<?php echo $emp_data[0]['date_of_joining'];?>">
                </div>
                <button class="btn btn-success" name="emplyee_update">Update Employee</button>
        </form>
        </div>
        
        </div>
    </div>
<?php include_once 'footer.php'; ?>  