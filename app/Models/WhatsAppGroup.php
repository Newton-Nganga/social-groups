<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhatsAppGroup extends Model
{
    use HasFactory;

    protected $fillable = ['group_name', 'group_link', 'user_id'];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
