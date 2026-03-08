# Kyanon-KFresh-Trainee-Test-2026

A PHP script demonstrating product filtering and discount logic using OOP and functional-style array operations (`array_filter`, `array_map`).

## Requirements

- PHP 8.0+ (typed properties are used)

## How to Run

```bash
php Solution.php
```

## Code Walkthrough

### 1. `Product` class

A simple value object with typed properties and a `display()` formatter:

```php
public int $id;
public string $name;
public float $price;
public string $category;
```

`display()` returns a fixed-width formatted string:
```
[1] Laptop Pro 15             | $1299.99 | Electronics
```

### 2. Seed product data

Seven `Product` instances across four categories: **Electronics**, **Fashion**, **Kitchen**, and **Sports**.

| ID | Name                | Price     | Category    |
|----|---------------------|-----------|-------------|
| 1  | Laptop Pro 15       | $1299.99  | Electronics |
| 2  | Wireless Headphones | $149.99   | Electronics |
| 3  | Running Shoes       | $89.99    | Fashion     |
| 4  | Coffee Maker        | $59.99    | Kitchen     |
| 5  | Yoga Mat            | $29.99    | Sports      |
| 6  | Smartphone X12      | $999.99   | Electronics |
| 7  | Winter Jacket       | $199.99   | Fashion     |

### 3. `filterProductsByCategory(array, string): array`

Uses `array_filter` with `strcasecmp` for case-insensitive category matching. Returns a subset of the original array; the source is not modified.

```php
return array_filter($products, function (Product $product) use ($categoryName) {
    return strcasecmp($product->category, $categoryName) === 0;
});
```

### 4. `applyDiscount(array, float): array`

Uses `array_map` to create **new** `Product` instances with a reduced price. The original array is never mutated.

```php
$discountMultiplier = 1 - ($percent / 100);
$newPrice = round($product->price * $discountMultiplier, 2);
return new Product($product->id, $product->name, $newPrice, $product->category);
```

### 5. `printProducts(array, string): void`

Prints a titled section with a 60-character separator banner, then lists each product via `display()`. Outputs `(no products found)` when the array is empty.

### 6. Script execution

The script calls the above functions to produce five output sections:

1. All products (7 items)
2. Electronics only (3 items)
3. Fashion only (2 items)
4. All products after −20% discount (7 items)
5. Electronics after −20% discount (3 items)

## Expected Output

```
============================================================
 ALL PRODUCTS
============================================================
  [1] Laptop Pro 15             | $1299.99 | Electronics
  [2] Wireless Headphones       |  $149.99 | Electronics
  [3] Running Shoes             |   $89.99 | Fashion
  [4] Coffee Maker              |   $59.99 | Kitchen
  [5] Yoga Mat                  |   $29.99 | Sports
  [6] Smartphone X12            |  $999.99 | Electronics
  [7] Winter Jacket             |  $199.99 | Fashion

============================================================
 ELECTRONICS ONLY
============================================================
  [1] Laptop Pro 15             | $1299.99 | Electronics
  [2] Wireless Headphones       |  $149.99 | Electronics
  [6] Smartphone X12            |  $999.99 | Electronics

============================================================
 FASHION ONLY
============================================================
  [3] Running Shoes             |   $89.99 | Fashion
  [7] Winter Jacket             |  $199.99 | Fashion

============================================================
 ALL PRODUCTS AFTER 20% DISCOUNT
============================================================
  [1] Laptop Pro 15             | $1039.99 | Electronics
  [2] Wireless Headphones       |  $119.99 | Electronics
  [3] Running Shoes             |   $71.99 | Fashion
  [4] Coffee Maker              |   $47.99 | Kitchen
  [5] Yoga Mat                  |   $23.99 | Sports
  [6] Smartphone X12            |  $799.99 | Electronics
  [7] Winter Jacket             |  $159.99 | Fashion

============================================================
 ELECTRONICS AFTER 20% DISCOUNT
============================================================
  [1] Laptop Pro 15             | $1039.99 | Electronics
  [2] Wireless Headphones       |  $119.99 | Electronics
  [6] Smartphone X12            |  $799.99 | Electronics

============================================================
 Done!
============================================================
```

## Verification

Run `php Solution.php` and confirm **5 titled sections** appear with correct discounted prices (original × 0.80, rounded to 2 decimal places).

## 👤 Author
**Nguyen Huynh Minh Khoi** — Software Engineer (Magento./Drupal) Trainee, Kyanon Digital 2026
