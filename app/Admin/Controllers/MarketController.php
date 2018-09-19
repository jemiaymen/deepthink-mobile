<?php

namespace App\Admin\Controllers;

use App\Market;
use App\Client;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Market);

        $grid->id('Id');
        $grid->client_id('Client id');
        $grid->info('Info');
        $grid->description('Description');

        $grid->picture()->display(function ($picture) {
            return "<img src='/uploads/$picture' width='70'/>";
        });

        $grid->lat('Lat');
        $grid->lng('Lng');
        $grid->address('Address');
        $grid->tel('Tel');
        $grid->email('Email');
        $grid->fb('Fb');
        $grid->lin('Lin');
        $grid->twi('Twi');
        $grid->insta('Insta');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Market::findOrFail($id));

        $show->id('Id');
        $show->client_id('Client id');
        $show->info('Info');
        $show->description('Description');
        $show->picture()->display(function ($picture) {
            return "/uploads/$picture";
        });
        $show->lat('Lat');
        $show->lng('Lng');
        $show->address('Address');
        $show->tel('Tel');
        $show->email('Email');
        $show->fb('Fb');
        $show->lin('Lin');
        $show->twi('Twi');
        $show->insta('Insta');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Market);

        $form->select('client_id')->options(function ($id) {
            $client = Client::find($id);

            if ($client) {
                return [$client->id => $client->lbl];
            }

        })->ajax('/admin/api/client');

        $form->text('info', 'Info');
        $form->text('description', 'Description');
        $form->image('picture', 'Picture')->uniqueName();
        $form->number('lat','Latitude');
        $form->number('lng', 'Longitude');
        $form->text('address', 'Address');
        $form->mobile('tel', 'Tel');
        $form->email('email', 'Email');
        $form->url('fb', 'Facebook');
        $form->url('lin', 'LinkedIn');
        $form->url('twi', 'Twitter');
        $form->url('insta', 'Instagram');

        return $form;
    }


    
}
