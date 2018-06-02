<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ruta;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator;
use App\Comments;
use App\Ubicacion;
use App\Rutas_Vehiculos;

class RutasController extends Controller
{
//    public function searchRutas(Request $request){
//        $lat=$request->lat;
//        $lng=$request->lng;
//        
//        $rutas=Rutas::whereBetween('lat',[lat-0.1, lat+0.1])->whereBetween('lng',[$lng-0.1, lng+0.1])-get();
//        return $rutas;
//    }
    public function rutacreate(Request $request){            
    
    if ($request->isMethod('post'))
    { 
        $ruta = new Ruta();
        $ruta->name = $request->name;
        if ($ruta->save()){
            $lat_array=explode('/', $request->lat);
            $lng_array=explode('/', $request->lng);
            $salida = true;

            for($i=0; $i<sizeof($lat_array); $i++){
                $ubicacion = new Ubicacion();

                $ubicacion->lat=$lat_array[$i];
                $ubicacion->lng=$lng_array[$i];
                $ubicacion->ruta_id=$ruta->id;
                if(!$ubicacion->save()){
                    $salida = false;
                    break;

                }

            }
        }else{
            $salida = false;
            
        }
    
    if ($salida){
     return redirect()->back()->with('message', 'Ha creado la ruta correctamente');
    } else{
     return redirect()->back()->with('error', 'Ha ocurrido un error al guardar los datos');
    }
   
  }
  
        return View('admin.rutas.rutacreate');
    
}
public function rutaindex(){
    
//    $ruta = Ruta::find('name', 'ASC');
//        return View('home.rutaindex.indexEmpleado' )->with('empleado',$empleado);

    
        $ruta = Ruta::orderBy('id', 'ASC')->paginate(60);
        
        return View('admin.rutas.rutaindex' )->with('ruta',$ruta);    
//            $lat_array=explode('/', $request->lat);
//            $lng_array=explode('/', $request->lng);
//    
//        $ruta = Ruta::orderBy('name', 'ASC')->Where('ruta_id', $request->ruta_id);
//
//        return View('admin.rutas.rutaindex')->with('$lat_array',$ruta, '$lng_array' ,$ruta);
}

        
        
        /*dd("test");
        $users = \App\User::All();
       //return $users->where('admin.index', Auth::user()->$users);
        return $users->where('admin.index', user()->$user);*/
      
    
//    if(!is_null($ruta)){
//   return redirect()->back()->with('error', 'En los datos');
//}    
//    
//        return View('home.rutaindex', ['ruta'=>$ruta]);
//    }
    public function indexubicacion($ruta_id)
    {
        
        $ubicaciones = Ubicacion::Where('ruta_id', '=', $ruta_id)->get();
        
        $json = "{";
        $i = 1;
        $coma = "";
        foreach($ubicaciones as $u){
            $json .= $coma;
            $json .= "\"$i\":"."{";
            $json .= "\"lat\":".$u->lat.",";
            $json .= "\"lng\":".$u->lng;
            $json .= "}";
            $coma = ",";
            $i++;
        }
        $json .= "}";
        $enviar = array($ubicaciones, $json);
//        $ubicacion_obj = \App\Ubicacion::All();
//        $ubicaciones = $ubicacion_obj->where('ruta_id',$ruta_id);
       //return $users->where('admin.index', Auth::user()->$users);
//        $ubicacion = Ubicacion::all()->where('ruta_id',$ruta_id);
        return View('admin.rutas.indexubicacion' )->with('parametro_test',$enviar);
//        return View('admin.rutas.rutaindex' )->with('ubicacion',$ubicacion);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function obtenerRutas(Request $request){
        $id_vehiculo = $request->vehiculo_id;
        $ruta = Ruta::all();
        // Hay que traer las rutas que tiene asignado este vehiculo $id_vehiculo
        // Y agregarle un parametro a ruta que indique que ya esta asignado
        
        // recorrer todas las rutas buscando que se encuentren en rutas_vehiculo
        // cuando encuentra tiene estado '1' de lo contrario '0'
        
        $rutas_vehiculos = Rutas_Vehiculos::Where('vehiculo_id', '=', $id_vehiculo)->get();
        foreach($ruta as $key => $r){
            $estado = '0';
            foreach($rutas_vehiculos as $rv){
                if($r['id'] === $rv['ruta_id']){
                    $estado = '1';
                    break;
                }
            }
            $ruta[$key]['contiene_ruta'] = $estado;
        }
        
//        foreach($ruta as $key => $rv){
//            echo 'key: ' . $key . ", rv: " . $rv . "</br>";
//        }
//        exit;return;
        return response(['rutas'=> $ruta]);
   }
   
   
}
