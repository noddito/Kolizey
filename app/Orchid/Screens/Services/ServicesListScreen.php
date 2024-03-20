<?php

namespace App\Orchid\Screens\Services;

use App\Models\Service;
use App\Orchid\Layouts\Services\ServicesListLayout;
use Orchid\Screen\Repository;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class ServicesListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'services' => Service::paginate(25)
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Список услуг';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [

        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::table('services' , [
                TD::make('name','Название услуги')->width('250px'),
                TD::make('description','Описание')->width('250px'),
                TD::make('logo_path','Логотип')->width('150px')
                    ->render(fn (Service $services) =>
                    "<img src='http://127.0.0.1:5173/{$services->getAttribute('logo_path')}'
                              alt='{$services->getAttribute('logo_path')}'
                              class='mw-100 d-block img-fluid rounded-1' width='100px'>"),
                TD::make('created_at','Создано')->defaultHidden(true),
                TD::make('updated_at','Обновлено')->defaultHidden(true),

            ])
        ];
    }
}
