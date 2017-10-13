<?php


namespace App\Skippaz\Services\MailTemplate;


use Illuminate\Support\Facades\Facade;

class MailTemplateFacade extends Facade {

    /**
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'mail-template';
    }

}