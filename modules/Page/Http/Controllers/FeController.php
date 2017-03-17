<?php

namespace Modules\Page\Http\Controllers;

use Illuminate\Routing\Controller,
    App\Http\Controllers\FE\BaseController,
    Modules\Page\Models\Page;

class FeController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($url='')
    {
        if ( $url )
        {
            $this->dataView['row'] = Page::where('url', $url)->first();
            
            if( !$this->dataView['row'] ) abort(404);

            $this->dataView['title'] = $this->dataView['row']->title;

            return view($this->tmpl.'.Page.detail', $this->dataView);
        }
        else
        {
            return view($this->tmpl.'.Page.index', $this->dataView);
        }
    }
}
