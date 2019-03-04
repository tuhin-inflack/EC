<?php

namespace App\Entities\Sharing;

use Illuminate\Database\Eloquent\Model;

class ShareConversation extends Model
{
    protected $table = 'share_conversations';
    protected $fillable = ['feature_id', 'ref_table_id', 'is_group_notification', 'department_id', 'designation_id', 'to_user_id', 'from_user_id', 'message', 'status'];
}
