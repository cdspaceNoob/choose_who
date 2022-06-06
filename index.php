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
    <title> 누가누가 운이 좋나 </title>
    <style>
        .p_num {
            text-align: center;
            margin: 20px;
            padding: 30px;
        }

        h1 {
            text-align: center;
            padding: 150px;
        }

        input::placeholder {
            text-align: center;
        }

        .start_btn {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1> 뭘 좀 알아보자 </h1>
    <form id="input_num_form" action="choosewho.php" method="post">
        <div class="p_num">
            <lable for="input_num"> 몇 명이서 놀지? </lable><br>&nbsp;<br>
            <input type="number" name="input_num" id="input_num" placeholder="숫자만 적을 수 있어요" required>
        </div>
        <div class="start_btn">
            <button id="start_btn" name="start_btn" onclick="return nextPage();"> 놀이 시작 !</button>
        </div>
    </form>
</body>
<script>
    function nextPage() {
        const form = document.getElementById("input_num_form");
        let number = document.getElementById("input_num").value;
        //alert(number); number는 정상적으로 들어오고 있다
        //const isNaN = isNan(number); input type="number"로 설정하여 숫자만 받음


        /*if (isNaN == false) {
            alert("숫자만 넣으라고 했다");
            return false;
        }
        if (!number) {
            alert("숫자 넣으라는 거 안 보이니?")
            document.getElementById("input_num").focus();
        }*/
        if (number == 1) {
            alert("친구 없니? 돌아가렴");
            form.input_num.focus();
            return false;
        }

        if (number <= 0) {
            alert("사람이 없을 순 없어 생각을 좀 해");
            form.input_num.focus();
            return false;
        }
        form.submit();
    }
</script>

</html>