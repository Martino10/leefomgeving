(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
window.onload = () => {
    // python script starten of stoppen
    function toggleStatus(num) {
        var i = num - 1;
        var statustext = document.getElementsByClassName('onlineinfo');
        var button = document.getElementsByClassName('status_button');
        // var status = document.getElementsByClassName('status');
        if (statustext[i].innerHTML == "Online") {
            statustext[i].innerHTML = 'Offline';
            statustext[i].style.color = 'red';
            button[i].style.borderColor = 'red';
            // status[i].setAttribute.value = 0;
        }
        else if (statustext[i].innerHTML == 'Offline') {
            statustext[i].innerHTML = 'Online';
            statustext[i].style.color = '#1BE70A';
            button[i].style.borderColor = '#1BE70A';
            // status[i].setAttribute.value = 1;
        }
        
    }
    window.toggleStatus = toggleStatus;

    // Verandert kleuren op basis van elementen en scores
    var green = 'invert(64%) sepia(52%) saturate(4174%) hue-rotate(75deg) brightness(110%) contrast(106%)';
    var yellow = 'invert(63%) sepia(97%) saturate(1397%) hue-rotate(13deg) brightness(98%) contrast(98%)';
    var red = 'invert(33%) sepia(94%) saturate(7493%) hue-rotate(357deg) brightness(108%) contrast(129%)';

    var gas = document.getElementsByClassName('gasscore')[0];
    var licht = document.getElementsByClassName('lichtscore')[0];
    var temperatuur = document.getElementsByClassName('temperatuurscore')[0];
    var luchtvocht = document.getElementsByClassName('luchtvochtscore')[0];

    function changeDataColors(datafield) {
        var field = document.getElementsByClassName('datacard_'+datafield);
        for (var i = 0; i < field.length; i++) {
            var content = field[i].children;
            if (datafield == 'geluid') {
                switch(content[2].innerHTML) {
                    case 'Ja':
                        var waarde = 1;
                        break;
                    case 'Nee':
                        var waarde = 0;
                        break;
                }
            }
            else {
                var waarde = parseFloat(content[2].innerHTML);
            }
            switch (datafield) {
                case 'licht':
                    var score = 100 - (Math.abs((waarde - 50) * 2));
                    if (typeof licht !== 'undefined') {
                        licht.innerHTML = score;
                    }
                    break;
                case 'temp':
                    var score = 100 - (Math.abs((waarde - 20) * 7));
                    if (typeof temperatuur !== 'undefined') {
                        temperatuur.innerHTML = score;
                    }
                    break;
                case 'gas':
                    var score = Math.min(100 - ((waarde-600)/100 * 5), 100);
                    if (typeof gas !== 'undefined') {
                        gas.innerHTML = score;
                    }
                    break;
                case 'luchtvocht':
                    var score = 100 - (Math.abs(waarde - 45) * 2);
                    if (typeof luchtvocht !== 'undefined') {
                        luchtvocht.innerHTML = score;
                    }
                    break;
                case 'geluid':
                    var score = Math.abs(waarde * 100 - 100);
                    break;
            }
            if (score < 60) {
                for (var j = 0; j < content.length; j++) {
                    content[j].style.color = 'red';
                }
                content[0].style.filter = red;
            }
            else if (score > 60 && score < 80) {
                for (var j = 0; j < content.length; j++) {
                    content[j].style.color = '#d1b202';
                }
                content[0].style.filter = yellow;
            }
            else {
                for (var j = 0; j < content.length; j++) {
                    content[j].style.color = '#1BE70A';
                }
                content[0].style.filter = green;
            }
            
        }
    }

    field_array = ['licht', 'temp', 'gas', 'luchtvocht', 'geluid'];
    for (var k = 0; k < field_array.length; k++) {
        changeDataColors(field_array[k]);
    }

    //Score
    var score = document.getElementsByClassName('qualityscore');
    var score_number = document.getElementsByClassName('qualityscore__number');

    for (var i = 0; i < score.length; i++) {
        if (score_number[i].innerHTML < 60) {
            score_number[i].style.color = 'red';
            score[i].style.setProperty('--g', 0);
            score[i].style.setProperty('--b', 0)
        }
        else if (score_number[i].innerHTML < 80) {
            score_number[i].style.color = '#d1b202';
            score[i].style.setProperty('--r', 209);
            score[i].style.setProperty('--g', 178);
            score[i].style.setProperty('--b', 2);
        }
        else {
            score_number[i].style.color = '#1BE70A';
            score[i].style.setProperty('--r', 11);
            score[i].style.setProperty('--g', 91);
            score[i].style.setProperty('--b', 4);
        }
    }

}

},{}]},{},[1]);
