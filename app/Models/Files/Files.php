<?php

namespace App\Models\Files;

use App\Company\Traits\UserTrait;
use App\Enums\ServicosStatusEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    // use UserTrait;
    use HasFactory;

    protected $fillable = ['user_id','type_id', 'name','path','servicos','data_arquivo'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function type()
    {
        return $this->belongsTo(TypeFiles::class);
    }
}
