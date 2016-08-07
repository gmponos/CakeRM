<?= $this->CakeMap->map([
    'id' => 'business_' . $business['Business']['id'],
    'width' => '400px',
    'height' => '400px',
    'localize' => false,
    'longitude' => null,
    'latitude' => null,
    'address' => $business['Business']['address'] . ' ' . $business['City']['name'],
    'markerTitle' => $business['Business']['address'],
    'windowText' => $business['Business']['address'],
]);
