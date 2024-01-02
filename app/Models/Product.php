<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Product extends Model
{
    use HasFactory;

    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - Chứa primary key của sản phẩm
     * $this->attributes['name'] - string - Chứa tên của sản phẩm
     * $this->attributes['size'] - string - Chứa các kích thước của sản phẩm
     * $this->attributes['color'] - string - Chứa các màu sắc của sản phẩm
     * $this->attributes['description'] - string - Chứa mô tả của sản phẩm
     * $this->attributes['brand'] - string - Chứa hãng của sản phẩm
     * $this->attributes['price'] - decimal - Chứa giá của sản phẩm
     * $this->attributes['created_at'] - timestamp - Chứa ngày tạo của sản phẩm trên DB
     * $this->attributes['updated_at'] - timestamp - Chứa ngày cập nhật của sản phẩm trên DB
     */

    protected $fillable = [
        'name',
        'size',
        'color',
        'description',
        'brand',
        'price',
    ];

    public static function validate(Request $request)
    {
        $request->validate([
            "name" => "required|max:255",
            "size" => "required|max:255",
            "color" => "required|max:255",
            "description" => "required",
            "brand" => "required|max:255",
            "price" => "required|numeric",
        ]);
    }

    public static function pricesXQuantities($products_in_cart, $products_in_session)
    {
        $total = 0;
        foreach ($products_in_cart as $a_product) {
            $total = $total + ($a_product->getPrice() * $products_in_session[$a_product->getId()]['quantity']);
        }

        return $total;
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getSize()
    {
        return $this->attributes['size'];
    }

    public function setSize($size)
    {
        $this->attributes['size'] = $size;
    }

    public function getColor()
    {
        return $this->attributes['color'];
    }

    public function setColor($color)
    {
        $this->attributes['color'] = $color;
    }

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }

    public function getBrand()
    {
        return $this->attributes['brand'];
    }

    public function setBrand($brand)
    {
        $this->attributes['brand'] = $brand;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }

    public function getImage()
    {
        return $this->attributes['image'];
    }
    public function setImage($image)
    {
        $this->attributes['image'] = $image;
    }

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($created_at)
    {
        $this->attributes['created_at'] = $created_at;
    }

    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt($updated_at)
    {
        $this->attributes['updated_at'] = $updated_at;
    }
}
