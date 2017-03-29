<?php

namespace Modules\Book\Http\Controllers;

use Redirect,
    Illuminate\Http\Request,
    Illuminate\Http\Response,
    Illuminate\Routing\Controller,
    App\Http\Controllers\FE\BaseController;

class FeController extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */
    public function index($page=1)
    {
        return $this->_buildListItem('KATALOG BUKU', 'book', $page);
    }

    /*
    |--------------------------------------------------------------------------
    | CATEGORY
    |--------------------------------------------------------------------------
    */
    public function category($category)
    {
        echo $category.'<br/>';
    }

    /*
    |--------------------------------------------------------------------------
    | SUB CATEGORY
    |--------------------------------------------------------------------------
    */
    public function subcategory($category, $subcategory)
    {
        echo $category.'<br/>';
        echo $subcategory.'<br/>';
    }

    /*
    |--------------------------------------------------------------------------
    | DETAIL
    |--------------------------------------------------------------------------
    */
    public function detail($category, $url)
    {
        $this->dataView['row'] = getBook()->where('url', $url)->first();
        
        $this->_validateDetail($category);

        return view($this->tmpl . 'detail', $this->dataView);
    }

    /*
    |--------------------------------------------------------------------------
    | LIST ITEM
    |--------------------------------------------------------------------------
    */
    private function _buildListItem($title, $baseUrl, $page)
    {
        $this->dataView['title'] = $title.' | '.config('app.title');

        $this->dataView['section'] = $title;

        $this->dataView['rows'] = getBook()->paginate(3, ['*'], 'page', (val($_GET,'page') ? val($_GET,'page') : $page));

        return view($this->tmpl . 'category', $this->dataView);
    }

    /*
    |--------------------------------------------------------------------------
    | VALIDATE DETAIL
    |--------------------------------------------------------------------------
    */
    private function _validateDetail($category)
    {
        //check row
        if ( !$this->dataView['row'] )
        {
            return abort(404);
        }
        
        $parentUrl = findParentUrl(val($this->dataView['row'], 'kategori'));
        //redirect
        if ( $parentUrl!=$category )
        {
            return Redirect( getBookUrl($this->dataView['row'])['detail']);
        }

        $this->dataView['row'] = $this->dataView['row']->toArray();

        //RELATED
        $item = 8;
        $this->dataView['related'] = getBook()->where('id', '<>', $this->dataView['row']['id'])->where('kategori', $this->dataView['row']['kategori'])->limit($item)->get()->toArray();
        if ( count($this->dataView['related'])<8 )
        {
            $ids = getRowArray($this->dataView['related'], 'id', 'id');
            $ids[$this->dataView['row']['id']] = $this->dataView['row']['id'];
            $this->dataView['related'] = getRowArray(array_merge($this->dataView['related'], getBook()->whereNotIn('id', $ids)->where('kategori', getCategoryIncluded($this->dataView['row']['kategori']))->limit(($item-count($this->dataView['related'])))->get()->toArray()), 'id', '*');
        }

        //set Meta
        $this->dataView['title'] = ucwords(strtolower($this->dataView['row']['title'])).' | '.config('app.title');
    }

}
