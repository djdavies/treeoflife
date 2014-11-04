<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 01/11/2014
 * Time: 22:07
 */

class TreeController extends BaseController {

    public function showTree() {
        $taxa = new Taxon;
        $items = Taxon::where('taxa.taxa_name', '=', 1 )->get();

        return View::make('tree')
            ->with("classification", $items)
            ->with("taxa", $taxa);
    }

    public function getChildren(){
        $parent_id = Input::get('parent_id');
        $taxon = new Taxon;
        if (Request::ajax()) {
            $tmpString = "";
            $children = $taxon->getChildren($parent_id);
            if(count($children) == 1){
                $tmpString .= "<div class='branch " . $children[0]['taxa_name'] ."'>";
                foreach ($children as $key => $value) {
                    $tmpString .= "<div class='entry sole'>
                     <span class='label'>
                            <a href='d/".$value['name']."'> ".$value['name'] ."</a>
                        <i class='glyphicon glyphicon-chevron-right pull-right expand-tree' data-classification='$value[taxa_name]' data-id='$value[id]'></i>
                     </span>
                     </div>";
                }
                $tmpString .= '</div>';
            }else if(count($children)){
                $tmpString .= "<div class='branch " . $children[0]['taxa_name']."'>";
                foreach ($children as $key => $value) {
                    $tmpString .= "<div class='entry'>
                     <span class='label'>
                            <a href='d/".$value['name']."'> ".$value['name'] ."</a>
                        <i class='glyphicon glyphicon-chevron-right pull-right expand-tree' data-classification='$value[taxa_name]' data-id='$value[id]' ></i>
                     </span>
                     </div>";
                }
                $tmpString .= '</div>';
            }
            return $tmpString;
        }
    }

}
