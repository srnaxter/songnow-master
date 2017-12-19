<?php
namespace App\Controllers;

use App\Models\listmusic;

class ApiController
{

    public function getlistmusic($id = null)
    {
        if (is_null($id)) {
            $listmusic = listmusic::all();

            header('Content-Type: application/json');
            return json_encode($listmusic);
        } else {
            $listmusic = listmusic::find($id);

            header('Content-Type: application/json');
            return json_encode($listmusic);
        }
    }
}