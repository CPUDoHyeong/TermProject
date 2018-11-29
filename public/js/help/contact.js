// icon을 감싸고있는 a태그에 마우스를 올려도 
// 아이콘은 내부가 가득찬 아이콘으로 변경한다.
var icon_a;
var icon;
var iframeSet;    // iframe을 감싸고 있는 div의 display를 컨트롤 하기 위함.
var user_select;
var close_iframe; // X 눌렀을 때 iframe 닫기 위해서 설정.
var child;
icon_a = document.getElementById("icon-a");
icon = document.getElementById("icon-img");
iframeSet = document.getElementById("support");

icon_a.addEventListener("click", open);
icon_a.addEventListener("mouseover", over);
icon_a.addEventListener("mouseout", out);

close_iframe = document.getElementById("close-iframe");
close_iframe.addEventListener("click", close);

// 아이콘을 클릭하면 iframe의 스타일이 none에서 block으로 바뀜으로써 오픈된다.
function open() {
    iframeSet.style.display = "block";
}
// 마우스가 올라갔을 때 색칠된 아이콘을 보여줌.
function over() {
    icon.src="../img/help/customer-fill.png";
}

// 벗어났을 때 원래의 이미지를 보여줌.
function out() {
    icon.src="../img/help/customer-stroke.png";
}

// X버튼 누르면 iframe이 닫히게 한다.
function close() {
    iframeSet.style.display= "none";
}