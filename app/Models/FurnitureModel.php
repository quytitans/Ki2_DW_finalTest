<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FurnitureModel extends Model
{
    use HasFactory;
    public $timestamps=false;

    public function getArrayThumbnailAttribute(){
        if($this->avatar != null && strlen($this->avatar) >0){
            $this->avatar = substr($this->avatar, 0, -1);
            $arrayThumbnail = explode(',', $this->avatar);
            if(sizeof($arrayThumbnail)>0){
                return $arrayThumbnail;
            }
        }
        return [];
    }
}
