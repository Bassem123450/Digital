<?php include 'nav2.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Request Service</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="mo2.css">
 
  <!-- Custom CSS -->
  <style>
    /* Resetting default styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-image: linear-gradient(rgb(255 255 255 / 83%), #ffffffe8), url(CC-Routes-1.jpg);
      background-size: cover;
      height: 100vh;
    }

    /* Container styles */
    .container {
      width: 80%;
      max-width: 800px;
      padding: 20px;
      background-color: #fff; /* Set container background to white */
      border-radius: 10px;
      /* Apply box-shadow for 3D effect */
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.2), 0 0 40px rgba(0, 0, 0, 0.1);
      margin: 50px auto; /* Center the container horizontally */
    }

    /* Headings and paragraphs */
    h1, p {
      text-align: center;
      margin-bottom: 20px;
    }

    /* Form styles */
    form {
      padding: 20px;
      border-radius: 10px;
    }

    /* Label styles */
    label {
      display: block;
      margin-bottom: 10px;
    }

    /* Dropdown styles */
    select,
    textarea {
      width: calc(100% - 20px);
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      margin-bottom: 10px;
      height: 40px; /* Increased height */
    }

    /* Button styles */
    button {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 20px;
    }

    /* Button hover effect */
    button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="bg-container">
    <div class="container">
      <h1 style="color: #007bff;" >Request Service</h1>
      <p>Choose the service and plan that best fits your needs.</p>

      <form action="phpphp.php" method="POST" id="serviceForm">
        <label for="type">Select type:</label>
        <select id="type" name="type" class="form-control">
          <option value="digital_marketing">Digital Marketing</option>
          <option value="web_development">Web Development</option>
        </select>

        <label for="plan">Choose Your Plan:</label>
        <select id="plan" name="plan" class="form-control">
          <!-- Ensure that the values here match the values checked in the JavaScript -->
          <option value="Smart">Smart</option>
          <option value="Premium">Premium</option>
          <option value="Elite">Elite</option>
        </select>

        <label for="description">Project Description:</label>
        <textarea id="description" name="description" rows="5" cols="50" class="form-control"></textarea>

        <button type="submit" name="submit" class="btn btn-primary">Submit Request</button>
      </form>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <!-- JavaScript -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      document.getElementById('type').addEventListener('change', function() {
        var type = this.value;
        var planSelect = document.getElementById('plan');
        planSelect.innerHTML = '';

        if (type === 'digital_marketing') {
          addOption(planSelect, 'Smart', 'Smart');
          addOption(planSelect, 'Premium', 'Premium');
          addOption(planSelect, 'Elite', 'Elite');
        } else if (type === 'web_development') {
          addOption(planSelect, 'Silver', 'Silver');
          addOption(planSelect, 'Gold', 'Gold');
          addOption(planSelect, 'Diamond', 'Diamond');
        }
      });

      function addOption(selectElement, text, value) {
        var option = document.createElement('option');
        option.textContent = text;
        option.value = value;
        selectElement.appendChild(option);
      }
    });
  </script>
</body>
<?php include 'footer2.php'; ?>
</html>
