<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commonMedicineModel extends Model
{

    public $table='common_medicine_table';
    public $primaryKey='id';
    public $incrementing=true;
    public $keyType='int';
    public  $timestamps=false;


    public function MedicineDetails(){
        return $this->hasOne(medicineDetailsModel::class);
    }
}

