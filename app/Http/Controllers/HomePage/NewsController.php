<?php

namespace App\Http\Controllers\Homepage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CategoryModel;
use App\NewsModel;
use App\Comments;
use Response;
use Auth;
use Redirect;
use Carbon\Carbon;

class NewsController extends Controller
{
    //
	private $news;
	private $category;

	public function __construct() {
		$this->news = new NewsModel;
		$this->category = new CategoryModel;
	}

	public function index() {
		$category = new CategoryModel;
		$categories = $category->getCategoryMenu();
		return view('news.index',compact([
			'categories',
			]));
	}

	public function show($title_slug) {
		$news = $this->news->where('title_slug',$title_slug)->get(['id','title','content','posted_at','created_by'])->first();
		$id = $news['id'];
		$user = Auth::User();
		$comment = Comments::where('new_id','=',$id)->get();
		// $news = $this->news->where('id',$id)->get(['id','title','content','posted_at'])->first();
		$news_hot = $news->getHotNews();
		$news_recent = $news->getRecentNews();

		$category = new CategoryModel;
		$categories = $category->getCategoryMenu();
		return view('news.show',compact(['news','news_recent','news_hot','categories','id','comment','user']));
	}

	public function getNewsFromCategory($category_slug=null) {
		
		if (!$category_slug){
			return Redirect::route('homepage.index');
		}
		$category_title = $this->category->where('title_slug',$category_slug)->first()->title;
		$news =  $this->news->getNewsByCategory($category_title,9);
		$news_hot = $this->news->getHotNews();
		$news_recent = $this->news->getRecentNews();
		$categories = $this->category->getCategoryMenu();
		$news_news = $this->news->getNewsByCategory('Tin tức',7);
		return view('news.index',compact(['news','news_recent','news_hot','categories','news_news']));
	}

	public function getNewsAssociation() {
		$news =  $this->news->where('view_mode','association')->paginate(9);
		$news_hot = $this->news->getHotNews();
		$news_recent = $this->news->getRecentNews();
		$categories = $this->category->getCategoryMenu();
		$news_news = $this->news->getNewsByCategory('Tin tức');
		return view('news.index',compact(['news','news_recent','news_hot','categories','news_news']));
	}


	public function addcomment(Request $request , $id){
    $data = $request->all();
    if (!isset($data['content']))
    	return -1;
    Comments::insert([
        'user_id' => Auth::User()->id,
        'new_id' => $id,
        'content'=> $data['content'],
        "created_at" => Carbon::now(),
        "updated_at" => Carbon::now(),
      ]);
    $id = Comments::select('id')->where('new_id','=',$id)->where('content','=',$data['content'])->where('user_id','=',Auth::User()->id)->get();
    foreach($id as $value){
      $data['id'] = $value['id'];
    }
    return Response::json($data);
  } 

  	public function searchNews(Request $request) {
  		$keyword = $this->slug($request->keyword);
  		$words = explode('-', $keyword);
  		$str = '%';
  		foreach ($words as $key => $value) {
  			$str .= $value;
  			$str .= '%';
  		}
  		$keyword = $str;
  		$news = $this->news->searchNews($keyword);
  		$news_hot = $this->news->getHotNews();
		$news_recent = $this->news->getRecentNews();
		$categories = $this->category->getCategoryMenu();
		$news_news = $this->news->getNewsByCategory('Tin tức');
  		return view ('news.index',compact(['news','news_hot','news_recent','categories','news_news']));
  	}
}
