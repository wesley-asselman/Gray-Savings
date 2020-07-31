<h1>Homepage</h1>
<div class="col-sm-12 off-white">
    <h3>The Fizzbuzz challenge</h3>
    <?php
        $i = 1;

        for($i = 1; $i <= 15; $i++){
            if($i % 15 == 0){
                echo "fizzbuzz" . "<Br>";
            }elseif($i % 5 == 0 ){
                echo "buzz" . "<Br>";
            }elseif($i % 3 == 0){
                echo "fizz" . "<Br>";
            }else{
                echo $i . "<br>";
            }
        }
    ?>
</div>