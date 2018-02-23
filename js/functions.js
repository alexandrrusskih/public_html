var contentHeight = 640;
var pageHeight = document.documentElement.clientHeight - 225;
var scrollPosition;
var n = 8;
var xmlhttp;
var xmlhttp1;

function showImages()
{
	if (xmlhttp1.readyState == 4) {
		if (xmlhttp1.responseText) {
			var resp = xmlhttp1.responseText.replace("\r\n", "");
			var files = resp.split(";");
			var j = 0;
			var items=[];
			for (i = 0; i < files.length; i++) {
				if (files[i] != "") {
					items.push({src : files[i], opts:{ thumb :files[i]}},);
				}
			}

			items.pop();
			console.log(items);
			$.fancybox.open(items, 
			{
				loop : false,
				animationEffect : "zoom",
				animationDuration : 500,
				transitionEffect : "slide",
				toolbar : false
			});
		}
	}
}
// [
//     {
//     	src  : src,
//     	opts : {
//     		thumb   : src
//     	}
//     },
//     {
//     	src  : src,
//     	opts : {
//     		thumb   :src
//     	}
//     }
//     ]


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
		n += 8;
		xmlhttp.onreadystatechange = putImages;
		contentHeight += 640;
	}
}


function popupImg1(immm) { // Событие клика на маленькое изображение
    var img = $(this); // Получаем изображение, на которое кликнули
    var src = immm.src; // Достаем из этого изображения путь до картинки
    var rest = src.substring(21);
    src = "foto/" + rest;
    $("body").append("<div class='popup'>" + //Добавляем в тело документа разметку всплывающего окна
        "<div class='popup_bg'></div>" + // Блок, который будет служить фоном затемненным
        "<img src=" + src + " class='popup_img' />" + // Само увеличенное фото
        "</div>");
    $(".popup").fadeIn(400); // Медленно выводим изображение
    $(".popup_img").click(function() { // Событие клика на затемненный фон
        $(".popup").fadeOut(400); // Медленно убираем всплывающее окно
        setTimeout(function() { // Выставляем таймер
            $(".popup").remove(); // Удаляем разметку высплывающего окна
        }, 400);
    });
}



function clickImage(im_src){
    var img = $(this); // Получаем изображение, на которое кликнули
    var src = im_src.src; // Достаем из этого изображения путь до картинки
    var rest = src.substring(22);
// console.log(rest);
if (window.XMLHttpRequest) xmlhttp1 = new XMLHttpRequest();
else
	if (window.ActiveXObject) xmlhttp1 = new ActiveXObject("Microsoft.XMLHTTP");
else alert("Извините! Ваш браузер не поддерживает XMLHTTP!");
var url = "get_indexes.php?n=" +rest;
xmlhttp1.open("GET", url, true);
xmlhttp1.send();
xmlhttp1.onreadystatechange = showImages;

}


function popupImg(immm) { // Событие клика на маленькое изображение
    var img = $(this); // Получаем изображение, на которое кликнули
    var src = immm.src; // Достаем из этого изображения путь до картинки
    var rest = src.substring(21);
    src = "foto/" + rest;

    $.fancybox.open([
    {
    	src  : src,
    	opts : {
    		animationEffect : 'zoom',
    		thumb   : src
    	}
    },
    {
    	src  : src,
    	opts : {
    		thumb   :src
    	}
    }
    ], {
    	loop : false,
    	animationEffect : "zoom",
    	animationDuration : 500,
    	transitionEffect : "slide",
    	toolbar : false
    });

}
