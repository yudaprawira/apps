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
    public function index()
    {
        return view($this->tmpl.'.Page.index', $this->dataView);
    }
}
