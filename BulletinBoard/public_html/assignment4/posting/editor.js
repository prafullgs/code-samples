//Variables for controlling opening and closing tags (function tag)

var b = 2;
var i = 2;
var u = 2;
var s = 2;
var c = 2;
var url = 2;
var img = 2;

//Function for creating non-font tags

function tag(v, tagadd, newbut, tagclose, oldbut, name) {
    if (eval(v)%2 == 0) {
        eval("window.document.editform."+name+".value = newbut;");
        var post = window.document.editform.post.value;
        window.document.editform.post.value = post + tagadd;
        window.document.editform.post.focus();
    } else {
        eval("window.document.editform."+name+".value = oldbut;");
        var post = window.document.editform.post.value;
        window.document.editform.post.value = post + tagclose;
        window.document.editform.post.focus();
    }
    eval(v+"++;");
}
