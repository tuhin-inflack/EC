<?php 
/**
 *  Created By - Imran Hossain - 25-05-2019
 */
namespace Modules\IMS\Entities;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{

    protected $table = 'auction';
    protected $fillable = ['title', 'status', 'date' ];

   

}