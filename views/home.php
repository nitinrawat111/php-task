<!DOCTYPE html>
<html>
<head>
    <title>API Fetch</title>
</head>
<body>
    <h1>Enter Coordinates</h1>
    <?php if (isset($error)) echo "<p style='color:red'>$error</p>"; ?>
    <form method="POST" action="?action=fetch">
        <label for="latitude">Latitude:</label>
        <input type="text" id="latitude" name="latitude"><br>
        <label for="longitude">Longitude:</label>
        <input type="text" id="longitude" name="longitude"><br>
        <label for="category_id">Category ID:</label>
        <input type="number" id="category_id" name="category_id" value="2" min="1"><br>
        <button type="submit">Fetch Data</button>
    </form>
</body>
</html>