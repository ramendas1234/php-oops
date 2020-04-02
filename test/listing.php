<?php
include_once 'header.php';
include_once 'controller/controller.php';
$emp_con = new EmployeeController();
if (isset($_GET['id']) && isset($_GET['delete']) && $_GET['id'] != ''):
    if ($emp_con->employee_delete())
        header("location:listing.php?msg=Record Delete");
endif;

if (isset($_GET['search']) && $_GET['search'] != ""):
    $search = '&search=' . $_GET['search'];
    $s_k = $_GET['search'];
else:
    $search = '';
    $s_k = '';
endif;
if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}
$per_page = 3;
$offset = ($page_no - 1) * $per_page;
$total_records = count($emp_con->get_employees('', '', $s_k, ''));
$total_no_of_pages = ceil($total_records / $per_page);
$employees = $emp_con->get_employees($per_page, $offset, $s_k, '');
?>
<style>
    .div-inner{
        padding: 25px 30px;
        background-color: #efefef;
        border: none;
    }
</style>
<div class="div-inner">
    <div class="row">
        <div class="col-sm-3">
            <a href="index.php" class="cstm-btn">Add New</a>
        </div>
        <div class="col-sm-offset-6 col-sm-3">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
                <input type="hidden" name="page_no" value="<?php echo $page_no; ?>">
                <input type="text" class="form-control" style="margin-bottom:10px;" name="search" placeholder="search employee">
                <!--<input type="submit" value="search" >-->
                <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>

            </form>

        </div>
    </div>
    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="th-sm">Name

                </th>
                <th class="th-sm">Position

                </th>
                <th class="th-sm">Email

                </th>
                <th class="th-sm">Pan Number

                </th>
                <th class="th-sm">Join date

                </th>
                <th class="th-sm">Salary

                </th>
                <th class="th-sm">Action

                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($employees)):
                foreach ($employees as $employee):
                    ?>
                    <tr>
                        <td><?php echo $employee['name']; ?></td>
                        <td><?php echo $employee['cat_name']; ?></td>
                        <td><?php echo $employee['email']; ?></td>
                        <td><?php echo $employee['pan']; ?></td>
                        <td><?php echo $employee['date_of_joining']; ?></td>
                        <td>$ <?php echo number_format($employee['salary']); ?></td>
                        <td><a href="edit.php?id=<?php echo base64_encode($employee['ID']); ?>"><i class="fa fa-edit"></i></a> | <a href="listing.php?id=<?php echo base64_encode($employee['ID']) . '&delete'; ?>"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    <?php
                endforeach;
            else:
                ?>
            <div class="alert alert-danger">No Employees Recorded.</div>
        <?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Name
                </th>
                <th>Position
                </th>
                <th>Email
                </th>
                <th>Pan Number
                </th>
                <th>Join date
                </th>
                <th>Salary
                </th>
                <th class="th-sm">Action
                </th>
            </tr>
        </tfoot>
    </table>
    <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
        <strong>Page <?php echo $page_no . " of " . $total_no_of_pages; ?></strong>
    </div>
    <ul class="pagination">
        <?php
        if ($total_no_of_pages <= 10) {
            for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
                if ($counter == $page_no) {
                    echo "<li class='active'><a>$counter</a></li>";
                } else {
                    echo "<li><a href='?page_no=$counter$search'>$counter</a></li>";
                }
            }
        }
        ?>
    </ul>
</div>
<?php include_once 'footer.php'; ?>            