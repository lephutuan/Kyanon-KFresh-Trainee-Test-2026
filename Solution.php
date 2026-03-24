<?php
class Product
{
    public $id;
    public $name;
    public $price;
    public $category;

    public function __construct($id, $name, $price, $category)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
    }
}

//Tạo mãng chứ 5 sản phẩm
$products = [
    new Product(1, "Laptop Dell", 2, "Điện tử"),
    new Product(2, "Iphone 8", 8, "Điện tử"),
    new Product(3, "Bàn chữ K", 10, "Nội thất"),
    new Product(4, "Ghế công thái học", 20, "Nội thất"),
    new Product(5, "Bộ 10 chén", 4, "Gia dụng")
];

//Hàm lọc sản phẩm thuộc 1 danh mục cụ thể
function filterProductsByCategory($products, $categoryName)
{
    $filteredProducts = [];
    foreach ($products as $product) {
        if ($product->category === $categoryName) {
            $filteredProducts[] = $product;
        }
    }
    return $filteredProducts;
}

//Hàm giảm giá cho tất cả sản phẩm và trả về danh sách mới với giá đã cập nhật
function applyDiscount($products, $percent)
{
    $discountedProducts = [];
    foreach ($products as $product) {
        $discountedPrice = $product->price * (1 - $percent / 100);
        $discountedProducts[] = new Product($product->id, $product->name, $discountedPrice, $product->category);
    }
    return $discountedProducts;
}

$electronics = filterProductsByCategory($products, "Điện tử");
echo "Sản phẩm thuộc danh mục 'Điện tử':\n";
foreach ($electronics as $p) {
    echo $p->name . " - " . $p->price . PHP_EOL;
}


$discountedProducts = applyDiscount($products, 50);
echo "\nSản phẩm sau khi giảm giá 50%:\n";
foreach ($discountedProducts as $p) {
    echo $p->name . " - " . $p->price . PHP_EOL;
}

?>