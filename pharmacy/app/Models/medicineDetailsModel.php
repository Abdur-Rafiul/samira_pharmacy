<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class medicineDetailsModel extends Model
{
    use HasFactory;
    public $table='medicine_details';
    public $primaryKey='id';
    public $incrementing=true;
    public $keyType='int';
    public  $timestamps=false;

    public function CommonMedicine(): BelongsTo
    {

        return $this->belongsTo(commonMedicineModel::class);
    }
}
