<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ManageLive
 *
 * @package App
 * @property string $url
 * @property string $validate
*/
class ManageLive extends Model
{
    use SoftDeletes;

    protected $fillable = ['url', 'validate'];
    protected $hidden = [];
    
    
    
}
