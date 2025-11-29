<?php
//Name: Montoya, Dohn Diehllon Djan D.
//Block: WD-201

$shop = "L-Corp E.G.O. Terminal"; // Name of the shop. Should probably clean this up later.
$tier = "MIXED GRADE ACQUISITION"; // Gear grade level we're dealing with.
$coin = "LOB Points"; // The currency we use. Easy.
$tax = 0.15; // The 15% tax rate. Because the City loves taxes.

$gearList = array( // This is the actual list of E.G.O. items we're selling.
    // --- 1 ALEPH GRADE ---
    array(
        "id" => "A-01-92-T",
        "name" => "Twilight (ALEPH)",
        "price" => 80000,
        "description" => "A magnificent suit woven from despair and hope. Exceptionally stable.",
        "isAvailable" => true,
        "imageUrl" => "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2Foriginals%2Ff9%2Fed%2F09%2Ff9ed09aab2348eacc8b6de17140a95a3.jpg&f=1&nofb=1&ipt=c2347463cec6e22ca6ac95c44be26ff5e24a0a79de544f33174239e3e4a1c79f"
    ),
    // --- 2 WAW GRADE ---
    array(
        "id" => "O-01-64-M",
        "name" => "Magic Bullet (WAW)",
        "price" => 55000,
        "description" => "A single-shot weapon capable of stopping a calamity, if aimed correctly.",
        "isAvailable" => true,
        "imageUrl" => "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn.donmai.us%2Foriginal%2Fe0%2Ffe%2Fe0fe58747b26bb4b58ce5682144f2d57.png&f=1&nofb=1&ipt=b3d382aff9f3f081ab1362a3c104a00d10bb9bf079cfeee411dee0e81674aecc"
    ),
    array(
        "id" => "T-01-54-L",
        "name" => "Lamenting Heart (WAW)",
        "price" => 60500,
        "description" => "An armor that absorbs damage, but transfers fear to the wearer's allies.",
        "isAvailable" => false,
        "imageUrl" => "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2Foriginals%2Fdb%2Fa5%2F7a%2Fdba57aabaff11f729b61afb4ac4131ac.jpg&f=1&nofb=1&ipt=0369157ede49796737163a695a414dd94db4979f98ae89c63294d274c20e5a86"
    ),
    // --- 2 HE GRADE ---
    array(
        "id" => "T-09-03-R",
        "name" => "Red Shoes (HE)",
        "price" => 32000,
        "description" => "A set of boots that compel the wearer to move without rest. Excellent mobility.",
        "isAvailable" => true,
        "imageUrl" => "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.wikia.nocookie.net%2Flobotomy-corporation%2Fimages%2F3%2F3d%2F652c257a1ecfdba17f3ffad33c8bc70032a43c40.jpg%2Frevision%2Flatest%2Fscale-to-width-down%2F185%3Fcb%3D20190210080437%26path-prefix%3Dja&f=1&nofb=1&ipt=93eb33f5d889da412c1c3aa1c7826b430aba3f336848c3241a9b2b35252d369c"
    ),
    array(
        "id" => "O-01-44-B",
        "name" => "Laetitia's Gift (HE)",
        "price" => 38000,
        "description" => "A colorful ribbon that offers protection, but demands constant attention.",
        "isAvailable" => true,
        "imageUrl" => "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn.donmai.us%2Fsample%2Fef%2Fe0%2Fsample-efe0b1e9a84bc2b882575a418c98147d.jpg&f=1&nofb=1&ipt=7c0b41fa54b746805ea756ac6dca3a690977328a475c474411cec99c70bf0937"
    )
);

$basePrice = $gearList[0]['price']; // Just grabbing the price of the very first item for some reason.
$isHigh = $tier != "LOW-GRADE ACCESS"; // Checking if we're allowed to see the good stuff.
$status = $isHigh ? "ONLINE & OPERATIONAL" : "ERROR: LOW-GRADE ACCESS"; // This is the status message (it's either fine or broken).

// --- HTML Header Content ---
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $shop ?> [<?= $tier ?>]</title>
    <!-- INLINE STYLES -->
    <style>
        /* --- Simple, Dark Theme CSS --- */

        /* --- Background and Centering --- */
        body {
            font-family: Arial, sans-serif;
            background-color: #111;
            
            /* Background Image (Kept for the visual theme) */
            background-image: url('https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwallpaperaccess.com%2Ffull%2F13265040.jpg&f=1&nofb=1&ipt=53f0ab46ccde842bfa481167fe803836bcb02269e73648556146a5d6a0f3fbb5');
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            
            color: #ddd;
            margin: 0;
            padding: 20px 0;
            
            /* Center the entire page content */
            display: flex;
            flex-direction: column;
            align-items: center; 
        }

        .container {
            max-width: 1400px;
            width: 95%;
            background-color: rgba(0, 0, 0, 0.85);
            padding: 30px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        h1 {
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
            font-size: 2.5em;
        }

        .status-bar {
            text-align: center;
            margin-bottom: 30px;
            padding: 10px;
            background-color: #333;
            border-radius: 4px;
            color: #d83e01ff;
            font-weight: bold;
            text-transform: uppercase;
        }

        /* --- Product Grid this--- */
        .product-grid {
            display: flex;
            flex-wrap: wrap; 
            gap: 20px; 
            justify-content: center;
            padding: 10px 0;
        }

        .product-card {
            width: 250px; 
            min-height: 450px;
            background-color: #222;
            border: 1px solid #444;
            border-radius: 4px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: box-shadow 0.2s;
        }

        .product-card:hover {
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5); /* Just to make it look more appeaing I guess */
        }

        /* --- Card Content Sections bali lima sila kasi--- */
        .product-header {
            background-color: #444;
            color: #ffa600ff;
            padding: 8px 15px;
            font-size: 1em;
            font-weight: bold;
            text-align: center;
        }

        .card-content {
            padding: 15px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .product-image {
            width: 100%;
            height: 140px;
            overflow: hidden;
            margin-bottom: 10px;
            background-color: #000;
            border-radius: 2px;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
        }

        .product-description h3 {
            margin-top: 0;
            margin-bottom: 5px;
            color: #e00f0fff;
            font-size: 1.2em;
        }

        .product-description p {
            font-size: 0.85em;
            color: #ccc;
        }

        /* --- Price and Status Displays --- */
        .product-footer {
            margin-top: auto; 
            border-top: 1px solid #444;
            padding-top: 10px;
        }

        .price-display {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 1em;
            font-weight: bold;
            color: #fff;
        }

        .status {
            padding: 5px 8px;
            border-radius: 2px;
            font-size: 0.75em;
            font-weight: bold;
            text-transform: uppercase;
            text-align: center;
            margin-top: 10px;
        }

        /* Conditional Status Colors */
        .status-available {
            background-color: #000000ff;
            color: #02ff02ff;
        }
        .status-unavailable {
            background-color: #000000ff;
            color: #ff0026ff;
        }
        
        /* New styles for explicit conditionals/grades */
        .grade-alert {
            padding: 5px;
            font-size: 0.8em;
            font-weight: bold;
            text-align: center;
            margin-bottom: 5px;
            border-radius: 2px;
        }

        .aleph {
            background-color: #8B0000; /* Dark Red */
            color: #FFD700; /* Gold */
            border: 1px solid #FFD700;
        }

        .waw {
            background-color: #556B2F; /* Dark Olive Green */
            color: #ADFF2F; /* Green Yellow */
            border: 1px solid #ADFF2F;
        }

        .he {
            background-color: #191970; /* Midnight Blue */
            color: #ADD8E6; /* Light Blue */
            border: 1px solid #ADD8E6;
        }
        
        /* --- Receipt Styles --- */
        .receipt-box {
            margin-top: 40px;
            padding: 20px;
            background-color: #333;
            border: 2px solid #ffa600ff;
            border-radius: 6px;
            box-shadow: 0 0 15px rgba(255, 166, 0, 0.5);
            max-width: 600px;
            width: 100%;
            margin-left: auto;
            margin-right: auto;
        }

        .receipt-box h2 {
            color: #02ff02ff;
            text-align: center;
            border-bottom: 1px dashed #555;
            padding-bottom: 10px;
            margin-top: 0;
        }

        .receipt-line {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            font-size: 1em;
        }

        .receipt-separator {
            border-top: 1px solid #777;
            margin: 10px 0;
        }

        .receipt-line.total {
            font-size: 1.2em;
            font-weight: bold;
            color: #ffa600ff;
        }

        /* --- Footer --- */
        .info-footer {
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
        <h1><?= $shop ?></h1>
        <div class="status-bar">
            E.G.O. TIER: <?= $tier ?> | SYSTEM STATUS: <?= $status ?>
        </div>

        <div class="product-grid">
<?php
// --- Start PHP Logic with Loop and Conditionals ---
// Okay, let's start the actual shopping logic part. Don't fall asleep yet.
?>

        <?php
        $counter = 1; // Start counting the units from 1.
        $subTotal = 0; // Initialize the total cost (raw LOB points) to zero.
        $purchasedItemsCount = 0; // Keep track of how many things are actually available to buy.

        // LOOP: Going through each piece of gear, one by one.
        foreach ($gearList as $item) {
            
            $text = "";
            $class = "";
            $gradeWarning = "";

            // CONDITIONAL: Check item availability (IF/ELSE)
            if ($item['isAvailable']) {
                $text = "Extraction Available (Unit #{$counter})"; // Yay, we can buy it.
                $class = "status-available"; // Make the status green.
                // Add price to subtotal for the receipt calculation
                $subTotal += $item['price']; // Okay, add the price to the total, since it's available.
                $purchasedItemsCount++;
            } else {
                $text = "Extraction UNAVAILABLE (Unit #{$counter})"; // Boo, it's out of stock.
                $class = "status-unavailable"; // Make the status red.
            }

            // Extract the grade (e.g., 'ALEPH' from 'Twilight (ALEPH)')
            $grade = substr($item['name'], strpos($item['name'], '(') + 1, -1);
            
            // CONDITIONAL: Determine Grade-Specific Warning (IF/ELSE IF/ELSE)
            if ($grade == "ALEPH") {
                $gradeWarning = "<div class='grade-alert aleph'>WARNING: ALEPH CLASS HAZARD. PROCEED WITH CAUTION.</div>"; // It's an ALEPH. Yikes, big scary warning.
            } else if ($grade == "WAW") {
                $gradeWarning = "<div class='grade-alert waw'>ALERT: WAW CLASS. HIGH RISK.</div>"; // It's a WAW. Still scary, but less yikes.
            } else { // This catches HE and any other unknown grades
                $gradeWarning = "<div class='grade-alert he'>NOTICE: HE CLASS. Moderate Risk.</div>"; // Whatever, it's just an HE. Fine.
            }
            
            $finalPrice = $item['price'] * (1 + $tax); // This is the final price: raw price + tax. Gotta pay the City.
            ?>
            <div class='product-card'>
                <?= $gradeWarning ?>
                
                <div class='product-header'>
                    E.G.O. ID: <?= $item['id'] ?>
                </div>

                <div class='card-content'>
                    
                    <div class='product-image'>
                        <img src="<?= $item['imageUrl'] ?>" alt="<?= $item['name'] ?> E.G.O. Gear">
                    </div>

                    <div class='product-description'>
                        <h3><?= $item['name'] ?></h3>
                        <p><?= $item['description'] ?></p>
                    </div>
                
                    <div class='product-footer'>
                        <div class='price-display'>
                            <span>COST:</span>
                            <span><?= number_format($finalPrice, 0) . " " . $coin ?></span>
                        </div>
                        
                        <div class='status <?= $class ?>'><?= $text ?></div>
                    </div>

                </div>
            </div>
        <?php
        $counter++; // Next item please.
        }
        ?>
        </div> <!-- End product-grid -->

        <!-- Receipt Calculation and Display -->
        <?php 
        $totalTax = $subTotal * $tax; // Figure out how much tax we owe the corp.
        $grandTotal = $subTotal + $totalTax; // Subtotal plus tax equals the final, painful amount.
        ?>

        <div class="receipt-box">
            <h2>Acquisition Summary (<?= date("Y-m-d H:i:s") ?>)</h2>
            <div class="receipt-line">
                <span>Items Requested (Available):</span>
                <span><?= $purchasedItemsCount ?> Units</span>
            </div>
            <div class="receipt-line">
                <span>Subtotal (Raw LOB):</span>
                <span><?= number_format($subTotal, 0) . " " . $coin ?></span>
            </div>
            <div class="receipt-line">
                <span>Tax Rate (<?= $tax * 100 ?>%):</span>
                <span><?= number_format($totalTax, 0) . " " . $coin ?></span>
            </div>
            <div class="receipt-separator"></div>
            <div class="receipt-line total">
                <span>GRAND TOTAL DUE:</span>
                <span><?= number_format($grandTotal, 0) . " " . $coin ?></span>
            </div>
        </div>

<?php
require_once 'footer.php'; // Stick the bottom part of the page here. Done.
?>
