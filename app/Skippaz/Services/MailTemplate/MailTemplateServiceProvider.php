<?php


namespace App\Skippaz\Services\MailTemplate;


use Illuminate\Support\ServiceProvider;

class MailTemplateServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('mail-template', function() {
           return new MailTemplate();
        });
    }
}