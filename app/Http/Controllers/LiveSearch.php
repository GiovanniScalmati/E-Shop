<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class LiveSearch extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('live_search');
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('products')
         ->where('name', 'like', '%'.$query.'%')
         ->orWhere('info', 'like', '%'.$query.'%')
         ->orWhere('type', 'like', '%'.$query.'%')
         ->orWhere('brewery', 'like', '%'.$query.'%')
         ->orWhere('abv', 'like', '%'.$query.'%')
         ->orderBy('id', 'desc')
         ->get();

      }
      else
      {
       $data = DB::table('products')
         ->orderBy('id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr class="dropdown-item">
         <td class="search_td"><img src="'.$row->img.'" width="50"></img></td>
         <td class="search_td">'.$row->name.'</td>
         <td class="search_td">'.$row->type.'</td>
         <td class="search_td">'.$row->brewery.'</td>
         <td class="search_td">'.$row->abv.'</td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="12" class="search_td">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
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
