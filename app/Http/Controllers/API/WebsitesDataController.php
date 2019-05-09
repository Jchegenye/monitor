<?php

namespace Monitor\Http\Controllers\API;

use Illuminate\Http\Request;
use Monitor\Http\Controllers\Controller;

use Monitor\Http\Resources\Post as PostResource;
use Monitor\Http\Resources\PostCollection;
use Monitor\Model\WebsitesMonitor;

class WebsitesDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PostCollection(WebsitesMonitor::paginate(0));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new WebsitesMonitor();
        $post->uri = parse_url($request->site_url, PHP_URL_HOST);
        $post->success = null;
        $post->status = null;
        $post->message = null;
        $post->transfer_time = null;
        $post->site_info = 
            [
                'site_name' => $request->site_name,
                'site_url' => $request->site_url,
                'check_type' => $request->check_type,
            ];
        $post->save();
        
        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new PostResource(WebsitesMonitor::FindOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = WebsitesMonitor::findOrFail($id);
        $post->uri = parse_url($request->site_url, PHP_URL_HOST);

        $post->site_info = 
            [
                'site_name' => $request->site_name,
                'site_url' => $request->site_url,
                'check_type' => $request->check_type,
            ];
        $post->save();
        
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = WebsitesMonitor::findOrFail($id);
        $post->delete();
        
        return new PostResource($post);
    }
}
