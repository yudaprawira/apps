<?php
    use Modules\Kategori\Models\Kategori;

    function getSelectCategories($type='')
    {
        $categories = [];

        $category = getRowArray(Kategori::all(), 'id', '*');
        $id_parent = getRowArray($category, 'id', 'induk');
        $parent_id = getRowArray($category, ['induk'], 'id');
        $id_name = getRowArray($category, 'id', 'kategori');
        
        foreach($category as $c)
        {
            if ( $c['induk']==0 )
                $categories[$c['id']] = ucwords(strtolower($c['kategori'])); 
            else
            {
                if ( isset($parent_id[$c['induk']]) )
                {
                    foreach( $parent_id[$c['induk']] as $c_ )
                    {
                        $categories[$c['id']] = (( $type=='name' ) ? "" : (str_repeat("-", 1)." ")).ucwords(strtolower($c['kategori']));
                    }
                }
                
            }
        }
        return $categories;
    }

    function findParentUrl($id)
    {
        $ret = null;

        $category = getRowArray(Kategori::all(), 'id', '*');
        $id_url = getRowArray($category, 'id', 'url');
        $id_induk = getRowArray($category, 'id', 'induk');
        
        foreach( $category as $c )
        {
            if ( $c['induk']==0 )
            {
                $ret = isset($id_url[$c['id']]) ? $id_url[$c['id']] : null;
            }
            else
            {
                $idInduk = isset($id_induk[$c['id']]) ? $id_induk[$c['id']] : null;

                $ret = isset($id_url[$idInduk]) ? $id_url[$idInduk] : null;
            }
        }

        return $ret;
    }

    function categoryArray()
    {
        $category = getRowArray(Kategori::all(), 'id', '*');

        return [
            'id_parent' => getRowArray($category, 'id', 'induk'),
            'parent_id' => getRowArray($category, ['induk'], 'id'),
            'id_name'   => getRowArray($category, 'id', 'kategori'),
            'id_url'    => getRowArray($category, 'id', 'url'),
            'url_id'    => getRowArray($category, 'url', 'id'),
        ];
    }
?>