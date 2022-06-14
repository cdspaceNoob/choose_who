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
    <title> 선택 받을 자 누구야! </title>
    <style>
        body {
            background-image: url(back.jpg);
            background-repeat: no-repeat;
            background-position: center;
            height: 100vh;
            background-size: cover;
        }

        .insert_name_div {
            text-align: center;
        }

        h1 {
            text-align: center;
            padding-top: 300px;
            padding-bottom: 50px;
        }

        p {
            text-align: center;
        }

        input[name="insert_name"] {
            margin: 10px;
            opacity: 0.5;
            border: none;
            border-radius: 7px;
            text-align: center;
        }

        input[name="insert_name"]:focus {
            margin: 10px;
            opacity: 0.5;
            border: none;
            border-radius: 7px;
            text-align: center;
            outline: none;
        }

        ::placeholder {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php $number = $_REQUEST["input_num"];
    if (!$number) {
        echo "<script> alert('몇 명이서 놀 건지부터 정해야지!'); </script>";
        header("Refresh:0; URL=index.php");
    }
    ?>
    <h1> 승부는...<br> 단 3초안에 날 겁니다 </h1>
    <p> 선수 입장 </p>
    <?php
    for ($i = 1; $i < $number + 1; $i++) { ?>
        <div class="insert_name_div">
            <input type="text" placeholder="<?php echo $i; ?>번 타자" name="insert_name" id="<?php echo "insert_name_" . $i; ?>">
        </div>
    <?php } ?>
    <div style="text-align: center; padding:30px">
        <button type="button" class="btn btn-primary" name="btn_insert_name" id="btn_insert_name" onclick="return choosewho()">될 놈 누구야!</button>
    </div>
    </form>
</body>
<script>
    function choosewho() {
        let name = new Array();

        let replace_Char = /[~!@\#$%^&*\()\-=+_'\;<>0-9\/.\`:\"\\,\[\]?|{}]/gi;
        let not_perfect_korean = /[ㄱ-ㅎ ㅏ-ㅣ]/gi;

        for (let i = 1; i < <?php echo $number; ?> + 1; i++) {
            let str = String("insert_name_" + i);
            if (!(document.getElementById(str).value)) {
                alert(i + "번 타자 대답합니다");
                return false;
            }
            //테스트를 위한 alert(str);
            name.push(document.getElementById(str));
            //테스트를 위한 alert(name[i - 1]);
        }
        //여기에 3초 남음 모달 페이지 바로 만들기 
        //settimeout 2초 : 모달 페이지 숫자 2로 바꾸기
        //settimeout 1초 : 모달 페이지 숫자 1로 바꾸기
        let random_number = Math.floor(Math.random() * name.length);
        let name_picker = name[random_number].value;
        setTimeout(function() {
            alert("< " + name_picker + " >" + "\n바로 니가 주인공이야");
        }, 3000);

    }
</script>

</html>