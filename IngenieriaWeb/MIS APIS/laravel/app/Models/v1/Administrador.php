<?php
 
namespace App\Models\v1;

use Illuminate\Database\Eloquent\Model;
use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\SoftDeletes;

class Administrador extends Model
{
    use HasUUID;
    use SoftDeletes;

  
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $uuidFieldName = 'id';
    
    
}