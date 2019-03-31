<?php

namespace Modules\PMS\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\PMS\Entities\ProjectProposal;

class ProjectWorkflowNotification extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var ProjectProposal
     */
    private $projectProposal;

    /**
     * Create a new message instance.
     *
     * @param ProjectProposal $projectProposal
     */
    public function __construct(ProjectProposal $projectProposal)
    {
        $this->projectProposal = $projectProposal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        return $this->markdown('pms::emails.project_proposal_notification_mail')
//            ->with('projectProposal' => $this->projectProposal);
        return $this->markdown('pms::emails.project_proposal_notification_mail')
            ->with('projectProposal', $this->projectProposal);
    }
}
