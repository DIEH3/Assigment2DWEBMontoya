<?php
// 1. Initiate systems: Strict typing engaged.
declare(strict_types=1); 

// --- CORE SYSTEM VARIABLES ---
$shop_name = "L-Corp E.G.O. Terminal";
$terminal_tier = "MIXED GRADE ACQUISITION";
$currency_symbol = "₱"; // Our current stable currency: PHP.
$reorder_threshold = 10; 

// 3. Declare global tax rate (VAT 12% for function use).
$tax_rate_percent = 12; 

// 2. Main E.G.O. Inventory (Product Name => [Price, Stock]).
$ego_inventory = [
    // [Price (float), Stock (int)]
    'Twilight (ALEPH)' => [80000.00, 2],
    'Magic Bullet (WAW)' => [55000.00, 15],
    'Lamenting Heart (WAW)' => [60500.00, 0],
    'Red Shoes (HE)' => [32000.00, 9],
    'Laetitia\'s Gift (HE)' => [38000.00, 12],
    // Modification (b.) - Additional assets for inventory check
    'Smile (ZAYIN)' => [15000.00, 25],
    'Tears (TETH)' => [22000.00, 4],
    'One Sin (TETH)' => [18000.00, 10], // Borderline stock
    'Child of Galaxy (HE)' => [45000.00, 6],
    'CENSORED (ALEPH)' => [95000.00, 1]
];

// 4. Function: Check if we need to contact the extraction team for more stock.
function get_reorder_message(int $stock_level): string {
    // 5. Ternary check: Is stock < 10?
    return ($stock_level < 10) ? 'Yes' : 'No';
}

// 6. Function: Calculate the total market value of the current batch.
function get_total_value(float $price, int $quantity): float {
    // 7. Value = Price * Quantity. Simple.
    return $price * $quantity;
}

// 8. Function: Calculate the taxes due to the City upon full sale.
function get_tax_due(float $price, int $quantity, int $tax_rate_percent = 0): float {
    // Calculate total item value.
    $total_value = get_total_value($price, $quantity);
    
    // 9. Tax Due = Total Value * (Tax Rate / 100). The City always gets its cut.
    $tax_amount = $total_value * ($tax_rate_percent / 100);
    return $tax_amount;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $shop_name ?> - Stock Monitor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1a1a1a;
            color: #ccc;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            background-color: #222;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(255, 166, 0, 0.3);
        }
        h1 {
            color: #ffa600ff;
            border-bottom: 2px solid #555;
            padding-bottom: 10px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #444;
            padding: 12px;
            text-align: left;
            font-size: 0.9em;
        }
        th {
            background-color: #333;
            color: #ddd;
            text-transform: uppercase;
        }
        tr:nth-child(even) {
            background-color: #2a2a2a;
        }
        .reorder-yes {
            color: #ff0026ff;
            font-weight: bold;
        }
        .reorder-no {
            color: #02ff02ff;
            font-weight: bold; /* Added bold for consistency */
        }
        .info-footer { /* New style for the explicit footer */
            text-align: center;
            margin-top: 30px;
            padding: 10px;
            background-color: #333;
            border-radius: 4px;
            font-size: 0.8em;
            color: #00c3ffff;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>E.G.O. Acquisition Stock Monitoring</h1>

        <table>
            <thead>
                <tr>
                    <th>E.G.O. Asset Name</th>
                    <th>Available Stock</th>
                    <th>Reorder Needed? (Under 10)</th>
                    <th>Total Stock Value</th>
                    <th>Tax Due (<?= $tax_rate_percent ?>% VAT)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // 10. Loop through the inventory. $ego_inventory (our product array).
                foreach ($ego_inventory as $product_name => $data) {
                    
                    $price = $data[0];
                    $stock = $data[1];

                    // 11. Start the row and display the asset name.
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($product_name) . '</td>';
                    
                    // 12. Display the available stock count.
                    echo '<td>' . $stock . '</td>';
                    
                    // 13. Call and display reorder message.
                    $reorder_message = get_reorder_message($stock);
                    $reorder_class = ($reorder_message === 'Yes') ? 'reorder-yes' : 'reorder-no';
                    echo '<td class="' . $reorder_class . '">' . $reorder_message . '</td>';
                    
                    // 14. Call and display total stock value (Modification c: PHP currency).
                    $total_value = get_total_value($price, $stock);
                    echo '<td>' . $currency_symbol . ' ' . number_format($total_value, 2) . '</td>';
                    
                    // 15. Call and display tax due, passing the global tax rate.
                    $tax_due = get_tax_due($price, $stock, $tax_rate_percent);
                    echo '<td>' . $currency_symbol . ' ' . number_format($tax_due, 2) . '</td>';
                    
                    echo '</tr>';
                } // 16. Loop closed. Repeat for next asset.
                ?>
            </tbody>
        </table>
        
        <p style="margin-top: 30px; font-size: 0.85em; color: #888;">
            *Stock Reorder Threshold: **<?= $reorder_threshold ?>** Units.
        </p>

    </div> 
        <?php require_once 'footer.php'; ?>
    </div>

</body>
</html>
