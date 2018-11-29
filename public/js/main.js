
var user_nav; // 상단 고정 메뉴바의 이름 클릭 시 나타나는 dropdown 처리
var nav;      // dropdown 처리.
var user_nav_mobile;

user_nav = document.getElementById("user-nav");
user_nav_mobile = document.getElementById("user-nav-mobile");
nav = document.getElementById("nav");
// 목록버튼을 클릭하면 실행될 클릭리스너추가.
user_nav.addEventListener("click", user_dropdown);
user_nav_mobile.addEventListener("click", user_dropdown-mobile);
nav.addEventListener("click", dropdown);

function user_dropdown() {
    document.getElementById("user-myDropdown").classList.toggle("user-show");
}

function user_dropdown_mobile() {
    document.getElementById("user-myDropdown-mobile").classList.toggle("user-show");
}

function dropdown() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// 사용자가 다른 곳을 클릭하면 드롭다운 메뉴가 닫힌다.
window.onclick = function(e) {
    if (!e.target.matches('.dropbtn')) {
        var myDropdown = document.getElementById("myDropdown");
        if (myDropdown.classList.contains('show')) {
            myDropdown.classList.remove('show');
        }
    }

    if (!e.target.matches('.user-dropbtn')) {
        var user_myDropdown = document.getElementById("user-myDropdown");
        if (user_myDropdown.classList.contains('user-show')) {
            user_myDropdown.classList.remove('user-show');
        }
    }
}
/*
    url주소를 참조하여 마지막에 어떤 값이 있는지에 따라
    nav에 해당 페이지라는 것을 진하게 표시해준다.
    li에 각각 id값을 주고 url의 마지막 값을 id값으로
    이용하여 on이라는 클래스를 추가한다
    on 클래스가 추가되면 글씨를 두껍게하고 밑줄을 넣는다.
    기본페이지일 경우는 따로 확인하여 추가한다.
*/
var paths = location.pathname.split('/'); // 배열로나옴
var path = paths[paths.length-1]||paths[paths.length-2];
$('#'+path).addClass('on');
if(path == 'help') {
    $('#notices').addClass('on');
} else if(path == 'surveyBoard') {
    $('#surveyBoard').addClass('on');
}