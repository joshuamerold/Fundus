<h1>neue File hinzufügen</h1>
<form class="" action="File/store" method="post" enctype="multipart/form-data">
  @csrf
    <input type="file" name="fileToUpload" id="fileToUpload" value="">
    <select id="type" name="type">
     <option value="Zusammenfassung">Zusammenfassung</option>
     <option value="Altklausur">Altklausur</option>
     <option value="Karteikarten">Karteikarten</option>
    </select>

    <input type="submit" name="" value="abschicken">
</form>
