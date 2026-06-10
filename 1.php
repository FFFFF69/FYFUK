<?php
 function low_quantity($data) {
    return $data - ($data * 0.5);
}
function high_quantity($data) {
    return $data * 0.5;
}
function medium_quantity($data) {
    return 0;
}
function handle($data) {
if ($data < 7) {
    $result = low_quantity($data);
} elseif ($data > 40) {
    $result = high_quantity($data);
} elseif ($data == 10) {
    $result = medium_quantity($data);
} else {
    $result = $data;
}
    return round($result);
}
function countUniqueResults($first, $second) {
    $results = [];
for ($i = $first; $i <= $second; $i++) {
    $results[] = handle($i);
}
    return count(array_unique($results));
}
$result1 = countUniqueResults(1, 15);
$result2 = countUniqueResults(3, 55);
$result3 = countUniqueResults(9, 43);

echo "От 1 до 15: " . $result1 . "\n";
echo "От 3 до 55: " . $result2 . "\n";
echo "От 9 до 43: " . $result3 . "\n";