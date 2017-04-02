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
    public function category($category, $page=1)
    {
        if ( $category && val(categoryArray()['url_id'], $category))
        {
            return $this->_buildListItem(strtoupper(val(categoryArray()['url_name'], $category)), 'book/'.$category, $page, $category);
        }
        else abort(404);
    }

    /*
    |--------------------------------------------------------------------------
    | SUB CATEGORY
    |--------------------------------------------------------------------------
    */
    public function subcategory($category, $subcategory, $page=1)
    {
        if ( $category && val(categoryArray()['url_id'], $category) && val(categoryArray()['url_id'], $subcategory))
        {
            //redirect if parent not correct
            if ( val(categoryArray()['url_id'], $category)  != val(categoryArray()['id_parent'], val(categoryArray()['url_id'], $subcategory)) )
            {
                return redirect( url('book/'.val(categoryArray()['id_url'], val(categoryArray()['id_parent'], val(categoryArray()['url_id'], $subcategory)))).'/'.$subcategory );
            }

            return $this->_buildListItem(strtoupper(val(categoryArray()['url_name'], $category)).' / '.strtoupper(val(categoryArray()['url_name'], $subcategory)), 'book/'.$category, $page, $subcategory);
        }
        else abort(404);
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
    private function _buildListItem($title, $baseUrl, $page, $category='')
    {
        $this->dataView['title'] = $title.' | '.config('app.title');

        $this->dataView['section'] = $title;

        $books = getBook();

        if ( $category )
        {
            $books->whereIn('kategori', getCategoryIncluded(val(categoryArray()['url_id'], $category)));
        }

        $this->dataView['rows'] = $books->paginate(3, ['*'], 'page', (val($_GET,'page') ? val($_GET,'page') : $page));

        $this->dataView['this_year'] = getBook()->where('rilis', date("Y"))->limit(4)->get();

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
        $this->dataView['reviews'] = getReview(val($this->dataView['row'], 'id'))->get();
                                    
        //RELATED
        $item = 3;
        $this->dataView['related'] = getBook()->where('id', '<>', $this->dataView['row']['id'])->where('kategori', $this->dataView['row']['kategori'])->limit($item)->get()->toArray();
        if ( count($this->dataView['related'])<3 )
        {
            $ids = getRowArray($this->dataView['related'], 'id', 'id');
            $ids[$this->dataView['row']['id']] = $this->dataView['row']['id'];
            $this->dataView['related'] = getRowArray(array_merge($this->dataView['related'], getBook()->whereNotIn('id', $ids)->where('kategori', getCategoryIncluded($this->dataView['row']['kategori']))->limit(($item-count($this->dataView['related'])))->get()->toArray()), 'id', '*');
        }
        if ( count($this->dataView['related'])<3 )
        {
            $ids = getRowArray($this->dataView['related'], 'id', 'id');
            $ids[$this->dataView['row']['id']] = $this->dataView['row']['id'];
            $this->dataView['related'] = getRowArray(array_merge($this->dataView['related'], getBook()->whereNotIn('id', $ids)->limit(($item-count($this->dataView['related'])))->get()->toArray()), 'id', '*');
        }

        //set Meta
        $this->dataView['title'] = ucwords(strtolower($this->dataView['row']['title'])).' | '.config('app.title');
    }

}
