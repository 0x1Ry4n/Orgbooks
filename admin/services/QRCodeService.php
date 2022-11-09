<?php 
    include_once("../vendors/autoload.php");

    define('INITIAL', 1);
    define('SIZE_QRCODE', 1000000);

    class QRCodeGenerator
    {
        private $quant;

        public function setQuant($data)
        {
            $this->quant = $data;
        }   

        private function getQuant()
        {
            return $this->quant;
        }

        private function randomize($min, $max, $quantidade)
        {
            $numbers = range($min, $max);
            shuffle($numbers);
            return array_slice($numbers, 0, $quantidade);
        }

        public function generator()
        {
            $array = array();
            $cont = 0;
            echo "<div id='content'>";
                while ($cont < $this->getQuant()) {
                    $numbers = $this->randomize(INITIAL, SIZE_QRCODE, $this->getQuant())[$cont];
                    echo '<div style="flex-direction: column;">';
                        echo '<img style="width: 150px; height: 150px" class="output" src="' . (new \chillerlan\QRCode\QRCode())->render($numbers) . '" />';
                        echo "<p style='text-align: center; font-weight: bold'>". $numbers . "</p>";
                    echo '</div>';

                    array_push($array, $numbers);

                    echo '<script>console.log(' . $numbers . ');</script>';
                    $cont++;
                }
                
                $this->isEqual($array);
            
            echo "</div>";
        }


        private static function isEqual($array) {
            $arr = array_count_values($array);

            foreach ($arr as $key => $value) {
                if ($value > 1) {
                    echo "<script> console.log('Valor repetido: $key '); </script>";
                } 
            }
        }
    }

?>