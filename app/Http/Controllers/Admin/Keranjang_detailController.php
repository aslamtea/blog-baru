<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User\Keranjang_detail;

class Keranjang_detailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        parent::__construct();
        $this->sub_menu['name'] = 'Keranjang';
        $this->sub_menu['m_url'] = 'Keranjang Detail';
    }
    public function index(Request $request)
    {

        $keranjang_detail = Keranjang_detail::all();
        if ($request->ajax()) {
            return datatables()->of($keranjang_detail)
                ->addColumn('barang', function ($s) {
                    return $s->barang->name;
                })
                ->addColumn('keranjang', function ($s) {
                    return $s->keranjang->pembeli->name;
                })

                ->addColumn('jumlah_harga', function ($s) {
                    return number_format($s->jumlah_harga, 0);
                })
                ->addColumn('action', function ($keranjang_detail) {
                    return view('admin.tempat._action', [
                        'show' => '/admin/keranjang_detail/' . $keranjang_detail->id . '',
                        'class' => 'badge badge-primary',
                        'detail' => 'Detail',
                        'edit' => '/admin/keranjang_detail/' . $keranjang_detail->id . '/edit',
                        'delete' => '/admin/keranjang_detail/' . $keranjang_detail->id . '',
                    ]);
                })
                ->rawColumns(['barang', 'keranjang', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.keranjang_detail.index', compact('keranjang_detail'), $this->sub_menu);
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
