<?php
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $file = 'flowers.json';

    if (file_exists($file)) {
        $flowers = json_decode(file_get_contents($file), true);
        $flowerExists = false;

        foreach ($flowers as $index => $flower) {
            if ($flower['id'] === $id) {
                unset($flowers[$index]);
                $flowerExists = true;
                break;
            }
        }
        if ($flowerExists) {
            $products = array_values($flowers);
            file_put_contents($file, json_encode($flowers, JSON_PRETTY_PRINT));
        }
    }
    header("Location: admin.php");
} else {
    echo "Invalid product ID.";
}
exit();
?>
