<?php
/**
 * Created by PhpStorm.
 * User: bs-205
 * Date: 3/4/19
 * Time: 12:06 PM
 */

namespace App\Services\Sharing;


use App\Repositories\Sharing\ShareConversationRepository;
use App\Traits\CrudTrait;

class ShareConversationService
{
    use CrudTrait;
    private $shareConversationRepository;

    public function __construct(ShareConversationRepository $conversationRepository)
    {
        $this->shareConversationRepository = $conversationRepository;
        $this->setActionRepository($this->shareConversationRepository);
    }
}