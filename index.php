<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Şehir ve İlçeler</title>
</head>
<body>
    <?php $_TURKEY = json_decode(file_get_contents("Turkey.json"),true); ?>
   <select name="provinces" id="provinces">
       <?php foreach($_TURKEY as $key => $turkey){ ?>
            <option <?php echo $turkey["plaka"] == 34 ? 'selected' : null ?> value="<?php echo $key ?>"><?php echo $turkey["il"] ?></option>
        <?php } ?>
   </select>

   <select name="cities" id="cities">
       <?php foreach($_TURKEY as $turkey){ ?>
            <?php if ($turkey["plaka"] == 34){ ?>
                    <?php foreach($turkey["ilceleri"] as $ilce){ ?>
                        <option value="<?php echo $ilce ?>"><?php echo $ilce ?></option>
                    <?php } ?>
            <?php } ?>
        <?php } ?>
   </select>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('#provinces').on('change',function (){
        $.ajax({
            url:"ajax.php",
            data: {il:$(this).val()},
            dataType:"json",
            type:"post",
            success: function (dt){
                let cities = $('#cities');
                cities.empty();

                $.each(dt, function(i, item) {
                    cities.append(`<option value="${dt[i]}">${dt[i]}</option>`);
                });
            } 
        })
    })
</script>
</body>
</html>