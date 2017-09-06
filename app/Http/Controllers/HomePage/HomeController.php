<?php

namespace App\Http\Controllers\HomePage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NewsModel;
use App\CategoryModel;
use App\Video;
use App\User;
use Carbon\Carbon;

class HomeController extends Controller
{

	private $news;
	private $user;

	public function __construct() {
		$this->news = new NewsModel;
		$this->user = new User;
	}
    //

	public function index() {
		$news = new NewsModel;
		$news_association = $news->getAssociationNews();
		$news_environment = $news->getNewsByCategory('Môi trường biển');
		$news_news = $news->getNewsByCategory('Tin tức');
		$news_product = $news->getNewsByCategory('Sản phẩm');
		$news_tech = $news->getNewsByCategory('Công nghệ');
		
		$news_hot = $news->getHotNews();//Right content
		$news_recent = $news->getRecentNews();//Right content
		
		$category = new CategoryModel;
		$categories = $category->getCategoryMenu();
		$video = Video::orderBy('id', 'DESC')->paginate(5);
		$personal_association = $this->user->where('is_active',1)->where('role','member_personal')->get();
		$official_association = $this->user->where('is_active',1)->where('role','member_association')->get();

		return view('homepage.index')
					->with([
						'news_association'	=>	$news_association,
						'news_hot'				=>	$news_hot,
						'news_environment'	=>	$news_environment,
						'news_recent'			=>	$news_recent,
						'news_news'				=>	$news_news,
						'news_product'			=>	$news_product,
						'news_tech'				=>	$news_tech,
						'categories'			=>	$categories,
						'video'					=>	$video,
						'personal_association'	=>	$personal_association,
						'official_association'	=>	$official_association,
						]);
	}
}
