<?php
    /**
     * User: Aled
     * Date: 29/10/2014
     * Time: 09:53
     */
    class Taxon extends Eloquent{
        public $timestamps = false;
        public $table = 'taxa';

        public function taxonomy(){
            $this->hasMany('Taxonomy');
        }

        public function getChildren($parentId = 0){
            $children = $this::where('taxa.parent_id', $parentId )
                ->join('taxonomies', function($join)
                {
                    $join->on('taxa.taxa_name', '=', 'taxonomies.id');
                })
                ->get()->toArray();
            return $children;
        }



        public function showChildren($parent_id){
            $class = Taxonomy::all();
            $children = $this->getChildren($parent_id);
            if(count($children) == 1){
                echo "<div class='branch " . $children[0]['taxa_name'] . " hidden'>";
                foreach ($children as $key => $value) {
                    echo "<div class='entry sole'>
                     <span class='label' data-classification='$value[taxa_name]' data-id='$value[id]'>
                        <i class='glyphicon glyphicon-chevron-left pull-left expand-tree'></i>
                            ".$value['name'] ."
                        <i class='glyphicon glyphicon-chevron-right pull-right expand-tree'></i>
                     </span>
                     </div>";
                }
                echo '</div>';
            }else if(count($children)){
                echo "<div class='branch " . $children[0]['taxa_name'] . " hidden'>";
                foreach ($children as $key => $value) {
                    echo "<div class='entry'>
                     <span class='label' data-classification='$value[taxa_name]' data-id='$value[id]'>
                        <i class='glyphicon glyphicon-chevron-left pull-left expand-tree'></i>
                            ".$value['name'] ."
                        <i class='glyphicon glyphicon-chevron-right pull-right expand-tree'></i>
                     </span>
                     </div>";
                }
                echo '</div>';
            }else{
                
            }
        }


        public function getParent(){
        }



        public function getAncestors(){

        }

        private function getTableName(){
            return 'links_tables';
        }

        

//        public function getTree($parent_id, $increment = 0){
//            $myArray = $this->getChildren($parent_id, $increment);
//
//            if($increment == 30) {
//                return;
//            }else {
//                if (count($myArray) == 0) {
//                    echo '</div>';
//                } else if (count($myArray) == 1) {
//                    echo "<div class='branch " . $myArray[0]['taxa_name'] . " hidden'>";
//                    foreach ($myArray as $key => $value) {
//                        if ($value['parent_id'] != $parent_id) continue;
//                        echo "<div class='entry sole'>
//                                 <span class='label'>
//                                    <i class='glyphicon glyphicon-chevron-left pull-left expand-tree'></i>
//                                        ".$value['name'] ."
//                                    <i class='glyphicon glyphicon-chevron-right pull-right expand-tree'></i>
//                                 </span>";
//                        $increment++;
//                        $this->getTree($value['id'], $increment);
//                    }
//                    echo '</div></div>';
//                } else {
//                    echo "<div class='branch " . $myArray[0]['taxa_name'] . " hidden'>";
//                    foreach ($myArray as $key => $value) {
//                        if ($value['parent_id'] != $parent_id) continue;
//                        echo "<div class='entry'>
//                             <span class='label'>
//                                <i class='glyphicon glyphicon-chevron-left pull-left expand-tree'></i>
//                                    ".$value['name'] ."
//                                <i class='glyphicon glyphicon-chevron-right pull-right expand-tree'></i>
//                             </span>";
//                        $increment++;
//                        $this->getTree($value['id'], $increment);
//                    }
//                    echo '</div></div>';
//                }
//            }
//        }

    }