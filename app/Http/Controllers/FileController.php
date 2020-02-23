<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

class FileController extends Controller
{
  public function download($id)
  {
      //gewünschte Datei wird mit id von DB abgefragt
      $fileToDownload = File::all()->where('id', $id)->first();

      //Name wird verlangt, damit gewollte Datei angesprochen werden kann
      $filename = $fileToDownload->name.".".$fileToDownload->extension;

      // Gibt den Pfad der gewünschten Datei an
      $file_path = storage_path() . "/../public/files/" . $filename;

      //legt Grundregeln fest / bei mir sind alle Dateiformate erlaubt
      $headers = array(
        'Content-Type' => 'application/*',
        'Content-Disposition' => 'attachment; filename=' . $filename,
      );

      // Wenn Datei existiert wird Sie zurückgeliefert und heruntergeladen
      if ( file_exists( $file_path ) ) {
          return \Response::download( $file_path, $filename, $headers );
      } else {
          //Fehlermeldung wenn Datei nicht mehr auf dem Server ist. Wird in Files ausgegeben
          return redirect('/files')->with('error', 'Datei ist nicht mehr auf dem Server...');
      }

  }
}
