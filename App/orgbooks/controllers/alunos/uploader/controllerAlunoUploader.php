<?php
    namespace App\Controller\ImageUploader;

    $root = realpath($_SERVER['DOCUMENT_ROOT']);

    include_once("$root\orgbooks\controllers\scripts\alertDialog.php");
    require_once("$root\orgbooks\model\database.php");

    class AlunoUploaderController {
		
		private $uploader;
		
		public function __construct($id_aluno)
		{
			$this->uploader = new \Model\Database();
			$this->uploadImage($id_aluno);
		}
        
		private function uploadImage($id_aluno) {
			
			$filename = uniqid().date("Y-m-d-H-i-s").$_FILES['image']['name'];
			$destination = "../uploads/alunos/". str_replace(" ", "", $filename);
			$image = $_FILES['image']['tmp_name'];

			if (!empty($image)) {

				move_uploaded_file($image, $destination);
				$location = $destination;

				$execute = $this->uploader->uploadAlunoImage($location, $id_aluno);

				if ($execute) {
					echo "<script>toastr.success('Imagem atualizada com sucesso!');</script>";
				} else {
					echo "<script>toastr.warning('Selecione uma imagem válida para atualizar!');</script>";
				}
			}
		}
	}
?>