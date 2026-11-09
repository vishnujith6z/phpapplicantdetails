<?php

include 'db.php';

// Fetch applicant details
$sql = "SELECT name, email, mobile, username
        FROM applicants";

$stmt = $conn->prepare($sql);
$stmt->execute();

$applicants = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Applicant Details</title>

    <style>
        body {
            font-family: Arial;
            background-color: #f2f2f2;
            padding: 30px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>

</head>

<body>

<h2>Applicant Details</h2>

<table>

    <tr>
        <th>Sl.No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile Number</th>
        <th>Username</th>
    </tr>

    <?php if (count($applicants) > 0): ?>

        <?php $i = 1; ?>

        <?php foreach ($applicants as $row): ?>

        <tr>
            <td><?php echo $i++; ?></td>

            <td>
                <?php echo htmlspecialchars($row['name']); ?>
            </td>

            <td>
                <?php echo htmlspecialchars($row['email']); ?>
            </td>

            <td>
                <?php echo htmlspecialchars($row['mobile']); ?>
            </td>

            <td>
                <?php echo htmlspecialchars($row['username']); ?>
            </td>
        </tr>

        <?php endforeach; ?>

    <?php else: ?>

        <tr>
            <td colspan="5">No applicant records found.</td>
        </tr>

    <?php endif; ?>

</table>

</body>
</html>