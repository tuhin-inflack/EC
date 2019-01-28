<?php

namespace App\Entities\monthlyUpdate;

use Illuminate\Database\Eloquent\Model;

class MonthlyUpdateAttachment extends Model
{
    protected $table = 'monthly_update_attachments';

    protected $fillable = ['monthly_update_id', 'file_name', 'file_ext', 'file_path'];
}
