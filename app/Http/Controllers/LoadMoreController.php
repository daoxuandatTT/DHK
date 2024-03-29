<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class LoadMoreController extends Controller
{

    function index()
    {
        return view('page.share');
    }

    function load_data(Request $request)
    {
        if($request->ajax())
        {
            $tag=Tag::where('name','share')->first();

            if($request->id > 0)
            {
                $data = $tag->posts
                    ->where('id', '<', $request->id)
                    ->orderBy('id', 'DESC')
                    ->limit(5)
                    ->get();
            }
            else
            {
                $data =  $tag->posts
                    ->orderBy('id', 'DESC')
                    ->limit(5)
                    ->get();
            }
            $output = '';
            $last_id = '';

            if(!$data->isEmpty())
            {
                foreach($data as $row)
                {
                    $output .= '
                           <div class="row">
                        <div class="col-md-6 col-lg-12 ftco-animate">
                            <div class="blog-entry d-lg-flex">
                                <div class="half">
                                    <a href="single.html" class="img d-flex align-items-end">
                                        <div class="overlay"></div>
                                    </a>
                                </div>
                                <div class="text px-md-4 px-lg-5 half pt-3">
                                    <p class="meta d-flex"><span class="pr-3">Dessert</span><span class="ml-auto pl-3">March 01, 2018</span></p>
                                    <h3><a href="single.html">Tasty &amp; Delicious Foods</a></h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.
                                    </p>
                                    <p class="mb-0"><a href="single.html" class="btn btn-primary">Read More <span class="icon-arrow_forward ml-4"></span></a></p>
                                </div>
                            </div>
                        </div>
                    </div>

        ';
                    $last_id = $row->id;
                }
                $output .= '
       <div id="load_more">
        <button type="button" name="load_more_button" class="btn btn-success form-control" data-id="'.$last_id.'" id="load_more_button">Load More</button>
       </div>
       ';
            }
            else
            {
                $output .= '
       <div id="load_more">
        <button type="button" name="load_more_button" class="btn btn-info form-control">No Data Found</button>
       </div>
       ';
            }
            echo $output;
        }
    }
}
