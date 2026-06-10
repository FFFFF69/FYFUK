<?php
if (!is_dir('image_folder')) {
    mkdir('image_folder', 0777, true);
}
$json = file_get_contents('php://input'); ////// вместо этого можно вставить пример из задания 

$dataArray = json_decode($json, true);

if (!$dataArray) {
die('Ошибка JSON');
}
$result = [];
foreach ($dataArray['call'] as $product) {
    
if (($product['tradeble'] ?? '') === 'true') {  
    $base64 = $product['image']['base64'] ?? '';
if (strpos($base64, 'base64,') !== false) {
    $base64 = explode('base64,', $base64)[1];
}
    $imageData = base64_decode($base64);
if ($imageData === false) {
continue;
    }     
    $fileName = $product['image_name'] . '.jpeg';
    $filePath = 'image_folder/' . $fileName;
if (file_put_contents($filePath, $imageData)) {
    $result[] = [
    'image_name' => $product['image_name'],
    'link' => $product['image']['link'] ?? '',
    'file_path' => '/' . $filePath,
    'name' => $product['name'] ?? ''
    ];
    }
  }
}
header('Content-Type: application/json; charset=utf-8');
echo json_encode($result);