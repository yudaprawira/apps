<?php
    use Modules\Kategori\Models\Kategori;

    /*
    |--------------------------------------------------------------------------
    | GET CATEGORIES
    |-------------------------------------------------------------------------
    */
    function categoryArray()
    {
        $cacheKey = 'getCategory';
        
        if(!\Cache::has($cacheKey)) 
        {
            $category = getRowArray(Kategori::where('status', 1)->get(), 'id', '*');
            
            \Cache::put($cacheKey, $category, 10);
        }
        else
        {
            $category = \Cache::get($cacheKey);
        }

        return [
            'id_parent' => getRowArray($category, 'id', 'induk'),
            'parent_id' => getRowArray($category, ['induk'], 'id'),
            'id_name'   => getRowArray($category, 'id', 'kategori'),
            'id_url'    => getRowArray($category, 'id', 'url'),
            'url_id'    => getRowArray($category, 'url', 'id'),
            'id_all'    => getRowArray($category, 'url', '*'),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | CATEGORY FOR DROPDOWN
    |-------------------------------------------------------------------------
    */
    function getSelectCategories($type='')
    {
        $categories = [];

        $category = categoryArray();

        foreach($category['id_all'] as $c)
        {
            if ( $c['induk']==0 )
                $categories[$c['id']] = ucwords(strtolower($c['kategori'])); 
            else
            {
                if ( isset($category['parent_id'][$c['induk']]) )
                {
                    foreach( $category['parent_id'][$c['induk']] as $c_ )
                    {
                        $categories[$c['id']] = (( $type=='name' ) ? "" : (str_repeat("-", 1)." ")).ucwords(strtolower($c['kategori']));
                    }
                }
                
            }
        }
        return $categories;
    }

    /*
    |--------------------------------------------------------------------------
    | CATEGORY PARENT URL
    |-------------------------------------------------------------------------
    */
    function findParentUrl($id)
    {
        $ret = null;
        $category = categoryArray();
        
        foreach( $category['id_all'] as $c )
        {
            if ( $c['induk']==0 )
            {
                $ret = isset($category['id_url'][$c['id']]) ? $category['id_url'][$c['id']] : null;
            }
            else
            {
                $idInduk = isset($category['id_parent'][$c['id']]) ? $category['id_parent'][$c['id']] : null;

                $ret = isset($category['id_url'][$idInduk]) ? $category['id_url'][$idInduk] : null;
            }
        }

        return $ret;
    }

    /*
    |--------------------------------------------------------------------------
    | CATEGORY FILTER
    |-------------------------------------------------------------------------
    */
    function getCategoryIncluded($id)
    {
        $category = categoryArray();
        
        $ret = [$id];
        if ( isset($category['parent_id'][$id]) )
        {
            $ret = array_merge($ret, $category['parent_id'][$id]);
        }
        
        return $ret;
    }

    /*
    |--------------------------------------------------------------------------
    | BUILD Category Link
    |-------------------------------------------------------------------------
    */
    function categoryLink($id)
    {
        $categories = categoryArray();
        $parentUrl = findParentUrl($id);
        $parentId  = val($categories, 'url_id.'.$parentUrl);
        $mergeCat  = [$parentId, $id];
        $ret = [];
        if ( !empty($mergeCat) )
        {
            $url = url('book');

            foreach( $mergeCat as $c )
            {
                $url .= '/'.val($categories, 'id_url.'.$c);

                $ret[$c] = createLink( $url, val($categories, 'id_name.'.$c) );
            }
        }

        return $ret;
    }
?>