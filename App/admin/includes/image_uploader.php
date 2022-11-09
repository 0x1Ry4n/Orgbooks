<form method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="weight-500 col-md-12 pd-5">
                    <div class="form-group">
                        <div class="custom-file" style="width: 480px">
                            <input name="image" id="file" type="file" class="custom-file-input" accept="image/*" onchange="validateImage('file')">
                            <label class="custom-file-label" for="file" id="selector"><i class="fa-solid fa-file-export"></i> Escolha um arquivo(jpg, jpeg, png)...</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="update_image" ><i class="fa-solid fa-upload"></i> Upload</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i> Fechar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    let loader = function(e) {
        let file = e.target.files;
        let show = "<span>Arquivo selecionado : </span>" + file[0].name;
        let output = document.getElementById("selector");

        output.innerHTML = show;
        output.classList.add("active");
    };

    let fileInput = document.getElementById("file");
    fileInput.addEventListener("change", loader);

    function validateImage(id) {
        let file = document.getElementById(id).files[0];
        let type = file.type.split('/').pop().toLowerCase()

        if (type != "jpeg" && type != "jpg" && type != "png") {
            toastr.warning('Por favor, selecione um tipo de imagem válido!');
            document.getElementById(id).value = '';
            return false;
        } 
        
        if (file.size > 1050000) {
            toastr.warning('O tamanho máximo de upload é 1MB!');
            document.getElementById(id).value = '';
            return false;
        } 

        return true;
    }
</script>