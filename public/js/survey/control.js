var popup_btn;
var iframeSet;    // iframe을 감싸고 있는 div의 display를 컨트롤 하기 위함.
var close_iframe;
var url;
var iframe;


popup_btn = document.getElementById("popup");
popup_btn.addEventListener("click", open);
iframeSet = document.getElementById("survey");
url = document.getElementById("test").value;
iframe = document.getElementById('iframe');

close_iframe = document.getElementById("close-iframe");
close_iframe.addEventListener("click", close);

// 목록이 클릭되면 iframe이 열린다.
function open() {
    iframe.setAttribute('src', '{{ route(' + help.contact + ')}}');

    iframeSet.style.display = "block";
    
}

// X버튼 누르면 iframe이 닫히게 한다.
function close() {
    iframeSet.style.display= "none";
}