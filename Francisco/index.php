<?php require_once 'core/dbConfig.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SQL</title>
</head>

<body>
  <?php
  // SHOW CODE DEMONSTRATING FETCH_ALL(). USE PRINT_R(). WITH “<pre>” TAG IN BETWEEN. 
  echo ("<pre>");
  $stmt = $pdo->prepare("SELECT * FROM owners");
  if ($stmt->execute()) {
    print_r($stmt->fetchAll());
  }
  echo ("</pre>");



  // SHOW CODE DEMONSTRATING HOW FETCH() IS USED. USE PRINT_R(). WITH “<pre>” TAG IN BETWEEN. 
  echo ("<pre>");
  $stmt = $pdo->prepare("SELECT * FROM owners where owner_id = 5");
  if ($stmt->execute()) {
    print_r($stmt->fetchAll());
  }
  echo ("</pre>");

  // SHOW CODE DEMONSTRATING INSERTION OF RECORD TO YOUR DATABASE
  $query = "INSERT INTO owners (owner_id, name, email, phone, address) VALUES (?, ?, ?, ?)";
  $stmt = $pdo->prepare($query);
  $executeQuery = $stmt->execute([3, 'Charlie Brown', 'charlie@example.com', '555-8765', '789 Pine St, Springfield']);
  if ($executeQuery) {
    echo "Data inserted successfully!";
  } else {
    echo "Error inserting data!";
  }

  // SHOW CODE DEMONSTRATING UPDATING OF RECORD FROM YOUR DATABASE
  $query = "UPDATE owners SET name = ?, email = ?, phone = ?, address = ? WHERE owner_id = ?";
  $stmt = $pdo->prepare($query);
  $executeQuery = $stmt->execute(['Charlie Brown', 'charlie@example.com', '555-8765', '789 Pine St, Springfield', 3]);
  if ($executeQuery) {
    echo "Data updated successfully!";
  } else {
    echo "Error updating data!";
  }

  // SHOW CODE DEMONSTRATING DELETION OF RECORD TO YOUR DATABASE
  $query = "DELETE FROM owners where owner_id = 5";
  $stmt = $pdo->prepare($query);
  $executeQuery = $stmt->execute();
  if ($executeQuery) {
    echo "Data deleted successfully!";
  } else {
    echo "Error deleting data!";
  }

  // SHOW CODE DEMONSTRATING AN SQL QUERY’S RESULT SET IS RENDERED ON AN HTML TABLE
  $stmt = $pdo->prepare("SELECT * FROM owners");
  if ($stmt->execute()) {
    $results = $stmt->fetchAll(); // Fetch all results
    echo "<table border='2'>";
    echo "<tr>";
    echo "<th>owner_id id</th>";
    echo "<th>name,</th>";
    echo "<th>email</th>";
    echo "<th>phone</th>";
    echo "<th>address</th>";
    echo "</tr>";

    foreach ($results as $result) {
      echo "<tr>";
      echo "<th>" . $result ['owner_id']. "</td>";
      echo "<th>" . $result ['name']. "</td>";
      echo "<th>" . $result ['email']. "</td>";
      echo "<th>" . $result ['phone']. "</td>";
      echo "<th>" . $result ['address']. "</td>";
      echo "</tr>";
    }
    echo "</table>";
  }
  ?>
</body>

</html>