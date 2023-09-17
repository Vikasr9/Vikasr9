<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      animation: colorChange 5s infinite;
      background-color: red; /* Set an initial background color */
    }

    @keyframes colorChange {
      10% {
        background-color: red;
      }
      50% {
        background-color: skyblue;
      }
      10% {
        background-color: green;
      }
      10% {
        background-color: blue;
      }
    }

    /* Style for the popup box */
    .popup {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding: 20px;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    /* Style for the smiley face */
    .smiley {
      font-size: 100px;
      margin: 0 auto;
      display: block;
    }
  </style>
  <title>Registration Result</title>
</head>
<body>
  <?php
  // Process the form data and store in the database (this is a simplified example)
  $db_host = "localhost:3307";
  $db_user = "root";
  $db_password = "";
  $db_name = "student";

  $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $rollNumber = $_POST['rollNumber'];
  $name = $_POST['name'];
  $dateOfBirth = $_POST['dateOfBirth'];
  $fatherName = $_POST['fatherName'];
  $motherName = $_POST['motherName'];
  $bloodGroup = $_POST['bloodGroup'];
  $mobileNumber = $_POST['mobileNumber'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $state = $_POST['state'];
  $city = $_POST['city'];
  $qualification = $_POST['qualification'];

  $sql = "INSERT INTO students (roll_number, name, date_of_birth, father_name, mother_name, blood_group, mobile_number, email, address, state, city, qualification)
          VALUES ('$rollNumber', '$name', '$dateOfBirth', '$fatherName', '$motherName', '$bloodGroup', '$mobileNumber', '$email', '$address', '$state', '$city', '$qualification')";

  if ($conn->query($sql) === TRUE) {
      echo '<div class="popup" id="popup">
              <span class="smiley">✔✌</span>
              <p>Registration successful!</p>
            </div>';
  } else {
      echo '<p>Error: ' . $sql . '<br>' . $conn->error . '</p>';
  }

  $conn->close();
  ?>

  <script>
    // Show the popup box
    function showPopup() {
      const popup = document.getElementById("popup");
      popup.style.display = "block";
      setTimeout(function () {
        popup.style.display = "none";
      }, 10000); // Hide after 3 seconds
    }

    // Call the showPopup function
    showPopup();
  </script>
</body>
</html>
