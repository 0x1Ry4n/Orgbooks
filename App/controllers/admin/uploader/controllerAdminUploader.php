<?php
    namespace App\Controller\ImageUploader;

    $root = realpath($_SERVER['DOCUMENT_ROOT']);

    include_once("$root\controllers\scripts\alertDialog.php");
    require_once("$root\model\database.php");

    class AdminUploaderController {
		
		private $uploader;
		
		public function __construct($session_id)
		{
			$this->uploader = new \Model\Database();
			$this->uploadImage($session_id);
		}
        
		private function uploadImage($id_admin) {
			
			$filename = uniqid().date("Y-m-d-H-i-s").$_FILES['image']['name'];
			$destination = "../uploads/admin/". $filename;
			$image = $_FILES['image']['tmp_name'];

			if (!empty($image)) {

				move_uploaded_file($image, $destination);
				$location = $destination;

				$execute = $this->uploader->uploadAdminImage($location, $id_admin);

				if ($execute) {
					echo "<script>toastr.success('Imagem atualizada com sucesso!');</script>";
				} else {
					echo "<script>toastr.warning('Selecione uma imagem válida para atualizar!');</script>";
				}
			}
		}
	}
?>