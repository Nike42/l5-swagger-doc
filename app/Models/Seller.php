<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Seller extends Model
{
    use HasFactory;
    
    protected $table="seller";

    /**
     * @param array $attributes
     * @return Seller
     */
    public function createSeller(array $attributes){
        $seller = new self();
        $seller->title = $attributes["title"];
        $seller->content = $attributes["content"];
        $seller->save();
        return $seller;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getSeller(int $id){
        $seller = $this->where("id",$id)->first();
        return $seller;
    }

    /**
     * @return Seller[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getsSeller(){
        $sellers = $this::all();
        return $sellers;
    }

    /**
     * @param int $id
     * @param array $attributes
     * @return mixed
     */
    public function updateSeller(int $id, array $attributes){
        $seller = $this->getSeller($id);
        if($seller == null){
            throw new ModelNotFoundException("Cant find seller");
        }
        $seller->title = $attributes["title"];
        $seller->content = $attributes["content"];
        $seller->save();
        return $seller;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function deleteSeller(int $id){
        $seller = $this->getSeller($id);
        if($seller == null){
            throw new ModelNotFoundException("Seller item not found");
        }
        return $seller->delete();
    }
}


