<?php
namespace Vnext\Training\Cron;
use Magento\Framework\Mail\Template\TransportBuilder;
use Vnext\Training\Helper\Email;

class SendMail
{
    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;
    private $helperMail;
    /**
     * @var TransportBuilder
     */
    private $transportBuilder;

    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        TransportBuilder $transportBuilder,
        \Vnext\Training\Helper\Email $helperMail
    )
    {
        $this->logger = $logger;
        $this->transportBuilder = $transportBuilder;
        $this->helperMail = $helperMail;
    }

    /**
     * Execute the cron
     *
     * @return void
     */

    public function execute()
    {
        return $this->helperMail->sendEmail();

    }
}
