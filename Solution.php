<?php

class Product {
    public int $id;
    public string $name;
    public float $price;
    public string $category;

    public function __construct(int $id, string $name, float $price, string $category) {
        $this->id       = $id;
        $this->name     = $name;
        $this->price    = $price;
        $this->category = $category;
    }

    public function display(): string {
        return sprintf(
            "[%d] %-25s | $%7.2f | %s",
            $this->id,
            $this->name,
            $this->price,
            $this->category
        );
    }
}

$products = [
    new Product(1, "Laptop Pro 15",      1299.99, "Electronics"),
    new Product(2, "Wireless Headphones",  149.99, "Electronics"),
    new Product(3, "Running Shoes",         89.99, "Fashion"),
    new Product(4, "Coffee Maker",          59.99, "Kitchen"),
    new Product(5, "Yoga Mat",              29.99, "Sports"),
    new Product(6, "Smartphone X12",       999.99, "Electronics"),
    new Product(7, "Winter Jacket",        199.99, "Fashion"),
];

function filterProductsByCategory(array $products, string $categoryName): array {
    return array_filter($products, function (Product $product) use ($categoryName) {
        return strcasecmp($product->category, $categoryName) === 0;
    });
}

function applyDiscount(array $products, float $percent): array {
    return array_map(function (Product $product) use ($percent) {
        $discountMultiplier = 1 - ($percent / 100);
        $newPrice = round($product->price * $discountMultiplier, 2);

        return new Product(
            $product->id,
            $product->name,
            $newPrice,
            $product->category
        );
    }, $products);
}


function printProducts(array $products, string $title): void {
    echo "\n" . str_repeat("=", 60) . "\n";
    echo " " . strtoupper($title) . "\n";
    echo str_repeat("=", 60) . "\n";

    if (empty($products)) {
        echo "  (no products found)\n";
        return;
    }

    foreach ($products as $product) {
        echo "  " . $product->display() . "\n";
    }
}

printProducts($products, "All Products");

$electronics = filterProductsByCategory($products, "Electronics");
printProducts($electronics, "Electronics Only");

$fashion = filterProductsByCategory($products, "Fashion");
printProducts($fashion, "Fashion Only");

$discounted = applyDiscount($products, 20);
printProducts($discounted, "All Products After 20% Discount");

$discountedElectronics = applyDiscount($electronics, 20);
printProducts($discountedElectronics, "Electronics After 20% Discount");

echo "\n" . str_repeat("=", 60) . "\n";
echo " Done!\n";
echo str_repeat("=", 60) . "\n\n";