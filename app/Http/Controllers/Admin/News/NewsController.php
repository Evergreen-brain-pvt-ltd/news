<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use DataTables;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::pluck('name','name')->all();
       return view('admin.news.newsCreate')->with(["category"=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,News $news)
    {
        // dd($request->all());
        $request->validate(
            [
                'title' => 'required',
                'content' => 'required',
                'category' => 'required',
                'region' => 'required',
                'seo_title' => 'required',
                'slug' => 'required',
                'multiple_titles' => 'required',
                'meta_description' => 'required',
                'featured' => 'required',
            ],
            [
                "required" => "Field is required."
            ]
        );
        $news=News::create([
            'title'               => $request['title'],
            'content'             => $request['content'],
            'category'            => $request['category'],
            'region'              => $request['region'],
            'seo_title'           => $request['seo_title'],
            'slug'                => $request['slug'],
            'multiple_titles'     => $request['multiple_titles'],
            'meta_description'    => $request['meta_description'],
            'featured'            => !empty($request['featured']) ? $request['featured'] : 'false'
        ]);
        return redirect(route('admin.news.list'))->with('msg','News Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.news.newsList');
    }

    public function display(Request $request)
    {
        //    dd($request->all());
        if ($request->ajax()) {
            $GLOBALS['count'] = 0;
            $data = News::get(['id', 'title']);
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $id = encrypt($row->id);
                    $editlink = route('admin.news.news-edit', ['id' => $id]);
                    $btn = "<div class='d-flex justify-content-around'><a href='$editlink' data-id='$id' data-bs-toggle='tooltip' data-bs-placement='top' title='Edit' class='btn limegreen btn-primary  edit'><i class='fas fa-edit'></i></a><a href='javascript:void(0)' data-id='$id' class='delete btn red-btn btn-danger  '  data-bs-toggle='tooltip' data-bs-placement='top' title='Delete'><i class='fa fa-trash' aria-hidden='true'></i></a></div>";
                    return $btn;
                })
                ->rawColumns(['id', 'action'])
                ->make(true);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if (isset($request['id']) && !empty($request['id'])) {
            $category = Category::pluck('name','name')->all();
            $data = News::where('id', decrypt($request['id']))->first();
             return view('admin.news.newsCreate')->with(["data" => $data,"category"=>$category]);
        } else {
            return redirect()->back()->with("msg", "Record Created Successfully");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (isset($request['id']) && !empty($request['id'])) {
            $request->validate(
                [
                    'title' => 'required',
                    'content' => 'required',
                    'category' => 'required',
                    'region' => 'required',
                    'seo_title' => 'required',
                    'slug' => 'required',
                    'multiple_titles' => 'required',
                    'meta_description' => 'required',
                    'featured' => 'required',
                ],
                [
                    "required" => "Field is required."
                ]
            );
            $news=News::where('id',decrypt($request['id']))->update([
                'title'               => $request['title'],
                'content'             => $request['content'],
                'category'            => $request['category'],
                'region'              => $request['region'],
                'seo_title'           => $request['seo_title'],
                'slug'                => $request['slug'],
                'multiple_titles'     => $request['multiple_titles'],
                'meta_description'    => $request['meta_description'],
                'featured'            => !empty($request['featured']) ? $request['featured'] : 'false'
            ]);
        }
         return redirect(route('admin.news.list'))->with('msg','News Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request->validate(
            [
                "id" => 'required',
            ]
        );
        News::where('id', decrypt($request['id']))->delete();
        $msg = "Deleted Successfully";
        return response()->json(array("msg" => $msg), 200);
    }
}
