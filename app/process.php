<?php
require_once('functions.php');

function addOrUpdateProduct(&$countedProducts, $barcode, $quantity) {
    $existingIndex = findProductIndexByBarcode($countedProducts, $barcode);

    if ($existingIndex !== false) {
        $countedProducts[$existingIndex]['counted_quantity'] += $quantity;
    } else {
        $product = array(
            'product_id' => $barcode,
            'counted_quantity' => $quantity
        );
        $countedProducts[] = $product;
    }
}

function findProductIndexByBarcode($countedProducts, $barcode) {
    foreach ($countedProducts as $index => $product) {
        if ($product['product_id'] == $barcode) {
            return $index;
        }
    }
    return false;
}

if (isset($_POST['addCount'])) {
    $barcodeList = $_POST['barcode'];
    $qtyList = $_POST['qty'];

    $countData = array(
        'count_date' => date('Y-m-d'),
        'counted_products' => array()
    );

    foreach ($barcodeList as $index => $barcode) {
        $product = array(
            'product_id' => $barcode,
            'counted_quantity' => $qtyList[$index]
        );
        $countData['counted_products'][] = $product;
    }

    addCount($countData);

    header("Location: ../counts");
    exit();
}

if (isset($_POST['editCount'])) {
    $countId = isset($_POST['count_id']) ? $_POST['count_id'] : null;
    $newCountedProducts = array();

    if (isset($_POST['barcode']) && isset($_POST['qty'])) {
        $barcodeList = $_POST['barcode'];
        $qtyList = $_POST['qty'];

        foreach ($barcodeList as $index => $barcode) {
            $product = array(
                'product_id' => $barcode,
                'counted_quantity' => $qtyList[$index]
            );
            $newCountedProducts[] = $product;
        }
    }

    if (!empty($countId) && !empty($newCountedProducts)) {
        if (updateCount($countId, $newCountedProducts)) {
            header("Location: ../counts");
            exit();
        } else {
            echo "Sayım güncellenirken bir hata oluştu.";
        }
    } else {
        echo "Güncelleme için gerekli veriler eksik.";
    }
}

if (isset($_GET['deleteCount'])) {
    $countId = $_GET['id'];

    if (deleteCountById($countId)) {
        header("Location: ../counts");
        exit();
    } else {
        echo "Sayım silinirken bir hata oluştu.";
    }
}

?>
