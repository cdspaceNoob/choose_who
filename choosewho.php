<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Bootstrap은 HTML5환경에서만 작동한다-->
    <!-- Bootstrap 반응형 뷰포트 메타 태그-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS 스타일 시트 불러오기-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap JavaScript 번들 불러오기-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title> 선택 받은 자가 누구야! </title>
    <style>
        .insert_name_div {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php $number = $_REQUEST["input_num"]; ?>
    <h1 style="text-align: center; padding: 100px;"> 누가 걸릴지 기대가 된다 </h1>
    <p style="text-align: center;"> 아래의 빈칸에 이름을 입력하세요 </p>
    <?php
    for ($i = 1; $i < $number + 1; $i++) { ?>
        <div class="insert_name_div">
            <input type="text" placeholder="<?php echo $i; ?>번째 이름" name="insert_name" id="<?php echo "insert_name_" . $i; ?>" style="margin:10px;">
        </div>
    <?php } ?>
    <div style="text-align: center; padding:30px">
        <input type="button" name="btn_insert_name" id="btn_insert_name" value="당첨자 확인" onclick="choosewho()">
    </div>
    </form>
</body>
<script>
    function choosewho() {
        let name = new Array();
        for (let i = 1; i < <?php echo $number; ?> + 1; i++) {
            let str = String("insert_name_" + i);
            //테스트를 위한 alert(str);
            name.push(document.getElementById(str));
            //테스트를 위한 alert(name[i - 1]);
        }
        let random_number = Math.floor(Math.random() * name.length);
        let name_picker = name[random_number].value;
        alert(name_picker);
    }
</script>

</html>