<?php
/**
 * Todd Upshaw
 * October 1, 2026
 * SDC310 - MVC Midterm Refactor
 * View: Manages interface layout, form elements, and table rendering.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todd Upshaw - Address Book (MVC)</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>SDC310 Address Book</h1>

<?php if ($editRecord == null): ?>

    <!-- ADD ADDRESS FORM -->
    <h2>Add New Address</h2>

    <form method="post" action="index.php">
        <input type="text" name="first" placeholder="First Name" maxlength="25" required>
        <input type="text" name="last" placeholder="Last Name" maxlength="30" required>
        <input type="text" name="street" placeholder="Street" maxlength="100" required>
        <input type="text" name="city" placeholder="City" maxlength="25" required>
        <input type="text" name="state" placeholder="State" maxlength="2" required>
        <input type="text" name="zip" placeholder="Zip" maxlength="10" required>
        <br>
        <button type="submit" name="add_address">Add Address</button>
    </form>

<?php else: ?>

    <!-- UPDATE ADDRESS FORM -->
    <h2>Update Address</h2>

    <form method="post" action="index.php">
        <input type="hidden" name="AddressNo" value="<?php echo $editRecord['AddressNo']; ?>">
        <input type="text" name="first" value="<?php echo htmlspecialchars($editRecord['First']); ?>" maxlength="25" required>
        <input type="text" name="last" value="<?php echo htmlspecialchars($editRecord['Last']); ?>" maxlength="30" required>
        <input type="text" name="street" value="<?php echo htmlspecialchars($editRecord['Street']); ?>" maxlength="100" required>
        <input type="text" name="city" value="<?php echo htmlspecialchars($editRecord['City']); ?>" maxlength="25" required>
        <input type="text" name="state" value="<?php echo htmlspecialchars($editRecord['State']); ?>" maxlength="2" required>
        <input type="text" name="zip" value="<?php echo htmlspecialchars($editRecord['Zip']); ?>" maxlength="10" required>
        <br>
        <button type="submit" name="update_address">Update Address</button>
        <a href="index.php">Cancel</a>
    </form>

<?php endif; ?>

<!-- ADDRESS TABLE -->
<h2>All Addresses</h2>

<table>
    <tr>
        <th>AddressNo</th>
        <th>First</th>
        <th>Last</th>
        <th>Street</th>
        <th>City</th>
        <th>State</th>
        <th>Zip</th>
        <th>Actions</th>
    </tr>

    <?php while ($row = $addresses->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row["AddressNo"]; ?></td>
            <td><?php echo htmlspecialchars($row["First"]); ?></td>
            <td><?php echo htmlspecialchars($row["Last"]); ?></td>
            <td><?php echo htmlspecialchars($row["Street"]); ?></td>
            <td><?php echo htmlspecialchars($row["City"]); ?></td>
            <td><?php echo htmlspecialchars($row["State"]); ?></td>
            <td><?php echo htmlspecialchars($row["Zip"]); ?></td>
            <td>
                <a href="index.php?edit=<?php echo $row["AddressNo"]; ?>">Edit</a>
                <a href="index.php?delete=<?php echo $row["AddressNo"]; ?>" onclick="return confirm('Are you sure you want to delete this address?');">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
