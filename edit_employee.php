<?php
// Establish database connection
$conn = new mysqli('localhost', 'root', '', 'digital');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input and sanitize
    $employee_id = isset($_POST['employee_id']) ? $_POST['employee_id'] : ''; // Handle undefined index error
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];
    $phone_number = $_POST['phone_number'];
    $department_name = $_POST['department'];

    // Fetch department ID based on department name
    $sql_dept_id = "SELECT department_id FROM Departments WHERE department_name = '$department_name'";
    $result_dept_id = $conn->query($sql_dept_id);
    if ($result_dept_id->num_rows > 0) {
        $row_dept_id = $result_dept_id->fetch_assoc();
        $department_id = $row_dept_id['department_id'];

        // Update employee's department in the database
        $sql_update = "UPDATE Employees SET name = '$name', position = '$position', salary = '$salary', Phone_Number = '$phone_number', department_id = '$department_id' WHERE employee_id = $employee_id";

        if ($conn->query($sql_update) === TRUE) {
            // Redirect to employees_dash.php after successful update
            header("Location: employees_dash.php");
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "Department not found.";
    }
}

// Fetch employee details from the database
if(isset($_GET['id'])) {
    $employee_id = $_GET['id'];
    $sql = "SELECT * FROM Employees WHERE employee_id = $employee_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $position = $row['position'];
        $salary = $row['salary'];
        $phone_number = $row['Phone_Number'];
        $department_id = $row['department_id'];
    } else {
        echo "Employee not found.";
    }
} else {
    echo "Employee ID not provided.";
}

// Fetch departments data from the database
$sql_departments = "SELECT * FROM Departments";
$result_departments = $conn->query($sql_departments);

// Close database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Add your custom CSS styles here */
        body {
            font-family: 'Poppins', sans-serif;
            background-image: linear-gradient(rgb(255 255 255 / 83%), #ffffffe8), url(CC-Routes-1.jpg);
            background-size: cover;
            height: 100vh;
        }

        .card {
            border-radius: 12px;
            background-color: rgba(255, 255, 255, 0.936);
            border: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .card-body {
            color: #454545;
        }

        /* Add red color for error message */
        .error-message {
            color: red;
        }
    </style>
</head>
<body>
<div class="container">
    <!-- Your HTML content goes here -->
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Edit Employee</h2>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <!-- Employee details fields -->
                        <input type="hidden" name="employee_id" value="<?php echo $employee_id; ?>"> <!-- Add hidden input for employee_id -->
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
                        </div>
                        <div class="form-group">
                            <label for="position">Position:</label>
                            <input type="text" class="form-control" id="position" name="position" value="<?php echo $position; ?>">
                        </div>
                        <div class="form-group">
                            <label for="salary">Salary:</label>
                            <input type="text" class="form-control" id="salary" name="salary" value="<?php echo $salary; ?>">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number:</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo $phone_number; ?>">
                        </div>
                        <div class="form-group">
                            <label for="department">Department:</label>
                            <select class="form-control" id="department" name="department">
                                <?php
                                if ($result_departments->num_rows > 0) {
                                    while($row_dept = $result_departments->fetch_assoc()) {
                                        if ($row_dept['department_id'] == $department_id) {
                                            echo '<option value="'.$row_dept['department_name'].'" selected>'.$row_dept['department_name'].'</option>';
                                        } else {
                                            echo '<option value="'.$row_dept['department_name'].'">'.$row_dept['department_name'].'</option>';
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <!-- Submit button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

