<h1>neue File hinzufügen</h1>
<form class="" action="File/store" method="post" enctype="multipart/form-data">
  @csrf
    <input type="file" name="fileToUpload" id="fileToUpload" value="">
    <select id="type" name="type">
     <option value="zusammenfassungen">Zusammenfassung</option>
     <option value="altklausuren">Altklausur</option>
     <option value="karteikarten">Karteikarten</option>
    </select>

    <input type="submit" name="" value="abschicken">
</form>
