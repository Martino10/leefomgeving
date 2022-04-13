window.onload = () => {

    // Verandert kleuren op basis van elementen en scores

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

    var green = 'invert(64%) sepia(52%) saturate(4174%) hue-rotate(75deg) brightness(110%) contrast(106%)';
    var yellow = 'invert(63%) sepia(97%) saturate(1397%) hue-rotate(13deg) brightness(98%) contrast(98%)';
    var red = 'invert(33%) sepia(94%) saturate(7493%) hue-rotate(357deg) brightness(108%) contrast(129%)';

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
                    var score = 100 - (Math.abs(waarde - 700) / 10);
                    break;
                case 'temp':
                    var score = 100 - (Math.abs((waarde - 20) * 7));
                    break;
                case 'gas':
                    var score = Math.min(100 - ((waarde-600)/100 * 5), 100);
                    break;
                case 'luchtvocht':
                    var score = 100 - (Math.abs(waarde - 45) * 2);
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

}