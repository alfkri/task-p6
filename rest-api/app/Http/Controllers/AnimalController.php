<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public $animals = ["kucing" , "ayam" , "ikan"];
    function index()
    {
        echo "Menampilkan data animals <br>";
        foreach ($this->animals as $animal){
            echo "$animal ";
            echo "<br>";
        }
    }
    function store(Request $request)
    {
        echo "Menambahkan data Animals <br>";
        array_push($this->animals, $request->nama);
        $this->index();
    }
    function update(Request $request, $id)
    {
        echo "Mengedit data Animals id: $id <br>";
        $this->animals[$id] = $request->nama;
        $this->index();
    }
    function destroy($id){
        unset($this->animals[$id], $index); 
        echo "Menghapus data animals id: $id <br>" ;
        $this->index();
    }
}
