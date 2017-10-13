<?php


namespace App\Skippaz\Services\MailTemplate;


use App\EmailTemplate;

class MailTemplate {

    /**
     * Send email template
     *
     * @param $templateName
     * @param array $mergeVars
     * @param $toEmail
     * @param $toName
     */
    public function send($templateName, array $mergeVars, $toEmail, $toName = null)
    {
        $template = $this->fetchTemplate($templateName);

        $body = $this->replaceVariables($mergeVars, $template->body);

        \Mail::send('emails.email_template', ['body' => $body], function ($m) use ($template, $toEmail, $toName)
        {
            $m->to($toEmail, $toName)->subject($template->subject);
        });
    }


    /**
     * Fetch template from DB
     * (by selector - template name)
     *
     * @param $selector
     * @return mixed
     * @throws \Exception
     */
    protected function fetchTemplate($selector)
    {
        $template = EmailTemplate::whereSelector($selector)->first();

        if(! $template)
            throw new \Exception("Email template: '{$selector}' don't exist.");

        return $template;
    }


    /**
     * Replace placeholders in template with provided values
     *
     * @param array $vars
     * @param $text
     * @return mixed
     */
    protected function replaceVariables(array $vars, $text) {

        foreach($vars as $key => $value){
            $text = str_replace('{' .$key .'}', $value, $text);
        }

        return $text;
    }
}