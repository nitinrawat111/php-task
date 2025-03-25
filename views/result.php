<!DOCTYPE html>
<html>
<head>
    <title>API Results</title>
    <!-- <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { color: #333; }
        h2 { color: #555; margin-top: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .section { margin-bottom: 30px; }
        .banner { background-color: #f9f9f9; padding: 10px; border-radius: 5px; }
        a { color: #007bff; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style> -->
</head>
<body>
    <h1>API Results</h1>

    <?php
    $apiData = $_SESSION['api_data'];
    $data = $apiData['data'] ?? [];
    ?>

    <!-- Status and Message -->
    <div class="section">
        <h2>Response Overview</h2>
        <p><strong>Status:</strong> <?php echo htmlspecialchars($apiData['status'] ?? 'N/A'); ?></p>
        <p><strong>Message:</strong> <?php echo htmlspecialchars($apiData['message'] ?? 'N/A'); ?></p>
    </div>

    <!-- Banner -->
    <div class="section">
        <h2>Banner</h2>
        <?php if (!empty($data['banner'])): ?>
            <div class="banner">
                <p><strong>Image:</strong> <img src="<?php echo htmlspecialchars($data['banner']['banner_image']); ?>" alt="Banner" style="max-width: 300px;"></p>
                <p><strong>Small Text:</strong> <?php echo htmlspecialchars($data['banner']['small_text']); ?></p>
                <p><strong>Heading:</strong> <?php echo htmlspecialchars($data['banner']['heading']); ?></p>
                <p><strong>Description:</strong> <?php echo htmlspecialchars($data['banner']['description']); ?></p>
                <p><strong>Button:</strong> <a href="<?php echo htmlspecialchars($data['banner']['button_url']); ?>"><?php echo htmlspecialchars($data['banner']['button_text']); ?></a></p>
            </div>
        <?php else: ?>
            <p>No banner data available.</p>
        <?php endif; ?>
    </div>

    <!-- Subcategories -->
    <div class="section">
        <h2>Subcategories</h2>
        <?php if (!empty($data['subcategories'])): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Subcategory</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Shop Count</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['subcategories'] as $subcat): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($subcat['id']); ?></td>
                            <td><?php echo htmlspecialchars($subcat['subcategory']); ?></td>
                            <td><?php echo htmlspecialchars($subcat['category']); ?></td>
                            <td><img src="<?php echo htmlspecialchars($subcat['image']); ?>" alt="Subcategory" style="max-width: 50px;"></td>
                            <td><?php echo htmlspecialchars($subcat['shop_count']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No subcategories available.</p>
        <?php endif; ?>
    </div>

    <!-- Categories -->
    <div class="section">
        <h2>Categories</h2>
        <?php if (!empty($data['categories'])): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Shop Count</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['categories'] as $cat): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($cat['id']); ?></td>
                            <td><?php echo htmlspecialchars($cat['category']); ?></td>
                            <td><img src="<?php echo htmlspecialchars($cat['image']); ?>" alt="Category" style="max-width: 50px;"></td>
                            <td><?php echo htmlspecialchars($cat['shop_count']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No categories available.</p>
        <?php endif; ?>
    </div>

    <!-- Nearby Vendors -->
    <div class="section">
        <h2>Nearby Vendors</h2>
        <?php if (!empty($data['nearby_vendors'])): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Business Name</th>
                        <th>Address</th>
                        <th>Subcategory</th>
                        <th>Shop Count</th>
                        <th>Logo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['nearby_vendors'] as $vendor): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($vendor['id']); ?></td>
                            <td><?php echo htmlspecialchars($vendor['name']); ?></td>
                            <td><?php echo htmlspecialchars($vendor['businessname']); ?></td>
                            <td><?php echo htmlspecialchars($vendor['address']); ?></td>
                            <td><?php echo htmlspecialchars($vendor['subcategory']); ?></td>
                            <td><?php echo htmlspecialchars($vendor['shop_count']); ?></td>
                            <td><img src="<?php echo htmlspecialchars($vendor['logo']); ?>" alt="Logo" style="max-width: 50px;"></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No nearby vendors available.</p>
        <?php endif; ?>
    </div>

    <a href="/">Go Back</a>
</body>
</html>