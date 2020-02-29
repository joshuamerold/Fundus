@include('standards/head')

<b>neue Datei hinzufügen</b>
<form class="" action="File/store" method="post" enctype="multipart/form-data">
  @csrf
    <input type="file" name="fileToUpload" id="fileToUpload" value="">
    <select id="type" name="type">
     <option value="zusammenfassung">Zusammenfassung</option>
     <option value="altklausur">Altklausur</option>
     <option value="karteikarte">Karteikarten</option>
    </select>

    <input type="submit" name="" value="abschicken">
</form>
