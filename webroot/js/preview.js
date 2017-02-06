/**
 * Created by alex on 06.02.17.
 */
window.onload = function(){
    var data = document.getElementById("preview");
    if( data && document.getElementById('view')) {
        data.onclick = function(){
            var str  = '<table class="table table-striped" style="width: 100%;"><tr><td style="width: 10%">Name</td><td style="width: 20%">Email</td><td style="width: 40%">Task</td><td style="width: 30%">Img</td></tr>';
            str += '<tr><td>' + document.forms[0].name.value + '</td>';
            str += '<td>' + document.forms[0].email.value + '</td>';
            str += '<td>' + document.forms[0].task.value + '</td>';
            str += '<td>Here will be your img:  <img alt="' + document.forms[0].img.value.substr(12) + '"> after I will learn JS and AJAX.</td></tr></table>';

            document.getElementById('view').innerHTML = str;
        }
    }
}