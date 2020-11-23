<?php
  include('includes/config.php');
  // Check GET request id param
  if(isset($_GET['id']) && (int)$_GET['id'] > 0) {
    // Escape any sensitive sql characters
    $id = mysqli_real_escape_string($conn, $_GET['id']);
   

    // Make sql to be used for query
    $sql = 'SELECT * FROM customer WHERE id = '.$id;

    // Get the query result
    $result = mysqli_query($conn, $sql);

    // Fetch the resulting in an array format
    $customer = mysqli_fetch_assoc($result);

    // print_r($customer);

    // free the $result from memory (good practise)
    mysqli_free_result($result);

    // close connection
    mysqli_close($conn);
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer</title>
  <!-- Font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <!-- css Link -->
  <link rel="stylesheet" href="assets/css/main.css">
</head>
<body class="pg-customer">
  <!-- Navigation -->
  <?php include("includes/partials/nav.php"); ?>
  <!-- Main -->
  <main class="customer-main">
    <h2>Customer Information</h2>
    <div class="customer-wrapper">
      <?php if ($customer): ?>
        <ul>
          <li><strong>First name:</strong> <?php echo htmlspecialchars($customer['first_name']); ?></li>
          <li><strong>Last name:</strong> <?php echo htmlspecialchars($customer['last_name']);?></li>
          <li><strong>Date of birth:</strong> <?php echo htmlspecialchars($customer['dob']); ?></li>
          <li><strong>Driver license number:</strong> <?php echo htmlspecialchars($customer['driver_license_number']); ?></li>
          <li><strong>Phone number:</strong> <?php if (!$customer['phone']) { echo ('N/A'); } else { echo htmlspecialchars($customer['phone']); }; ?></li>
          <li><strong>Email address:</strong> <?php echo htmlspecialchars($customer['email']); ?></li>
        </ul>
      <?php else: ?>
        <div class="customer-error">
          <h2>Cannot find a customer with the id of <?php echo $_GET['id']?></h2>
          <p><a href="index.php">Click Here</a> to get back to the list of all customers</p>
      </div>
      
      <?php endif; ?>
    </div>
  </main>
  <!-- Footer -->
  <?php include("includes/partials/footer.php"); ?>
  
</body>
</html>