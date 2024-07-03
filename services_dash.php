<?php
// Establish database connection
$conn = new mysqli('localhost', 'root', '', 'digital');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch services data from the database
$sql = "SELECT * FROM Services";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="Dash.css">
</head>
<body>
<div class="container-fluid">
    <header class="bg-primary text-white py-4 mb-4">
        <div class="container">
            <h1>Digital Crafters - Services</h1>
        </div>
    </header>

    <div class="row">
        <div class="col-md-3">
            <!-- Sidebar -->
            <div id="sidebar" class="bg-black">
                <ul>
                    <li><a href="Dashboard.php"data-table="Clients"><i class="fas fa-users"></i> Clients</a></li>
                    <li><a href="Feed_dash.php" data-table="Feedback"><i class="fas fa-comment"></i> Feedback</a></li>
                    <li><a href="Admin_dash.php" data-table="Admins"><i class="fas fa-user-tie"></i> Admins</a></li>
                    <li><a href="Requiests_Dach.php" data-table="Requests"><i class="fas fa-clipboard-list"></i> Requests</a></li>
                    <li><a href="services_dash.php" class="active" data-table="Services"><i class="fas fa-cogs"></i> Services</a></li>
                    <li><a href="employees_dash.php" data-table="Employees"><i class="fas fa-users-cog"></i> Employees</a></li>
                    <li><a href="Department_Dach.php" data-table="Departments"><i class="fas fa-building"></i> Departments</a></li>
                    <!-- Add other sidebar items here -->
                    <form method="post" action="Admin_login.php">
            <button type="submit" name="logout" class="btn btn-primary btn-sm btn-block mt-3">Logout</button>
        </form>
                </ul>
            </div>
        </div>

        <div class="col-md-9">
            <!-- Main Content Area -->
            <div id="main-content" class="p-4 bg-light rounded">
                <!-- Search bar -->
                <input type="text" id="searchInput" class="form-control mb-3" placeholder="Search Services...">
                <!-- Services Table -->
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Service ID</th>
                        <th scope="col">Type</th>
                        <th scope="col">Plan</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="servicesTableBody">
                    <?php
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>'.$row['service_id'].'</td>';
                            echo '<td>'.$row['type'].'</td>';
                            echo '<td>'.$row['plan'].'</td>';
                            echo '<td>'.$row['description'].'</td>';
                            echo '<td>'.$row['price'].'</td>';
                            echo '<td>';
                            echo '<a href="update_service.php?id='.$row['service_id'].'"><i class="fas fa-edit"></i></a>'; // Update button
                            echo '<a href="delete_service.php?id='.$row['service_id'].'"><i class="fas fa-trash"></i></a>'; // Delete button
                            echo '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo "<tr><td colspan='6'>No services found</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> <!-- container-fluid -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // JavaScript for search functionality
    $(document).ready(function() {
        $('#searchInput').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('#servicesTableBody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
</body>
</html>
<style>
.table td a {
  margin-right: 10px; /* Adjust the margin as needed */
}

</style>
