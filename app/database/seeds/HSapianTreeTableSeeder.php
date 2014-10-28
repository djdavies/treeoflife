<?php

class HSapianTreeTableSeeder extends Seeder{

	public function run(){
		/*
		
		
		$treeOfLife = [
			'hominids' => [
				'homos' => [
					'erectus',
					'sapien'
				]
			]
		];

		foreach ($treeOfLife as $familyName => $familyGenus) {
			// create the fam
			$fam = Family::create(['name' => $familyName]);
			foreach($familyGenus as $genusName => $genusSpecies) {
				$genus = $fam->genus()->create(['name' => $genusName]);
				foreach ($genusSpecies as $species) {
					$genus->species()->create(['name' => $species]);
				}
			}
		} 
		*/
			
		Domain::truncate();
		Kingdom::truncate();
		SubKingdom::truncate();
		Superphylum::truncate();
		Phylum::truncate();
		Subphylum::truncate();
		Infraphylum::truncate();
		Superclass::truncate();
		Classes::truncate();
		Superlegion::truncate();
		Legion::truncate();
		Sublegion::truncate();
		Infralegion::truncate();
		Subclass::truncate();
		Infraclass::truncate();
		Subcohort::truncate();
		Magnorder::truncate();
		Superorder::truncate();
		Grandorder::truncate();
		Mirorder::truncate();
		Order::truncate();
		Suborder::truncate();
		Infraorder::truncate();
		Parvorder::truncate();
		Superfamily::truncate();
		Family::truncate();
		Tribe::truncate();
		Subtribe::truncate();
        Genus::truncate();
        Species::truncate();
		
		$summary = 'A eukaryote  is any organism whose cells contain a nucleus and other structures (organelles) enclosed within membranes';

		$dom = Domain::create(['name' => 'Eukaryota', 'summary'=>$summary]);
		$king = $dom->kingdoms()->create(['name' => 'Animalia']);
		$subki = $king->subkingdom()->create(['name' => 'Eumetazoa']);
		$superph = $subki->superphylum()->create(['name' => 'Deuterostomia']);
		$phyl = $superph->phylum()->create(['name' => 'Chordata']);
		$subph = $phyl->subphylum()->create(['name' => 'Vertebrata']);
		$infrap = $subph->infraphylum()->create(['name' => 'Gnathostomata']);
		$supcla = $infrap->superclass()->create(['name' => 'Tetrapoda']);
		$cla = $supcla->classes()->create(['name' => 'Mammalia']);
		$supl = $cla->superlegion()->create(['name' => 'Trechnotheria']);
		$legi = $supl->legion()->create(['name' => 'Cladotheria']);
		$subl = $legi->sublegion()->create(['name' => 'Zatheria']);
		$infral = $subl->infralegion()->create(['name' => 'Tribosphenida']);
		$subcla = $infral->subclass()->create(['name' => 'Theria']);
		$infracl = $subcla->infraclass()->create(['name' => 'Placentalia']);
		$subco = $infracl->subcohort()->create(['name' => 'Exafroplacentalia']);
		$magno = $subco->magnorder()->create(['name' => 'Boreoeutheria']);
		$supero = $magno->superorder()->create(['name' => 'Euarchontoglires']);
		$grando = $supero->grandorder()->create(['name' => 'Euarchonta']);
		$miro = $grando->mirorder()->create(['name' => 'Primatomorpha']);
		$ord = $miro->order()->create(['name' => 'Primates']);
		$subor = $ord->suborder()->create(['name' => 'Haplorrhini']);
		$infrao = $subor->infraorder()->create(['name' => 'Simiiformes']);
		$parv = $infrao->parvorder()->create(['name' => 'Catarrhini']);
		$supfam = $parv->superfamily()->create(['name' => 'Hominoidea']);
		$fam = $supfam->family()->create(['name' => 'Hominidae']);
		$subfam = $fam->subfamily()->create(['name' => 'Homininae']);
		$tri = $subfam->tribe()->create(['name' => 'Hominini']);
		$subtri = $tri->subtribe()->create(['name' => 'hominina']);
		$gen1 = $subtri->genus()->create(['name' => 'Homo']);
		$gen1->species()->create([
			'name' => 'H. Sapien',
			'common_name' => 'Human',
			'lived_from' => '200000',
			'lived_to' => '0',
			'lived_where' => 'World Wide',
			'adult_height' => '2.7203',
			'adult_mass' => '635',
			'cranial_mass' => '1498.5'
		]);

		$domainData = [
			'Archaea',
			'Bacteria'
		];

		foreach($domainData as $domain){
			DB::table('domain')->insert([
				['name' => $domain]
			]);
		}

		$kingdomData =[
			[
				'name' => 'Amoebozoa',
				'summary' => 'The Amoebozoa are a major group of amoeboid protozoa, including the majority that move by means of internal cytoplasmic flow. Their pseudopodia are characteristically blunt and finger-like, called lobopodia. Most are unicellular, and are common in soils and aquatic habitats, with some found as symbiotes of other organisms, including several pathogens. The Amoebozoa also include the slime moulds, multinucleate or multicellular forms that produce spores and are usually visible to the unaided eye.',
			],
			[
				'name' => 'Archaeplastida',
				'summary' => 'The Archaeplastida (or Plantae sensu lato - in the broad sense) are a major group of eukaryotes, comprising the red algae (Rhodophyta), the green algae and the land plants, together with a small group of freshwater unicellular algae called glaucophytes. The chloroplasts of all these organisms are surrounded by two membranes, suggesting they developed directly from endosymbiotic cyanobacteria. In all other groups, the chloroplasts are surrounded by three or four membranes, suggesting they were acquired secondarily from red or green algae.',
			],
			[
				'name' => 'Chromalveolata',
				'summary' => 'The Rhizaria are a species-rich supergroup of mostly unicellular eukaryotes. A multicellular form has recently been described. This supergroup was proposed by Cavalier-Smith in 2002. They vary considerably in form, but for the most part they are amoeboids with filose, reticulose, or microtubule-supported pseudopods. Many produce shells or skeletons, which may be quite complex in structure, and these make up the vast majority of protozoan fossils. Nearly all have mitochondria with tubular cristae.',
			],
			[
				'name' => 'Rhizaria',
				'summary' => 'The Rhizaria are a species-rich supergroup of mostly unicellular eukaryotes. A multicellular form has recently been described. This supergroup was proposed by Cavalier-Smith in 2002. They vary considerably in form, but for the most part they are amoeboids with filose, reticulose, or microtubule-supported pseudopods. Many produce shells or skeletons, which may be quite complex in structure, and these make up the vast majority of protozoan fossils. Nearly all have mitochondria with tubular cristae.',
			],
			[
				'name' => 'Excavata',
				'summary' => 'The excavates are a major subgroup of unicellular eukaryotes, often known as Excavata. The phylogenetic category Excavata, proposed by Cavalier-Smith in 2002, contains a variety of free-living and symbiotic forms, and also includes some important parasites of humans.',
			],
			[
				'name' => 'Fungi',
				'summary' => 'A fungus is any member of a large group of eukaryotic organisms that includes microorganisms such as yeasts and molds (British English: moulds), as well as the more familiar mushrooms. These organisms are classified as a kingdom, Fungi, which is separate from plants, animals, protists, and bacteria. One major difference is that fungal cells have cell walls that contain chitin, unlike the cell walls of plants and some protists, which contain cellulose, and unlike the cell walls of bacteria.',
			],
		];

		foreach($kingdomData as $kingdom){
			DB::table('kingdom')->insert([
				[
					'name' => $kingdom['name'],
					'summary' => $kingdom['summary'],
					'domain_id' => 1
				]
			]);
		}

		DB::table('kingdom')->insert([
			[
				'name' => 'Eubacteria',
				'summary' => '',
				'domain_id' => 3
			]
		]);
	}
}			