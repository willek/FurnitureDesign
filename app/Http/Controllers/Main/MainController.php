<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BlogModel;
use App\Models\CategoryBlogModel;
use App\Models\CategoryProductModel;
use App\Models\ConfigModel;
use App\Models\GalleryModel;
use App\Models\HeaderModel;
use App\Models\InboxModel;
use App\Models\PartnershipModel;
use App\Models\ProductModel;
use App\Models\SliderModel;
use App\Models\SocialMediaModel;
use App\Models\TestimonialsModel;

class MainController extends Controller
{
    public function __construct(){
        $this->data['config'] = ConfigModel::findOrFail(1);
        $this->data['category_product'] = CategoryProductModel::orderBy('id', 'asc')->get();
        $this->data['partnership'] = PartnershipModel::orderBy('id', 'desc')->active()->get();
        $this->data['social_media'] = SocialMediaModel::orderBy('id', 'desc')->get();
        $this->data['header'] = HeaderModel::findOrFail(1);
    }

//    *******************************HOME*******************************

    public function index(){
        $data = $this->data;
        $data['slider'] = SliderModel::orderBy('id', 'desc')->active()->get();
        $data['testimonials'] = TestimonialsModel::orderBy('id', 'desc')->get();
        $data['latest_product'] = ProductModel::orderBy('id', 'desc')->take(4)->get();
        $data['img'] = $data['header']['about'];
        return view('front.home.index', $data);
    }

//    *******************************PRODUCT*******************************

    public function category_product($id){
        $data = $this->data;
        $data['category'] = CategoryProductModel::where('id', $id)->first();
        $data['product'] = ProductModel::where('category_id', $id)->orderBy('id', 'desc')->get();
        return view('front.shop.category_product', $data);
    }

    public function view_product($id){
        $data = $this->data;
        $data['product'] = ProductModel::findOrFail($id);
        $data['related_product'] = ProductModel::where('category_id', $data['product']->category_id)->where('id', '!=', $data['product']->id)->take(3)->orderByRaw('rand()')->get();
        return view('front.shop.view_product', $data);
    }

    public function search_product(Request $q){
        $data = $this->data;
        $query = $q->get('search');
        if (!empty($query)){
            $data['product'] = ProductModel::where('name', 'like', '%'.$query.'%')->orWhere('description', 'like', '%'.$query.'%')->get();
        } else {
            $data['product'] = collect();
        }
        return view('front.search.result', $data);
    }

//    *******************************BLOG*******************************

	public function parent_blog(){
		$data = $this->data;
		$data['category_blog'] = CategoryBlogModel::get();
		$data['recent_posts'] = BlogModel::orderBy('id', 'desc')->take(5)->get();
		$data['img'] = $data['header']['blog'];
		return $data;
	}

    public function search_blog(Request $q){
        $data = $this->parent_blog();
        $query = $q->get('q');
        $data['blog'] = BlogModel::with('category')->where('name', 'like', '%'.$query.'%')->orWhere('content', 'like', '%'.$query.'%')->orderBy('id', 'desc')->get();
        $blog = count($data['blog']);
        $data['subtext'] = "Found {$blog} data";
        $data['paging'] = false;
        return view('front.blog.result', $data);
    }

    public function default_blog(){
        $data = $this->parent_blog();
        $data['blog'] = BlogModel::orderBy('id', 'desc')->simplePaginate(5);
        $data['paging'] = true;
        return view('front.blog.default', $data);
    }

    public function blog_by_category($id){
        $data = $this->parent_blog();
        $data['blog'] = BlogModel::where('category_id', $id)->orderBy('id', 'desc')->simplePaginate(5);
        if ($data['blog']->isEmpty()){
            abort(404);
        }
        $data['subtext'] = CategoryBlogModel::where('id', $id)->pluck('name')->first();
        $data['paging'] = true;
        $data['category_description'] = CategoryBlogModel::where('id', $id)->pluck('description')->first();
        return view('front.blog.result', $data);
    }

    public function detail_blog($id){
        $data = $this->parent_blog();
        $data['blog'] = BlogModel::findOrFail($id);
        $data['related_blog'] = BlogModel::where('category_id', $data['blog']->category_id)->where('id', '!=', $data['blog']->id)->take(3)->orderByRaw('rand()')->get();
        return view('front.blog.detail', $data);
    }

    //    *******************************GALLERY*******************************

    public function gallery(){
        $data = $this->data;
        $data['img'] = $data['header']['gallery'];
        $data['gallery'] = GalleryModel::orderBy('id', 'desc')->get();
        return view('front.gallery.index', $data);
    }

    //    *******************************CONTACT*******************************

    public function contact(){
        $data = $this->data;
        $data['img'] = $data['header']['about'];
        return view('front.contact.index', $data);
    }

    public function send_message(Request $request){
        if ($request->isMethod('post')){
            $message = new InboxModel();
            $message->name = $request->input('name');
            $message->email = $request->input('email');
            $message->message = $request->input('message');
            $message->status = 'new';
            if ($message->save()){
                return response()->json($message);
            } else {
                echo "error";
                exit;
            }
        }
    }

}
