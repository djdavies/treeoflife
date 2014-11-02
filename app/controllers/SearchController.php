<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 02/11/2014
 * Time: 15:36
 */
class SearchController extends BaseController {

    public function searchbar() {
        $data = Input::get('input');
        if (Request::ajax()) {
            $result = Taxon::where('name', 'LIKE', "%" . $data . "%")->join('taxonomies', function ($join) {
                $join->on('taxa.taxa_name', '=', 'taxonomies.id');
            })->get();
            return Response::json($result);
        };
    }

    public function search() {
        $data = Input::get('request');
        $result = Taxon::where('name', 'LIKE', "%" . $data . "%")->get();
        return View::make('search')
            ->with('request', $data)
            ->with('result', $result);
    }
}