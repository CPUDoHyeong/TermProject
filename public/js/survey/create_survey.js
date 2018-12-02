
// 해당 textarea에 글을 입력하면 자동으로 칸을 늘려주는 이벤트추가
var textarea;

textarea = document.getElementsByClassName("answer-textarea")[0];
textarea.addEventListener('keydown', resize);
textarea.addEventListener('keyup', resize);

function resize() {
    textarea.style.height = "74px";
    textarea.style.height = (12+textarea.scrollHeight) + "px";
}

// 사용자가 파일업로드를 했을 때, 이미지 파일인지 체크한다.
// 이미지만 받을 수 있도록 제한하기위함.
function fileCheck(obj) {
    pathpoint = obj.value.lastIndexOf('.');
    filepoint = obj.value.substring(pathpoint+1, obj.length);

    filetype = filepoint.toLowerCase();
    
    if(filetype=='jpg' || filetype=='gif' || filetype=='png' || filetype=='jpeg' || filetype=='bmp') {
        // 정상적인 이미지 확장자 파일
    } else {
        alert('이미지 파일만 선택 할 수 있습니다.');
        // 파일업로드 된거를 다시 빈값으로 바꾼다                
        obj.value='';
    }

    if(filetype=='bmp') {
        upload = confirm('BMP 파일은 웹상에서 사용하기에 적절한 이미지 포맷이 아닙니다. \n그래도 사용하시겠어요?');
        if(!upload) return false;
    }

    // 이미지인지는 검사했고 파일이 있는지 확인 후
    // 미리보기 보여줌.
    if(obj.files && obj.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#survey_img').attr('src', e.target.result);
        }

        reader.readAsDataURL(obj.files[0]);
    }
}

function addItem() {
    item_ul = document.getElementById("item_ul");
    item_li = document.createElement('li');
    item_input = document.createElement('input');
    item_input.setAttribute('type', 'text');
    item_input.setAttribute('class', 'item');
    item_li.appendChild(item_input);
    item_ul.appendChild(item_li);


    li_length = item_ul.childElementCount;
    for(i = 0; i < li_length; i++) {
        replace_input = item_ul.children[i].getElementsByTagName("input")[0];
        replace_input.setAttribute('name', 'item' + (i + 1));
        replace_input.setAttribute('placeholder', '항목' + (i + 1));
    }

}

// 항목 제거 이벤트 처리
function deleteItem() {
    item_ul = document.getElementById("item_ul");

    while(item_ul.hasChildNodes()) {
        item_ul.removeChild(item_ul.lastChild);
        return;
    }
}

// 참여 인원에서 제한 없음과 직접 입력 클리시 이벤트 처리
$("input[name=limit]").change(function() {
    var radioValue = $(this).val();
    if(radioValue == "limit") {
        $('.limit-input').attr("readonly", true).attr("disabled", false);
        $('.limit-input').css("background-color", "rgb(200, 200, 200)");
        $('.limit-input').css("cursor", "default");
        $
    } else if(radioValue == "entry") {
        $('.limit-input').attr("readonly", false).attr("disabled", false);
        $('.limit-input').css("background-color", "rgb(243, 243, 243)");
        $('.limit-input').css("cursor", "auto");
    }
});