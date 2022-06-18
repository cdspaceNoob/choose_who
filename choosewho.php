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
        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.3);
            /* z-index는 모달을 화면의 맨 앞으로 끌어내기 위함 */
            /* z-index: 1000; */

            /* 일단 숨겨놓기 */
            z-index: -1;
            opacity: 0;
        }

        /* 모달이 나타날 때 적용할 스타일을 만들기 */
        /* z-index와 opacity를 설정하여 투명도와 위치가 원래대로 나타나도록 */
        .show {
            opacity: 1;
            z-index: 1000;
            transition: all .5s;
        }

        .window {
            /* 배경에 가득 차도록 width와 height 설정 */
            /* 팝업이 들어갈 공간을 제한하기 위해 position: relative 속성 추가 */
            position: relative;
            width: 100%;
            height: 100%;
        }

        .popup {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #ffffff;
            box-shadow: 0 2px 7px rgba(0, 0, 0, 0.3);

            /* 임시지정? */
            /* 화면의 세로 길이를 넘기는 경우에만 height를 지정하여 스크롤을 넣어둔다 */
            /* 그렇지 않은 경우라면 아래 둘 다 지정하지 않는다 -> 내용을 넣으면 알아서 화면이 늘어나기 때문 */
            width: 200px;
            height: 200px;

            /* 초기에 약간 아래에 배치하여 올라오는 느낌이 들도록 */
            transform: translate(-50%, -40%);
        }

        .show .popup {
            transform: translate(-50%, -50%);
            transition: all .5s;
        }

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

<?php
$number = $_REQUEST['input_num'];
if (!$number) {
    echo "<script>alert('몇 명이서 놀 건지부터 정합시다');</script>";
    header("Refresh:0; URL=index.php");
}
?>

<body>
    <h1> 승부는...<br> 단 3초안에 날 겁니다 </h1>
    <p> 선수 입장 </p>
    <?php
    for ($i = 1; $i <= $number; $i++) { ?>
        <div class="insert_name_div">
            <input type="text" placeholder="<?php echo $i . '번 타자'; ?>" name="insert_name" id="<?php echo 'insert_name_' . $i; ?>">
        </div>
    <?php } ?>
    <div style="text-align: center; padding:30px">
        <button type="button" class="btn btn-primary" name="btn_insert_name" id="btn_insert_name" onclick="return choosewho()">될 놈 누구야!</button>
    </div>

    <!-- 화면 전체를 어둡게 만들어주는 background-->
    <div class="background" id="background">
        <!-- 모달 팝업을 감싸주는(?) window-->
        <div class="window">
            <!-- 모달의 실제 내용을 표시하는 popup-->
            <div class="popup"></div>
        </div>
    </div>
</body>

<!--Jquery부터 불러오기-->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script>
    function modal_open() {
        document.querySelector(".background").className = "background show";
    }

    function modal_close() {
        document.querySelector(".background").className = "background";
    }

    function choosewho() {
        let name = new Array();

        let replace_Char = /[~!@\#$%^&*\()\-=+_'\;<>0-9\/.\`:\"\\,\[\]?|{}]/gi;
        let not_perfect_korean = /[ㄱ-ㅎ ㅏ-ㅣ]/gi;

        for (let i = 1; i < 3 + 1; i++) {
            let str = String("insert_name_" + i);
            if (!(document.getElementById(str).value)) {
                alert(i + "번 타자 대답합니다");
                return false;
            }
            //테스트를 위한 alert(str);
            name.push(document.getElementById(str));
            //테스트를 위한 alert(name[i - 1]);
        }

        let random_number = Math.floor(Math.random() * name.length);
        let name_picker = name[random_number].value;

        const btn_insert_name_disabled = document.querySelector("#btn_insert_name");

        $('.popup').html('3')

        //클릭 비활성화
        btn_insert_name.addEventListener("click", function(e) {
            this.setAttribute("disabled", "disabled");
        })
        //모달 오픈
        modal_open();

        //1초가 지나면 2초가 남음
        setTimeout(function() {
            //getElementsByClassName은 innerHTML 속성을 가지고 있지 않으므로 JQuery사용
            $('.popup').html('2')
        }, 1000);

        //2초가 지나면 1초가 남음
        setTimeout(function() {
            //getElementsByClassName은 innerHTML 속성을 가지고 있지 않으므로 JQuery사용
            $('.popup').html('1')
        }, 2000);

        //3초 경과 시 결과 오픈
        setTimeout(function() {
            $('.popup').html("< " + name_picker + " >" + "\n바로 니가 주인공이야")
            //alert("< " + name_picker + " >" + "\n바로 니가 주인공이야");
        }, 3000);

        setTimeout(function() {
            background.addEventListener("click", e => {
                modal_close();
            });
        }, 3050);

        //클릭 활성화
        btn_insert_name.addEventListener("click", function(e) {
            this.setAttribute("", "");
        })
    }
</script>

</html>