<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 03/11/2014
 * Time: 15:27
 */

class DescriptionController extends BaseController {

    public function getDescription($classification){
        $taxa = new Taxon;
        $item = $taxa::where('name', '=', $classification)->get();
        return View::make('classification.description')
            ->with("item", $item)
            ->with('taxa', $taxa);
    }

    public function createTaxon(){
        $taxa = new Taxon;
        return View::make(classification.edit)
            ->with('taxa', $taxa)
            ->with('method', 'post');
    }

    public function editDescription($classification){
        $taxa = new Taxon;
        $item = $taxa::where('name', '=', $classification)->get();
        return View::make(classification.edit)
            ->with('item', $item)
            ->with('method', 'put');
    }

    public function deleteDescription($classification){
        if(Auth::user()->canEdit($classification)){
            return View::make('classification.edit')
            ->with('Taxon', $classification)
            ->with('method', 'delete');
        }else{
            return Redirect::to('d/'.$classification->id);
        }
    }

}