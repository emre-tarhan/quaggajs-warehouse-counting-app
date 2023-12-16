<?php
error_reporting(E_ALL);

$fileProducts = "../data/products.json";
$fileCounts = "../data/counts.json";

function getProducts() {
    global $fileProducts;
    $data = file_get_contents($fileProducts);
    return json_decode($data, true);
}

function addProduct($product) {
    global $fileProducts;
    $products = getProducts();

    $lastProduct = end($products);
    $product['product_id'] = $lastProduct ? $lastProduct['product_id'] + 1 : 1;

    $products[] = $product;
    file_put_contents($fileProducts, json_encode($products));
}

function updateProduct($id, $newData) {
    global $fileProducts;
    $products = getProducts();
    foreach ($products as &$product) {
        if ($product['product_id'] == $id) {
            $product = array_merge($product, $newData);
            break;
        }
    }
    file_put_contents($fileProducts, json_encode($products));
}

function deleteProduct($id) {
    global $fileProducts;
    $products = getProducts();
    foreach ($products as $key => $product) {
        if ($product['product_id'] == $id) {
            unset($products[$key]);
            break;
        }
    }
    file_put_contents($fileProducts, json_encode($products));
}

function getCounts() {
    global $fileCounts;
    $data = file_get_contents($fileCounts);
    return json_decode($data, true);
}

function addCount($count) {
    global $fileCounts;
    $counts = getCounts();

    $lastCount = end($counts);
    $count['count_id'] = $lastCount ? $lastCount['count_id'] + 1 : 1;

    $counts[] = $count;
    file_put_contents($fileCounts, json_encode($counts));
}

function updateCount($id, $newCountedProducts) {
    global $fileCounts;
    $counts = getCounts();

    foreach ($counts as &$count) {
        if ($count['count_id'] == $id) {
            $count['counted_products'] = array();

            foreach ($newCountedProducts as $newProduct) {
                $existingIndex = findProductIndexByBarcode($count['counted_products'], $newProduct['product_id']);

                if ($existingIndex !== false) {
                    $count['counted_products'][$existingIndex]['counted_quantity'] += $newProduct['counted_quantity'];
                } else {
                    $count['counted_products'][] = $newProduct;
                }
            }

            file_put_contents($fileCounts, json_encode($counts, JSON_PRETTY_PRINT));
            return true;
        }
    }

    return false;
}


function findProductByBarcode($products, $barcode) {
    foreach ($products as $product) {
        if ($product['product_id'] == $barcode) {
            return $product;
        }
    }
    return false;
}


function deleteCountById($id) {
    global $fileCounts;
    $counts = getCounts();

    foreach ($counts as $key => $count) {
        if ($count['count_id'] == $id) {
            unset($counts[$key]);
            file_put_contents($fileCounts, json_encode($counts, JSON_PRETTY_PRINT));
            return true;
        }
    }

    return false;
}

function getCountById($id) {
    $counts = getCounts();

    foreach ($counts as $count) {
        if ($count['count_id'] == $id) {
            return isset($count['counted_products']) ? $count['counted_products'] : [];
        }
    }

    return [];
}
?>