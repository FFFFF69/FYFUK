<?php
function search($data, $criteria) {
    $result = [];

foreach ($data as $key => $item) {
    $priceMatch = isset($criteria['price']) && isset($item['price']) && $item['price'] == $criteria['price'];
     $nameMatch = isset($criteria['name']) && isset($item['name']) && $item['name'] == $criteria['name'];
if ($priceMatch || $nameMatch) {
    $result[$key] = $item;
    }
}
    return $result;
}
////////////////////// сюда можно добавить массив для проверки работы функции поиска
$found = search($data, ['price' => 500, 'name' => 'Товар_10']); // сюда также вы можете написать любые данные которые будете искать
echo "Найдено элементов: " . count($found) . "\n";
print_r($found);

////////////////////// $data = [];
for ($i = 1; $i <= 150; $i++) {
    $data["category$i"] = [
        'price' => rand(100, 1000),
        'name' => 'Товар_' . rand(1, 50)
    ];
} // массмв для проверки