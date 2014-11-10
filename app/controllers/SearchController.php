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
				})->take(5)->get();
				return Response::json($result);
			};
		}

		public function search() {
			$time_start = $this->microtime_float();
			$data = Input::get('request');

			$result = Taxon::whereRaw("MATCH(name, summary, description) AGAINST('+$data*' IN BOOLEAN MODE)")->paginate(10);

			$time_end = $this->microtime_float();
			$time = $time_end - $time_start;
			return View::make('search')
				->with('request', $data)
				->with('result', $result)
				->with('time', $time);


		}
		private function microtime_float(){
			list($usec, $sec) = explode(" ", microtime());
			return ((float)$usec + (float)$sec);
		}
	}