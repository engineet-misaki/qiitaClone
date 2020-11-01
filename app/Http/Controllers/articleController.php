<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

use App\titles;

class articleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = titles::all();
        $articleArray=[];
        for($i=0; $i<count($title); $i++){
            $str = $title[$i]->qiita_title;
            // $str = "LaravelでRoute::resourceを使うときに気をつけること";
            $str = urlencode($str);
    
            $url = "https://qiita.com/api/v2/items?query=title:" . $str;
            $method = "GET";
            $token = "4056902cebeb12329ab1cf8d03dc9e46da7a5dea";
            $options = [
                // 'json' => $data,
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Content-Type' => 'application/json',
                ]
            ];
    
            $client = new Client();
            $response = $client->request($method, $url, $options);
            $articles = $response->getBody();
            $articles = json_decode($articles, true);
            array_push($articleArray, $articles);
        }
        // dd($articles);
        // dd($title);
        // dd($articleArray);


        return view('index', compact('articleArray', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $title = titles::all();
        $str = $title[$id]->qiita_title;
        // $str = "LaravelでRoute::resourceを使うときに気をつけること";
        $str = urlencode($str);


        $url = "https://qiita.com/api/v2/items?query=title:" . $str;
        $method = "GET";
        $token = "4056902cebeb12329ab1cf8d03dc9e46da7a5dea";
        $options = [
            // 'json' => $data,
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json',
            ]
        ];

        $client = new Client();
        $response = $client->request($method, $url, $options);
        $articles = $response->getBody();
        $articles = json_decode($articles, true);
        $article = $articles[0];
        return view('show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
