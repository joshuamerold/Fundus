@include('standards/head')
@include('sidebar')
@include('inc/messages')
<body class="addFile-body">
  <div class="card offset-md-2 col-md-8">
  <h2 class="mt-3">Datei hinzufügen</h2>
    <div class="card-body">
      <form class="" action="File/store" method="post" enctype="multipart/form-data">
        @csrf

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupFileAddon01">Hochladen</span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="fileToUpload" name="fileToUpload" aria-describedby="inputGroupFileAddon01" accept=".pdf, .txt, .jpeg, .jpg, .png, .doc, .docx, .ppt, .pptx, .ai, .indd, .psd, .xd">
              <label class="custom-file-label" for="fileToUpload">Datei auswählen</label>
            </div>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Kategorie</label>
            </div>
            <select name="type" class="custom-select" id="inputGroupSelect01">
              <option selected>Kategorie auswählen ...</option>
              <option value="zusammenfassung">Zusammenfassung</option>
              <option value="altklausur">Altklausur</option>
              <option value="karteikarte">Karteikarten</option>
            </select>
          </div>
          <br>
          <div class="row">
            <input class="btn col-md-2 offset-md-5" id="btn-addFile" type="submit" name="" value="Hochladen">
          </div>
        </form>
        <div class="form-group row justify-content-center">
          <a href="/{{$id}}/show"<button type="button" name="button">Abbrechen</button>
        </div>
      </div>
    </div>
  </div>
</body>
