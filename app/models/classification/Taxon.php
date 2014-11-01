<?php
    /**
     * User: Aled
     * Date: 29/10/2014
     * Time: 09:53
     */
    class Taxon extends Eloquent{
        public $timestamps = false;

        public function taxonomy(){
            $this->hasMany('Taxonomy');
        }

        public function getChildren($parentId = 0){
            $children = $this::where('parent_id', $parentId )->get()->toArray();
            return $children;
        }

        public function getTree($parent_id, $increment = 0){
            $myArray = $this->getChildren($parent_id, $increment);
            if($increment == 30) {
                return;
            }else {
                if (count($myArray) == 0) {
                    echo '</div>';
                } else if (count($myArray) == 1) {
                    echo "<div class='branch " . $myArray[0]['taxonomic_rank'] . " hidden'>";
                    foreach ($myArray as $key => $value) {
                        if ($value['parent_id'] != $parent_id) continue;
                        echo "<div class='entry sole'>
                                 <span class='label'>
                                    <i class='glyphicon glyphicon-chevron-left pull-left expand-tree'></i>
                                        ".$value['name'] ."
                                    <i class='glyphicon glyphicon-chevron-right pull-right expand-tree'></i>
                                 </span>";
                        $increment++;
                        $this->getTree($value['id'], $increment);
                    }
                    echo '</div></div>';
                } else {
                    echo "<div class='branch " . $myArray[0]['taxonomic_rank'] . " hidden'>";
                    foreach ($myArray as $key => $value) {
                        if ($value['parent_id'] != $parent_id) continue;
                        echo "<div class='entry'>
                             <span class='label'>
                                <i class='glyphicon glyphicon-chevron-left pull-left expand-tree'></i>
                                    ".$value['name'] ."
                                <i class='glyphicon glyphicon-chevron-right pull-right expand-tree'></i>
                             </span>";
                        $increment++;
                        $this->getTree($value['id'], $increment);
                    }
                    echo '</div></div>';
                }
            }
        }

        public function showChildren($parent_id){
            $class = Taxonomy::all();
            $children = $this::where('parent_id', $parent_id )->get()->toArray();
            if(count($children) == 1){
                echo "<div class='branch " . $children[0]['taxonomic_rank'] . " hidden'>";
                foreach ($children as $key => $value) {
                    echo "<div class='entry sole'>
                     <span class='label' data-classification='$value->level' data-id='$value->id'>
                        <i class='glyphicon glyphicon-chevron-left pull-left expand-tree'></i>
                            ".$value['name'] ."
                        <i class='glyphicon glyphicon-chevron-right pull-right expand-tree'></i>
                     </span>
                     </div>";
                }
                echo '</div>';
            }else if(count($children)){
                echo "<div class='branch " . $children[0]['taxonomic_rank'] . " hidden'>";
                foreach ($children as $key => $value) {
                    echo "<div class='entry'>
                     <span class='label' data-classification='$value->level' data-id='$value->id'>
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

        public function MapDatabase(){
            $data =  $this::select('id', 'name', 'parent_id', 'taxonomic_rank')
                ->get()
                ->toArray();
            return $this->mapDecendents($data);
        }

        function mapDecendents($data) {
            $fdata = array();
            foreach($data as $k => $v)
            {
                if(empty($v['parent_id'])){
                    unset($v['parent_id']);
                    $v['data'] = array();
                    $v['children'] = array();
                    $fdata[] = $v;
                }
                else {
                    $this->findParentAndInsert($v, $fdata);
                }

            }
            return $fdata;
        }

        function findParentAndInsert($idata, &$ldata) {

            foreach ($ldata as $k=>$v) {

                if($ldata[$k]['id'] == $idata['parent_id']) {
                    unset($idata['parent_id']);
                    $idata['data'] = array();
                    $idata[$idata['name']] = array();
                    $ldata[$k][$idata['name']][] = $idata;
                    return;
                }
                else if(!empty($v['children']))
                    $this->findParentAndInsert($idata, $ldata[$k]['children']);
            }
        }

    }