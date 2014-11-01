<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 01/11/2014
 * Time: 17:50
 */

class TaxonomiesSeeder extends Seeder {

    public function run() {
        $taxonomies = [
            'Root',
            'Domain',
            'Kingdom',
            'SubKingdom',
            'Superphylum',
            'Phylum',
            'Subphylum',
            'Infraphylum',
            'Superclass',
            'Classes',
            'Superlegion',
            'Legion',
            'Sublegion',
            'Infralegion',
            'Subclass',
            'Infraclass',
            'Subcohort',
            'Magnorder',
            'Superorder',
            'Grandorder',
            'Mirorder',
            'Order',
            'Suborder',
            'Infraorder',
            'Parvorder',
            'Superfamily',
            'Family',
            'Tribe',
            'Subtribe',
            'Genus',
            'Species'
        ];
        foreach($taxonomies as $name){
            Taxonomy::create([
                'taxa_name' => $name
            ]);
        }
    }
}