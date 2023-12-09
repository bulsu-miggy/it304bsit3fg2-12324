<?php
ob_start();
session_start();

// Page Title
$pageTitle = 'Service Categories';

// Includes
include 'connect.php';
include 'Includes/functions/functions.php';
include 'Includes/templates/header.php';

// Extra JS FILES
echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";

// Check If user is already logged in
if (isset($_SESSION['username_barbershop_Xw211qAAsq4']) && isset($_SESSION['password_barbershop_Xw211qAAsq4'])) {
    ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Service Categories</h1>
        </div>

        <?php
        $do = '';

        if (isset($_GET['do']) && in_array($_GET['do'], array('Add', 'Edit'))) {
            $do = htmlspecialchars($_GET['do']);
        } else {
            $do = 'Manage';
        }

        if ($do == 'Manage') {
            $stmt = $con->prepare("SELECT * FROM service_categories");
            $stmt->execute();
            $rows_service_categories = $stmt->fetchAll();
            ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-grey-900">Service Categories</h6>
                </div>
                <div class="card-body">

                    <!-- ADD NEW Service Category BUTTON -->
                    <a href="service-categories.php?do=Add" class="btn btn-success btn-sm" style="margin-bottom: 10px;">
                        <i class="fa fa-plus"></i>
                        Add Service Category
                    </a>

                    <!-- Service Categories Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($rows_service_categories as $category) {
                                    echo "<tr>";
                                    echo "<td>";
                                    echo $category['category_name'];
                                    echo "</td>";
                                    echo "<td>";
                                    $delete_data = "delete_category_" . $category["category_id"];
                                    ?>
                                    <ul class="list-inline m-0">
                                        <!-- EDIT BUTTON -->
                                        <li class="list-inline-item" data-toggle="tooltip" title="Edit">
                                            <button class="btn btn-success btn-sm rounded-0">
                                                <a href="service-categories.php?do=Edit&category_id=<?php echo $category['category_id']; ?>" style="color: white;">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </button>
                                        </li>
                                        <!-- DELETE BUTTON -->
                                        <li class="list-inline-item" data-toggle="tooltip" title="Delete">
                                            <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="modal" data-target="#<?php echo $delete_data; ?>" data-placement="top"><i class="fa fa-trash"></i></button>
                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="<?php echo $delete_data; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $delete_data; ?>" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Service Category</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this service category?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <button type="button" data-id="<?php echo $category['category_id']; ?>" class="btn btn-danger delete_category_bttn">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                <?php
                                echo "</td>";
                                echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php
        } elseif ($do == 'Add') {
            ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-gray-900">Add New Service Category</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="service-categories.php?do=Add">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_name">Category Name</label>
                                    <input type="text" class="form-control" value="<?php echo (isset($_POST['category_name'])) ? htmlspecialchars($_POST['category_name']) : ''; ?>" placeholder="Category Name" name="category_name">
                                    <?php
                                    $flag_add_category_form = 0;
                                    if (isset($_POST['add_new_category'])) {
                                        if (empty(test_input($_POST['category_name']))) {
                                            ?>
                                            <div class="invalid-feedback" style="display: block;">
                                                Category name is required.
                                            </div>
                                        <?php
                                            $flag_add_category_form = 1;
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <!-- SUBMIT BUTTON -->
                        <button type="submit" name="add_new_category" class="btn btn-success">Add Category</button>
                    </form>

                    <?php
                    /*** ADD NEW CATEGORY ***/
                    if (isset($_POST['add_new_category']) && $_SERVER['REQUEST_METHOD'] == 'POST' && $flag_add_category_form == 0) {
                        $category_name = test_input($_POST['category_name']);

                        try {
                            $stmt = $con->prepare("INSERT INTO service_categories (category_name) VALUES (?) ");
                            $stmt->execute(array($category_name));

                            ?>
                            <!-- SUCCESS MESSAGE -->
                            <script type="text/javascript">
                                swal("New Category", "The new category has been inserted successfully", "success").then((value) => {
                                    window.location.replace("service-categories.php");
                                });
                            </script>
                        <?php
                        } catch (Exception $e) {
                            echo "<div class='alert alert-danger' style='margin:10px 0px;'>";
                            echo 'Error occurred: ' . $e->getMessage();
                            echo "</div>";
                        }
                    }
                    ?>
                </div>
            </div>
        <?php
        } elseif ($do == 'Edit') {
            $category_id = (isset($_GET['category_id']) && is_numeric($_GET['category_id'])) ? intval($_GET['category_id']) : 0;

            if ($category_id) {
                $stmt = $con->prepare("SELECT * FROM service_categories WHERE category_id = ?");
                $stmt->execute(array($category_id));
                $category = $stmt->fetch();
                $count = $stmt->rowCount();

                if ($count > 0) {
                    ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-gray-900">Edit Service Category</h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="service-categories.php?do=Edit&category_id=<?php echo $category_id; ?>">
                                <!-- Category ID -->
                                <input type="hidden" name="category_id" value="<?php echo $category['category_id']; ?>">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category_name">Category Name</label>
                                            <input type="text" class="form-control" value="<?php echo $category['category_name']; ?>" placeholder="Category Name" name="category_name">
                                            <?php
                                            $flag_edit_category_form = 0;
                                            if (isset($_POST['edit_category_sbmt'])) {
                                                if (empty(test_input($_POST['category_name']))) {
                                                    ?>
                                                    <div class="invalid-feedback" style="display: block;">
                                                        Category name is required.
                                                    </div>
                                                <?php
                                                    $flag_edit_category_form = 1;
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- SUBMIT BUTTON -->
                                <button type="submit" name="edit_category_sbmt" class="btn btn-success">Edit Category</button>
                            </form>
                            <?php
                            /*** EDIT CATEGORY ***/
                            if (isset($_POST['edit_category_sbmt']) && $_SERVER['REQUEST_METHOD'] == 'POST' && $flag_edit_category_form == 0) {
                                $category_name = test_input($_POST['category_name']);
                                $category_id = $_POST['category_id'];

                                try {
                                    $stmt = $con->prepare("UPDATE service_categories SET category_name = ? WHERE category_id = ?");
                                    $stmt->execute(array($category_name, $category_id));

                                    ?>
                                    <!-- SUCCESS MESSAGE -->
                                    <script type="text/javascript">
                                        swal("Category Updated", "The category has been updated successfully", "success").then((value) => {
                                            window.location.replace("service-categories.php");
                                        });
                                    </script>
                                <?php
                                } catch (Exception $e) {
                                    echo "<div class='alert alert-danger' style='margin:10px 0px;'>";
                                    echo 'Error occurred: ' . $e->getMessage();
                                    echo "</div>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                <?php
                } else {
                    header('Location: service-categories.php');
                    exit();
                }
            } else {
                header('Location: service-categories.php');
                exit();
            }
        }
        ?>
    </div>
<?php

// Include Footer
include 'Includes/templates/footer.php';
} else {
header('Location: login.php');
exit();
}
?>
