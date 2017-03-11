<?php

namespace App\Http\Controllers\BE;

use Illuminate\Http\Request,
    App\Models\System\Log,
    App\Models\System\User,
    App\Http\Requests,
    Yajra\Datatables\Datatables;    

class DashboardController extends BaseController
{
    function __construct() {
        parent::__construct();        
    }
    
    function homepage()
    {
        $this->dataView['totalKaryawan'] = formatNumber(0);
        $this->dataView['totalHadir'] = formatNumber(0,2);
        $this->dataView['totalProduksi'] = formatNumber(0);
        $this->dataView['totalGaji'] = formatNumber(0);
        
        return view($this->tmpl . 'dashboard', $this->dataView);
    }
    
    public function systemLog()
    {
        if ( empty($_POST) )
        {
            return view($this->tmpl . 'system.log', $this->dataView);    
        }
        else
        {
            $user = getRowArray(User::get(), 'id', 'username');
            return Datatables::of(Log::query()->orderBy('created_at', 'DESC'))
                                ->addColumn('created_by', function ($r) use ($user) { return $user[$r->created_by]; })
                                ->make(true);
        }
    }
}
