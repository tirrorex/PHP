var i = 0;

$("#todo").click(function () {
	var newtodo = prompt("please enter your new todo");
	if (newtodo != null)
	{
		creatediv(newtodo);
	}
});


function creatediv(content) {
	var div1 = 	$("#ft_list")[0];
	var div2 = $("<div></div>").text(content);
	$("#ft_list").prepend(div2);
	$(div2).attr("name", 'todo' + i++);
	setCookie($(div2).attr('name') ,content);
	$(div2).bind('click', function (){
	var result = confirm("Do you want to delete?");
	if (result)
		{
			deleteCookie($(div2).attr('name'));
			$(div2).remove();
		}
	});
}

function setCookie(cname, cvalue, days) {
   if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = cname+"="+cvalue+expires+";";
}

function deleteCookie(cname) {
	setCookie(cname, "", -1);
}

function getCookies()
{
	var cookiesArray = document.cookie.split(';');
	var array = {};

	for (var x in cookiesArray)
	{
		var subarray = cookiesArray[x].split("=");
		if (subarray.length > 1 && /todo\d+/.test(subarray[0]))
			array[subarray[0].trim()] = subarray[1].trim();		
	}
	return (array);
}

var cookies = getCookies();
var sortedKeys = Object.keys(cookies).sort();

for (var x in sortedKeys)
{
	deleteCookie(sortedKeys[x]);
	creatediv(cookies[sortedKeys[x]]);
}