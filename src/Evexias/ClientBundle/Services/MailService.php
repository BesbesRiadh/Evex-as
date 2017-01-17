<?php

namespace Evexias\ClientBundle\Services;

use Symfony\Component\DependencyInjection\Container;

/**
 * Description of MailService
 *
 * @author SSH1
 */
class MailService {

    private $oContainer;

    public function __construct(Container $oContainer) {
        $this->oContainer = $oContainer;
        $this->sNoReplyMail = $this->oContainer->getParameter('noreply_mail');
    }

    /**
     * Envoie le mail de changement mot de passe
     *
     * @param string $psFrom
     * @param string $psMailTo
     * @param string $psBody
     * @return boolean
     *
     * @author Walid Saadaoui
     */
    public function sendMail($email, $template) {
        $oLogger = $this->oContainer->get('mail_logger');
        try {
            $oMailer = $this->oContainer->get('mailer');

            $oMail = \Swift_Message::newInstance();

            $sBody = $this->oContainer->get('templating')->render($template);

            $oMail->setSubject('Inscrition à Evexias')
                    ->setFrom($this->sNoReplyMail)
                    ->setTo($email)
                    ->setBody($sBody)
                    ->setContentType('text/html');

            $bSended = $oMailer->send($oMail);

            $transport = $oMailer->getTransport();
            if ($transport instanceof \Swift_Transport_SpoolTransport) {
                $spool = $transport->getSpool();
                $sent = $spool->flushQueue($this->oContainer->get('swiftmailer.transport.real'));
                if (is_array($email)) {
                    $this->$email = implode(",", $email);
                }
                $oLogger->info("Envoie Nouveau message d'inscription vers $email");

                return true;
            }
            return $bSended;
        } catch (\Exception $ex) {
            $oLogger->error($ex->getMessage());
            throw $ex;
        }
        return false;
    }

}
