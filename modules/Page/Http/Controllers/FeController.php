<?php

namespace Modules\Page\Http\Controllers;

use Illuminate\Routing\Controller,
    App\Http\Controllers\FE\BaseController,
    Modules\Page\Models\Page,
    Cache;

class FeController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $test = Cache::rememberForever('views.page.index', function() {
            return 'aaa bbb';//view($this->tmpl . 'Page.index', $this->dataView)
        });

        echo $test;
    }
}
