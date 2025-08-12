<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bebida;

class BebidaController extends Controller
{

    public function Index(){
        $bebidas = Bebida::all();
        return view("index", ["bebidas" => $bebidas]);
    }

    public function Insertar(Request $request){
        $bebida = new Bebida();
        $bebida->nombre = $request->post("nombre");
        $bebida->capacidad = $request->post("capacidad");
        $bebida->stock = $request->post("stock");
        $bebida->tipo = $request->post("tipo");
        $bebida->marca = $request->post("marca");
        $bebida->save();
        return redirect("/")->with("bebidaAgregada", true);
    }

    public function Detalle(Request $request, $id){
        $bebida = Bebida::findOrFail($id); 
        return view("detalle", ["bebida" => $bebida]);
    }
   
    public function Eliminar(Request $request, $id){
        $bebida = Bebida::findOrFail($id);
        $bebida->delete();
        return redirect("/")->with("bebidaEliminada", true);
    }

    public function BuscarParaEditar(Request $request, $id){
        $bebida = Bebida::findOrFail($id);
        return view("editar", ["bebida" => $bebida]);
    }

    public function Editar(Request $request){
        $bebida = Bebida::findOrFail($request->id);
        $bebida->nombre = $request->nombre;
        $bebida->capacidad = $request->capacidad;
        $bebida->stock = $request->stock;   
        $bebida->tipo = $request->tipo;
        $bebida->marca = $request->marca;
        $bebida->save();
        return redirect("/")->with("bebidaEditada", true);
    }
}