<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class Products extends Model
{
    use HasFactory;
    protected $table="products";

    /**
     * @param array $attributes
     * @return Products
     */
    public function createProducts(array $attributes){
        $products = new self();
        $products->name = $attributes["name"];
        $products->category = $attributes["category"];
        $products->save();
        return $products;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getProducts(int $id){
        $products = $this->where("id",$id)->first();
        return $products;
    }

    /**
     * @return Products[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getsProducts(){
        $products = $this::all();
        return $products;
    }

    /**
     * @param int $id
     * @param array $attributes
     * @return mixed
     */
    public function updateProducts(int $id, array $attributes){
        $products = $this->getProducts($id);
        if($products == null){
            throw new ModelNotFoundException("Cant find products");
        }
        $products->name = $attributes["name"];
        $products->category = $attributes["category"];
        $products->save();
        return $products;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function deleteProducts(int $id){
        $products = $this->getProducts($id);
        if($products == null){
            throw new ModelNotFoundException("Products item not found");
        }
        return $products->delete();
    }
}


 
    
    
