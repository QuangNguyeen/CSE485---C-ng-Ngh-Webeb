<?php
$products = [];
if (file_exists('products.json')) {
    $jsonData = file_get_contents('products.json');
    $products = json_decode($jsonData, true);
}
if (isset($_GET['index'])) {
    $index = intval($_GET['index']);
    if (isset($products[$index])) {
        unset($products[$index]);
        $products = array_values($products);
        file_put_contents('products.json', json_encode($products, JSON_PRETTY_PRINT));
    }
}
header("Location: index.php");
exit();
?>

