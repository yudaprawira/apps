<?php
    use Modules\AkunBank\Models\AkunBank;

    /*
    |--------------------------------------------------------------------------
    | GET BANK
    |-------------------------------------------------------------------------
    */
    function getBank()
    {
        $cacheKey = 'getBank';
        
        if(!\Cache::has($cacheKey)) 
        {
            $rows = getRowArray(AkunBank::where('status', 1)->get(), 'id', '*');
            
            \Cache::put($cacheKey, $rows, 60);
        }
        else
        {
            $rows = \Cache::get($cacheKey);
        }

        return $rows;
    }