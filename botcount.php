<?php
$data = [
    'category' => [
        'one' => [
            'priority' => '3',
            'views' => [
                'user_count' => 345,
                'bot_count' => 9392
            ]
        ],
        'two' => [
            'priority' => '1',
            'views' => [
                'user_count' => 123222,
                'bot_count' => 99
            ]
        ],
        'three' => [
            'priority' => '2',
            'views' => [
                'user_count' => 23,
                'bot_count' => 1
            ]
        ],
    ]
];

$botCounts = [];
foreach ($data['category'] as $item) {
    $botCounts[] = $item['views']['bot_count'];
}
$maxBot = max($botCounts);
echo "Максимальный bot_count: " . $maxBot . "\n";

$minBot = min($botCounts);
echo "Минимальный bot_count: " . $minBot . "\n";

$items = [];
foreach ($data['category'] as $item) {
$items[] = [
    'priority' => (int)$item['priority'],
    'user_count' => $item['views']['user_count'],
    'bot_count' => $item['views']['bot_count']
];
}
usort($items, function($a, $b) {
    return $a['priority'] <=> $b['priority'];
});
foreach ($items as $item) {
    echo "priority = " . $item['priority']
    . ", user_count = " . $item['user_count']
    . ", bot_count = " . $item['bot_count'] . "\n";
}