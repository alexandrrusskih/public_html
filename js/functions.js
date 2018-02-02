var contentHeight = 640;
var pageHeight = document.documentElement.clientHeight - 225;
var scrollPosition;
var n = 9;
var xmlhttp;

function putImages() {
    if (xmlhttp.readyState == 4) {
        if (xmlhttp.responseText) {
            var resp = xmlhttp.responseText.replace("\r\n", "");
            var files = resp.split(";");
            var j = 0;
            for (i = 0; i < files.length; i++) {
                if (files[i] != "") {
                    document.getElementById("container").innerHTML += '<img class="preview" src=' + files[i] + ' " onCLick="popupImg(this)" />';
                    j++;
                    if (j == 8) {
                        // document.getElementById("container").innerHTML += '<p>'+(n-1)+" Images Displayed | <a href='#header'>top</a></p><br /><hr />";
                        j = 0;
                    }
                }
            }
        }
    }
}

function scroll() {
    if (navigator.appName == "Microsoft Internet Explorer") scrollPosition = document.documentElement.scrollTop;
    else scrollPosition = window.pageYOffset;
    if ((contentHeight - pageHeight - scrollPosition) < 120) {
        if (window.XMLHttpRequest) xmlhttp = new XMLHttpRequest();
        else
        if (window.ActiveXObject) xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        else alert("Извините! Ваш браузер не поддерживает XMLHTTP!");
        var url = "getImages.php?n=" + n;
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
        n += 9;
        xmlhttp.onreadystatechange = putImages;
        contentHeight += 640;
    }
}