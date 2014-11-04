<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 03/11/2014
 * Time: 15:27
 *
 * Description:
 */


class DescriptionController extends BaseController {

    public function getDescription($classification){
        $taxa = new Taxon;
        $item = $taxa::where('name', '=', $classification)->get();
        return View::make('description')
            ->with("item", $item)
            ->with('taxa', $taxa);
    }

    public function createTaxon(){
        $taxa = new Taxon;
        return View::make("site.edit")
            ->with('taxon', $taxa)
            ->with('method', 'post');
    }

    public function editDescription($classification){
        $taxa = new Taxon;
        $taxon = $taxa::where('name', '=', $classification)->get();

        $submission = Submission::where(function($query) use ($taxon){
            $query->whereUserId(Auth::id())
                ->whereTaxaId($taxon[0]->id);
        }) ->get();

        if($submission->count()){
            $taxon = $submission;
        }

        return View::make("site.edit")
            ->with('taxon', $taxon)
            ->with('taxa', $taxa)
            ->with('method', 'put');
    }

    public function deleteDescription($classification){
        $taxa = new Taxon;
        $taxon = Taxon::where('name', '=', $classification)->get();
        if(Auth::user()->canEdit($classification)){
            return View::make("site.edit")
                ->with('taxon', $taxon)
                ->with('taxa', $taxa)
                ->with('method', 'delete');
        }else{
            return Redirect::to('d/'.$taxon->name);
        }
    }

    public function postNew(){
        $taxon = Taxon::create(Input::all());
        return Redirect::to('d/'.$taxon->name)
            ->with('message', 'Successfully created page!');
    }

    public function sendEdits($classification){
        $submission = new Submission;
        $taxon = Taxon::where('name', "=", $classification)->first();
        $submission->contents = Input::get('contents');
        $submission->summary = Input::get('summary');
        $submission->description = Input::get('description');
        $submission->taxa_id = $taxon->id;
        $submission->user_id = Auth::id();
        $submission->save();
        return Redirect::to('d/'.$taxon->name)
            ->with('message', 'Successfully updated page!');
    }

    //TODO:: change redirect to the users page
    public function deleteTaxon($classification){
        $taxon = Taxon::where('name', "=", $classification)->first();
        $taxon->delete();
        return Redirect::to('search')
            ->with('message', 'Successfully deleted Page');
    }

}