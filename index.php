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
        body {
            background-image: url(back.jpg);
            background-repeat: no-repeat;
            background-position: center;
            height: 100vh;
            background-size: cover;
        }

        .p_num_div {
            text-align: center;
            padding: 25px;
        }

        h1 {
            text-align: center;
            padding-top: 300px;
            padding-bottom: 10px;
            color: #ced4da;
        }

        .start_btn {
            padding-top: 30px;
            text-align: center;
        }

        /* input type="number"일 때 화살표 삭제하기 */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        #input_num {
            border-top: none;
            border-right: none;
            border-left: none;
            border-color: white;
            text-align: center;
            font: white;
            width: 150px;
            background: transparent;
        }

        /* 입력 중일 때 css 정의 */
        #input_num:focus {
            border-top: none;
            border-right: none;
            border-left: none;
            border-color: white;
            text-align: center;
            font: white;
            width: 150px;
            background: transparent;
            outline: none;
            color: white;
        }

        /* 입력 중일 때 placeholder 요소 바꿔주기 */
        #input_num:focus::placeholder {
            color: white;
        }

        #input_label {
            color: white;
        }

        input::placeholder {
            text-align: center;
            font-size: 10px;
            color: white;
        }
    </style>
</head>

<body>

    <h1> 몇 명이서 놀 거야? </h1>
    <form id="input_num_form" action="choosewho.php" method="post">

        <div class="p_num_div">
            <input type="number" name="input_num" id="input_num" autocomplete='off' placeholder="몇 명?">
        </div>

        <div class="start_btn">
            <button class="btn btn-primary" id=" start_btn" name="start_btn" onclick="return nextPage();"> 놀이 시작!</button>
        </div>

    </form>
</body>

<!--Jquery부터 불러오기-->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

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
            alert("사람이 없을 순 없는디? \n정신 차리기");
            form.input_num.focus();
            return false;
        }
        form.submit();
    }

    $('#input_num').focus(function() {
        $('#input_num').attr("placeholder", "몇 명인지 숫자만 입력!");
    });
</script>

</html>