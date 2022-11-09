<link rel="stylesheet" href="assets/css/QRCodeService.css">

<style>
    .container {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .container .buttons {
        width: 150px;
        margin: auto;
        background-color: grey; 
        padding: 10px; 
        border-radius: 20px;  
        color: white; 
        cursor: pointer;
    }
</style>

<body>
    <?php
        require_once('services/qrcodeService.php');

        if (isset($_POST['generate'])) {
            $quantidade = filter_input(INPUT_POST, 'qrcode');
            $generator = new QRCodeGenerator();
            $generator->setQuant($quantidade);
            $generator->generator();
        }

    ?>
    <br>
    <div class="col-sm-12 text-right">
        <div class="container mx-auto">
            <button type="button" class="buttons"  onclick="callPrinter()" id="printButton"><i class="fa fa-printer"></i> Imprimir</button>
  	     <button type="button" class="buttons" onclick="history.back()">Voltar</button>
        </div>
    </div>  

    <?php include_once('includes/scripts.php') ?> 

    <script>
        function callPrinter() {
            let printButton = document.getElementById("printButton");
            let content = document.getElementById("content");

            content.style.marginLeft = "5px";
            content.style.marginTop = "20px";
            printButton.style.visibility = "hidden";
            window.print();
            printButton.style.visibility = "visible";
        }
    </script>
</body>

</html>