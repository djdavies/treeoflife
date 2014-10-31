<?php
    /**
     * User: Aled
     * Date: 29/10/2014
     * Time: 09:53
     */
    class LinksTable extends Eloquent{
        public $timestamps = false;

        public function getChildren($parentId = 0){
            $children = $this::where('parent_id', $parentId )->get()->toArray();
            return $children;
        }

        public function getTree($parent_id){
            $myArray = $this->getChildren($parent_id);
            for($i = 0; $i<3; $i++){
                if(count($myArray) == 0){
                    echo '</div>';
                }else if(count($myArray) == 1){
                    echo "<div class='branch ".$myArray[0]['taxonomic_rank']." hidden'>";
                    foreach ($myArray as $key => $value) {
                        if ($value['parent_id'] != $parent_id) continue;
                        echo "<div class='entry sole'>
                             <span class='label'><span class='pull-left contract-tree'>&lArr;</span>".$value['name']."<span class='pull-right expand-tree'>&rArr;</span></span>";
                        $this->getTree($value['id']);
                    }
                    echo '</div></div>';
                }else{
                    echo "<div class='branch ".$myArray[0]['taxonomic_rank']." hidden'>";
                    foreach ($myArray as $key => $value) {
                        if ($value['parent_id'] != $parent_id) continue;
                        echo "<div class='entry'>
                             <span class='label'><span class='pull-left contract-tree'>&lArr;</span>".$value['name']."<span class='pull-right expand-tree'>&rArr;</span></span>";
                        $this->getTree($value['id']);
                    }
                    echo '</div></div>';
                }
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