<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Libro;
class LibroController extends Controller
{
public function index()
{
$libros=Libro::orderBy('id','DESC')->paginate(3);
return view('libro.index',compact('libros'));
}
public function create()
{
return view ('Libro.create');
}
public function store(Request $request)
{
$this->validate($request,[ 'nombre'=>'required', 'resumen'=>'required',
'npagina'=>'required', 'edicion'=>'required', 'autor'=>'required', 'npagina'=>'required',
'precio'=>'required']);
Libro::create($request->all());
return redirect()->route('libro.index')->with('success','Registro creado satisfactoriamente');
}
public function show($id)
{
$libros=Libro::find($id);
return view('Libro.show',compact('libros'));
}
public function edit($id)
{
$libro=libro::find($id);
return view('libro.edit',compact('libro'));
}
public function update (Request $request, $id) {
$this->validate($request,[ 'nombre'=>'required', 'resumen'=>'required',
'npagina'=>'required', 'edicion'=>'required', 'autor'=>'required', 'npagina'=>'required',
'precio'=>'required']);

libro::find($id)->update($request->all());
return redirect()->route('libro.index')->with('success','Registro actualizado');
}
public function destroy($id)
{
Libro::find($id)->delete();
return redirect()->route('libro.index')->with('success','Registro Eliminado');
}

public function getLibros(){
$libros=Libro::all();
return response()->json($libros);
}
}
