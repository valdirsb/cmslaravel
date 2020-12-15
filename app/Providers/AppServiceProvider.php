<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use App\Models\Page;
use App\Models\Customer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            // Add some items to the menu...
        
            /*
            $items = Page::all()->map(function (Page $page) {
                return [
                    'text' => $page['name'],
                    'url' => asset('/painel/page/'.$page['slug'])
                ];
            });
            */
            $pages = Customer::find(env('APP_CUSTOMER_ID'))->pages;

            $items = $pages->map(function (Page $page) {
                return [
                    'text' => $page['name'],
                    'url' => asset('/painel/page/'.$page['id'].'/pagecontent')
                ];
            });
            $totalitens = count($items);

            $event->menu->addAfter('pages', [
                'text'    => 'Paginas',
                'key'     => 'multpag',
                'icon'    => 'fas fa-fw fa-share',
                'label'       => $totalitens,
                'label_color' => 'success',
            ]);


            $event->menu->addIn('multpag', ...$items);
            

        });
    }
}
