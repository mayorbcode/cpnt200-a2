<?php
include('includes/config.php');

// Write query for specific customer info
$sql = 'SELECT last_name, first_name, phone, email, id FROM customer';

// Make query and get result
$result = mysqli_query($conn, $sql);

// Fetch the resulting /rows as an array
$customers = mysqli_fetch_all($result, MYSQLI_ASSOC);

// var_dump($customers[2]['phone']);


// free $result from memory (good practise)
mysqli_free_result($result);

// // close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <!-- Font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <!-- css Link -->
  <link rel="stylesheet" href="assets/css/main.css">
</head>
<body class="pg-index">
  <!-- Navigation -->
  <?php include("includes/partials/nav.php"); ?>
  <!-- Main -->
  <main class="main">
    <h1>Customers</h1>

    <div class="customers">  
      <!-- Fullname -->
      <div class="name-wrapper">
          <h2>Full name</h2>
          <?php foreach($customers as $customer){ ?> 
            <p><a href="customer.php?id=<?php echo $customer['id'] ?>"><?php echo htmlspecialchars($customer['last_name'])." "; echo htmlspecialchars($customer['first_name']); ?></a></p>
          <?php } ?>
      </div>
      <!-- Phone number -->
      <div class="phone-wrapper">
        <h2>Phone Number</h2>
          <?php foreach($customers as $customer){ ?> 
          <p>
            <?php if (!$customer['phone']) {
                    echo ('N/A');
                  }
                  else {
                    echo htmlspecialchars($customer['phone']);
                  }; 
            ?>
          </p>
        <?php } ?>
      </div>
      <!-- Email Address -->
      <div class="email-wrapper">
        <h2>Email Address</h2>
        <?php foreach($customers as $customer){ ?> 
          <p><?php echo htmlspecialchars($customer['email']); ?></p>
        <?php } ?>     
      </div>  
   
    </div>   
  </main>
  <!-- Footer -->
  <?php include("includes/partials/footer.php"); ?>
  
</body>
</html>