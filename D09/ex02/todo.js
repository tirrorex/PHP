var i = 0;

function todo() {
	var newtodo = prompt("please enter your new todo");
	if (newtodo != null)
	{
		creatediv(newtodo);
	}
}


function creatediv(content) {
	var div1 = 	document.getElementById("ft_list");
	var div2 = document.createElement("div");		
	div2.innerHTML = content;
	div1.insertBefore(div2, div1.firstChild);
	div2.setAttribute("name", 'todo' + i++);
	div2.addEventListener('click', onclickdo, false);
	function onclickdo () {
	var result = confirm("Do you want to delete?");
	if (result)
		{
			deleteCookie(div2.getAttribute('name'));
			div2.parentNode.removeChild(div2);
		}
	}
	setCookie(div2.getAttribute('name') ,content);

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