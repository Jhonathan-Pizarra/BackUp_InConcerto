<?php

namespace App\Http\Controllers;

use App\Mail\NewFestival;
use App\Models\User;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Faker\Core\File;
use Illuminate\Http\Request;
use App\Models\Festival; //importamos el modelo
use App\Http\Resources\Festival as FestivalRes;
use App\Http\Resources\FestivalCollection;
use Illuminate\Support\Facades\Mail;

class FestivalController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'description.required' => 'Es necesaria una descripción'
    ];

    //Vamos a hacer controladores, tareas que debe realizar
    public function index(){
        //return new FestivalCollection(Festival::paginate(16));
        return response()->json(new FestivalCollection(Festival::all()),200);
    }

    public function show(Festival $festival){
        //Tiene permiso:
        $this->authorize('view', $festival);
        return response()->json(new FestivalRes($festival),200);
    }

    public function store(Request $request){
        //Tiene permiso:
        $this->authorize('create', Festival::class);

        $request->validate([
            'name' => 'required|string|unique:festivals|max:255', //unique:tabla
            'description' => 'required|string|max:255',
            'image' => 'required|image|dimensions:min_width=200,min_height=200',
        ], self::$messages);

        //Creamos una instancia y subimso la imagen al servidor
        $festival = new Festival($request->all());
        //$result = $request->image->storeOnCloudinary();
        //$path = $result->getPath();
        $local = $request->image->store('public/festivals');

        //Al campo image le setea una ruta y le guardamos en la bdd
        //$festival->image = $path; output: "https://res.cloudinary.com/inconcerto/image/upload/v1626911211/zuiyb1lvfsmdre6gvuov.jpg"
        //$festival->image = dirname($path); output: "https://res.cloudinary.com/inconcerto/image/upload/v1626911211"
        //$festival->image = basename($path); output: "zuiyb1lvfsmdre6gvuov.jpg"
        //$base =  basename(dirname($path).basename($path)); //output: "v1626911211zuiyb1lvfsmdre6gvuov.jpg"
        //$folder =  substr($base, 0, -24); //output: "v1626911211"
        //Por tanto:
        //$img_path = $folder.'/'.basename($path);

        //$festival->image = $img_path;
        //$festival->image = 'festivals/'.$img_path;
        $festival->image = 'festivals/' . basename($local); //estaba en local
        $festival->save();

        $users = User::all();
        Mail::to($users)->send(new NewFestival($festival));
        return response()->json(new FestivalRes($festival), 201);
        //$festival = Festival::create($request ->all());
        //return response() -> json($festival, 201); //codigo 201 correspodnde a create

    }

    public function update(Request $request, Festival $festival){

        //Tiene permiso:
        $this->authorize('update', $festival);

        $request->validate([
            'name' => 'string|unique:festivals|max:255', //unique:tabla
            'description' => 'string',
        ], self::$messages);


        /*
        if ($request->hasFile('image')) {
            $destinationPath = $festival->image;
            if(File::exists($destinationPath)){
                File::delete($destinationPath);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). "." .$extension;
            $file->move('Festivals/',$filename);

            $festival->image = $filename;

        }
        */

        /*
        if ($request->hasFile('image')){
            $image_path = public_path("/uploads/resource/".$festival->image);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $bannerImage = $request->file('image');
            $imgName = $bannerImage->getClientOriginalName();
            $destinationPath = public_path('public/festivals');
            $bannerImage->move($destinationPath, $imgName);
        } else {
            $imgName = $festival->image;
        }
        */

        /*
        $data = Festival::findOrFail($festival->id);
        $data -> update($request->all());

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();
            $data->image = $name;
            $destinationPath = public_path('public/festivals');
            $file->move($destinationPath, $name);
            $data->save();
        }
        */

        /*
        //Creamos una instancia y subimso la imagen al servidor
        if($request->hasFile('image')){
            $result = $festival->image->storeOnCloudinary();
            $path = $result->getPath();

            //Al campo image le setea una ruta y le guardamos en la bdd
            $base =  basename(dirname($path).basename($path)); //output: "v1626911211zuiyb1lvfsmdre6gvuov.jpg"
            $folder =  substr($base, 0, -24); //output: "v1626911211"
            $img_path = $folder.'/'.basename($path);

            $festival->image = $img_path;
        }
        */

        /*
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();
            $festival->image = $name;
            $file->move(public_path().'/images/', $name);
            $festival->save();
        }
        */

        /*
        $employee = Festival::find($festival->id);

        if($request->image != ''){
            $path = public_path().'/uploads/images/';

            //code for remove old file
            if($employee->image != ''  && $employee->image != null){
                $file_old = $path.$employee->image;
                unlink($file_old);
            }

            //upload new file
            $file = $request->image;
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);

            //for update in table
            $employee->update(['image' => $filename]);
        }
        */

        /*
        $post = Festival::find($festival->id);
        if($request->hasFile('image')){
            $request->validate([
                'image' => 'image|dimensions:min_width=200,min_height=200',
            ]);
            //$path = $request->file('image')->store('public/storage');
            $path = $request->file('image')->store('public/storage');
            $post->image = $path;
        }
        $post->name = $request->name;
        $post->description = $request->description;
        $post->save();
        */

        /*
        if($request->hasFile('image')){
            $request->validate([
                'image' => 'image|dimensions:min_width=200,min_height=200',
            ]);
            $path = $request->file('image')->store(storeOnCloudinary());
            $festival->image = $path;
            //$result = $request->image->storeOnCloudinary();
            //$path = $result->getPath();

            //$festival->image = $path;

            //$festival->image = $path;
            //$festival->save();
        }
        */

        /*
        $festival->name = $request->name;
        $festival->description = $request->description;
        //$result = $request->file('image')->store(storeOnCloudinary());

        $ward = $request->image;
        if ($ward) {
            global $goo;
            $result = $request->image->storeOnCloudinary();
            $goo = $result->getPath();
        }

        $festival->image = $goo;
        */


        $festival->update($request->all());
        return response() -> json($festival, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request, Festival $festival){
        //Tiene permiso:
        $this->authorize('delete', $festival);

        $festival -> delete();
        return response() -> json(null, 204); //codigo 204 correspodnde a borrado exitoso
    }
}
