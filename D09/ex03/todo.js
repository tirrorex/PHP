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
			deleteCookie($(div2).attr('name') ,content);
			$(div2).remove();
		}
	});
}

function setCookie(cname, cvalue) {
$.post( "insert.php", { name: cname, content: cvalue } );
}

function deleteCookie(cname, cvalue) {
$.post( "delete.php", { name: cname, content: cvalue } );
}


function getCookies()
{
 $.post( "select.php", function( data ) {
  var sorteddata = Object.keys(data).sort();
  for (var x in sorteddata)
{
	deleteCookie(data[sorteddata[x]]['name'], data[sorteddata[x]]['content']);
	creatediv(data[sorteddata[x]]['content']);
	console.log(data[sorteddata[x]]['name']);

}
}, "json");
}

 var cookies = getCookies();