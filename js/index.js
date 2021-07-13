/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function TestLang() {
    var y = true;
    if (document.getElementById("Lang").value == "0") {
        document.getElementById("Lang").style.borderColor = "red";
        document.getElementById("Lang").style.borderWidth = "thick";
        y = false;
    } else {
        document.getElementById("Lang").style.borderColor = "#ccc";
    }
    if (y) {
        document.getElementById("slang").value = document.getElementById("Lang").value;
        document.Start.submit();
    }
}

function TestAns() {
    var y = true;
    if (document.getElementById("q").value == "") {
        document.getElementById("q").style.borderColor = "red";
        document.getElementById("q").style.borderWidth = "thick";
        y = false;
    } else {
        document.getElementById("q").style.borderColor = "#ccc";
    }
    if (document.getElementById("t").value == "") {
        document.getElementById("t").style.borderColor = "red";
        document.getElementById("t").style.borderWidth = "thick";
        y = false;
    } else {
        document.getElementById("t").style.borderColor = "#ccc";
    }
    if (document.getElementById("f1").value == "" &&
            document.getElementById("f2").value == "" &&
            document.getElementById("f3").value == "" &&
            document.getElementById("f4").value == "") {
        document.getElementById("f1").style.borderColor = "red";
        document.getElementById("f1").style.borderWidth = "thick";
        document.getElementById("f2").style.borderColor = "red";
        document.getElementById("f2").style.borderWidth = "thick";
        document.getElementById("f3").style.borderColor = "red";
        document.getElementById("f3").style.borderWidth = "thick";
        document.getElementById("f4").style.borderColor = "red";
        document.getElementById("f4").style.borderWidth = "thick";
        y = false;
    } else {
        document.getElementById("f1").style.borderColor = "#ccc";
        document.getElementById("f2").style.borderColor = "#ccc";
        document.getElementById("f3").style.borderColor = "#ccc";
        document.getElementById("f4").style.borderColor = "#ccc";
    }
    if (y) {
        document.Insert.submit();
    }
}

function Result() {
    var y = true;
    var score = 0;
    if (document.getElementById("name").value == "") {
        document.getElementById("name").style.borderColor = "red";
        document.getElementById("name").style.borderWidth = "thick";
        y = false;
    } else {
        document.getElementById("name").style.borderColor = "#ccc";
    }
    if (document.getElementById("class").value == "") {
        document.getElementById("class").style.borderColor = "red";
        document.getElementById("class").style.borderWidth = "thick";
        y = false;
    } else {
        document.getElementById("class").style.borderColor = "#ccc";
    }
    if (document.getElementById("session").value == "") {
        document.getElementById("session").style.borderColor = "red";
        document.getElementById("session").style.borderWidth = "thick";
        y = false;
    } else {
        document.getElementById("session").style.borderColor = "#ccc";
    }
    if (y) {
        var num_of_q = document.getElementById("question_number").value;
        var i = 1;
        for (i = 1; i <= num_of_q; i++) {
            var ans = document.getElementsByName("q" + i);
            for (var j = 0; j < ans.length; j++) {
                if (ans[j].checked) {
                    score = score + 1;
                    break;
                }
            }
        }
        document.getElementById("score").value = score;
        document.Quiz.submit();
    }
}

var xmlhttp;
if (window.XMLHttpRequest) {
    xmlhttp = new XMLHttpRequest();
} else {
    xmlhttp = new ActiveXObject("Microsoft.XM");
}
xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("search").innerHTML = this.responseText;

    }
};


function type_act() {

    var sel = document.getElementById('Categoryn');
    sel = sel.options[sel.selectedIndex].text;
    var ar = sel.split('-');
    date = ar[0];
    project = ar[1];
    cycle = ar[2];
    ctype = ar[3];
    area = ar[4];
    document.getElementById('Name').value =
            date + "-" + project + "-" + cycle + "-" + ctype + "-" + atype + "-" + area + "-" + coach;

    var c = document.getElementById("Categoryn").value;
    xmlhttp.open("GET", "activityType.php?class=" + c, true);
    xmlhttp.send();
}

function Search() {
    var c = document.getElementById("branches").value;

    xmlhttp.open("GET", "resultSearch.php?c=" + c, true);
    xmlhttp.send();
}

function checkLevel() {
    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XM");
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("level").innerHTML = this.responseText;

        }
    };
    
    var lang = document.getElementById("lang").value;
//    alert (lang);
     xmlhttp.open("GET", "xml/checklevel.php?lang=" + lang, true);
    xmlhttp.send();
}


function next(qn) {
    document.getElementById("qq" + qn).style = "display:none;";
    qn = qn + 1;
    document.getElementById("qq" + qn).style = "display:block;";
}

function back(qn) {
    document.getElementById("qq" + qn).style = "display:none;";

    qn = qn - 1;
    document.getElementById("qq" + qn).style = "display:block;";

}
