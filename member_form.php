<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>소원 우체국 Wish Post Office</title>
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/member.css">
    <script>
        function check_input() {
            const id = document.member_form.id.value;
            const pass = document.member_form.pass.value;
            const passConfirm = document.member_form.pass_confirm.value;
            const name = document.member_form.name.value;
            const email1 = document.member_form.email1.value;
            const email2 = document.member_form.email2.value;

            // 아이디 길이 유효성 확인 (5~15자)
            if (!id || id.length < 5 || id.length > 15) {
                alert("아이디는 5~15자리로 입력해주세요.");
                document.member_form.id.focus();
                return false;
            }

            // 비밀번호 유효성 검사 조건 추가
            const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            if (!passwordRegex.test(pass)) {
                alert("비밀번호는 8자리 이상, 1개 이상의 대문자, 숫자, 특수문자를 포함해야 합니다.");
                document.member_form.pass.focus();
                return false;
            }

            // 비밀번호, 비밀번호 확인이 일치하지 않는 경우
            if (pass !== passConfirm) {
                alert("비밀번호가 일치하지 않습니다.");
                document.member_form.pass.focus();
                return false;
            }

            // 이름 2글자 미만인 경우
            const nameRegex = /^[a-zA-Z가-힣]{2,}$/;
            if (!nameRegex.test(name)) {
                alert("이름은 2글자 이상이어야 합니다.");
                document.member_form.name.focus();
                return false;
            }

            // 유효한 이메일 형식 아닌 경우
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(`${email1}@${email2}`)) {
                alert("유효한 이메일 형식이 아닙니다.");
                document.member_form.email1.focus();
                return false;
            }

            return true;
        }
    </script>
</head>

<body>
    <header>
        <?php include "header.php"; ?>
    </header>
    <section>
        <div id="main_img_bar">
            <img src="./img/main_img.png">
        </div>
        <div id="main_content">
            <div id="join_box">
                <form name="member_form" method="post" action="member_insert.php" enctype="multipart/form-data" onsubmit="return check_input();">
                    <h2>회원 가입</h2>
                    <div class="form id">
                        <div class="col1">아이디</div>
                        <div class="col2">
                            <input type="text" name="id">
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="form">
                        <div class="col1">비밀번호</div>
                        <div class="col2">
                            <input type="password" name="pass">
                        </div>
                    </div>
                    <div class="form">
                        <div class="col1">비밀번호 확인</div>
                        <div class="col2">
                            <input type="password" name="pass_confirm">
                        </div>
                    </div>
                    <div class="form">
                        <div class="col1">이름</div>
                        <div class="col2">
                            <input type="text" name="name">
                        </div>
                    </div>
                    <div class="form email">
                        <div class="col1">이메일</div>
                        <div class="col2">
                            <input type="text" name="email1">@<input type="text" name="email2">
                        </div>
                    </div>
                    <div class="form">
                        <div class="col1">프로필 사진</div>
                        <div class="col2">
                            <input type="file" name="profile_picture" accept="image/*">
                        </div>
                    </div>
                    <div class="bottom_line"></div>
                    <div class="buttons">
                        <button type="button" onclick="check_input()" id="join_box_button">가입하기</button>
                        <button type="button" onclick="reset_form()" id="reset_button">초기화</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <footer>
        <?php include "footer.php"; ?>
    </footer>
</body>

</html>