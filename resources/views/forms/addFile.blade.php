@include('standards/head')
@include('inc/messages')
<b>neue Datei hinzufügen</b>
<form class="" action="File/store" method="post" enctype="multipart/form-data">
  @csrf
    <input type="file" name="fileToUpload" id="fileToUpload" value="" accept=".pdf, .txt, .jpeg, .jpg, .png, .doc, .docx, .ppt, .pptx, .ai, .indd, .psd, .xd">
    <select id="type" name="type">
     <option value="zusammenfassung">Zusammenfassung</option>
     <option value="altklausur">Altklausur</option>
     <option value="karteikarte">Karteikarten</option>
    </select>

    <input type="submit" name="" value="abschicken">
</form>
