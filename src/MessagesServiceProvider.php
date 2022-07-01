<?php
namespace Leeuwenkasteel\Messages;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Leeuwenkasteel\Messages\Console\InstallMessagesPackage;
use Leeuwenkasteel\Messages\Http\Livewire\Notify;
use Leeuwenkasteel\Messages\Http\Livewire\Notifications;
use Livewire;

class MessagesServiceProvider extends ServiceProvider{
    public function boot(){
		Schema::defaultStringLength(255);
		
    	$this->loadRoutesFrom(__DIR__.'/routes/web.php');
    	$this->loadViewsFrom(__DIR__.'/resources/views', 'mess');
    	$this->loadTranslationsFrom(__DIR__.'/resources/lang', 'mess');
		
		$this->publishes([__DIR__.'/database/migrations' => database_path('migrations')], 'mess_migrations');
        //$this->publishes([__DIR__.'/database/seeders' => database_path('seeders')], 'mess_seeders');
		
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__.'/resources/assets' => public_path(),], 'message-assets');
            $this->commands([
                InstallMessagesPackage::class,
            ]);
		  }
          $this->loadViewComponentsAs('mess', [
			Css::class,
		  ]);
		  
		  Livewire::component('notify', Notify::class);
          Livewire::component('notifications', Notifications::class);
    }

    public function register(){
		 
    }
}