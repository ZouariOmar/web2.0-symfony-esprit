<?php

/**
 * author mailer service
 *
 * PHP version 8.4.12
 *
 * @category Category
 * @package  Package
 * @author   @ZouariOmar <zouariomar20@gmail.com>
 * @license  GPL3.0 License
 * @link     https://github.com/ZouariOmar/web2.0-symfony-esprit/tree/main/src/Service/AuthorMailerService.php
 * @link     https://www.mailersend.com/integrations/symfony
 */

namespace App\Service;

use Symfony\Component\Mailer\Transport\TransportInterface;
use Symfony\Component\Mime\Email;

final class AuthorMailerService
{
    public function __construct(private TransportInterface $transport)
    {
    }

    public function sendNow(string $to): void
    {
        $email = (new Email())
            ->from('hello@example.com')
            ->to($to)
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');

        $this->transport->send($email); // Send immediately the mail
    }
}
