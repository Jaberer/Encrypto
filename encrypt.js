//var elem = document.getElementById("m");
var MESSAGE = " hello ";

$('#m').keyup(function(evt)
{
	if (evt.keyCode == 32) 
	{
		//var elem = document.getElementById("m");
	
		//document.write("down \n"); works!
		//$('#m').val = "fdsa";
		//alert("down");
		/*
		var elem = document.getElementById("m");
		var message = elem.value; // save last token
		var split = message.lastIndexOf(" "); 
		var substring = 
		elem.value = reverse(elem.value.substring(1,elem.value.length);
		*/
		//var elem = document.getElementById("m"); // gets box
		//var message = elem.value;
		//alert(occurrences(elem.value, " ")); // works
		if(occurrences(elem.value, " ") == 1) // only one token
		{
			var sub = elem.value.substr(0, elem.value.length - 1); // entire thing except last character, the space
			sub = reverse(sub); // reverse token
			//alert(sub);
			elem.value = sub + " ";
		} // single word encryption works
		else if(occurrences(elem.value, " ") > 1)
		{
			var sub = elem.value.substr(0, elem.value.length - 1); // entire thing except last character, the space
			var index = sub.lastIndexOf(" "); // now index to sub.length is the toEncrypt token
			sub = sub.substr(index, sub.length);
			sub = reverse(sub); // reverse token // works!
			
			elem.value = elem.value.substr(0, elem.value.length - sub.length); // update the value to prepare appending
			//alert(elem.value);
			//alert(sub);
			elem.value = elem.value.concat(sub); // whoohoo!! Works! :D
		}
	}
	
	if (evt.keyCode == 8) // backspace reverses, must fire only when deleted char was space
	{
		//alert("backspace pressed"); // works
		//alert(MESSAGE + "hello"); // test if space was saved // works
		
		if(MESSAGE.charAt(MESSAGE.length - 1) == ' ' && elem.value.indexOf(" ") > 1) // works
		{
			//alert(MESSAGE);
			var index = elem.value.lastIndexOf(" ");
			var sub = elem.value.substr(index, elem.value.length);
			sub = reverse(sub);
			//sub = sub.substr(0, sub.length); // get rid of extra space
			elem.value = elem.value.substr(0, elem.value.length - sub.length).concat(" ", sub); 
		    elem.value = elem.value.substr(0, elem.value.length - 1); // extra space
		}
		else if(MESSAGE.charAt(MESSAGE.length - 1) == ' ' && elem.value.indexOf(" ") == -1)
		{
			elem.value = reverse(elem.value);
			//var index = 0;
			//var sub = elem.value.substr(index, elem.value.length - 1);
			//sub = reverse(sub);
			//sub = sub.substr(0, sub.length); // get rid of extra space
			//elem.value = elem.value.substr(0, elem.value.length - sub.length).concat(sub); 
			//elem.value = elem.value.substr(0, elem.value.length - 1); // extra space
			//elem.value = sub;
		}
		//var elem = document.getElementById("m"); // gets box\
		//var message = elem.value;
		//alert(occurrences(elem.value, " ")); // works
		
		// compare elem.value to MESSAGE and see if the last token was space
		
	}
	
	MESSAGE = elem.value;
});

function reverse(str)
{
	return str.split("").reverse().join("");
}

/** Function count the occurrences of substring in a string;
 * @param {String} string   Required. The string;
 * @param {String} subString    Required. The string to search for;
 * @param {Boolean} allowOverlapping    Optional. Default: false;
 */
function occurrences(string, subString, allowOverlapping)
{

	string+=""; subString+="";
	if(subString.length<=0) return string.length+1;

	var n=0, pos=0;
	var step=(allowOverlapping)?(1):(subString.length);

	while(true)
	{
		pos=string.indexOf(subString,pos);
		if(pos>=0){ n++; pos+=step; } else break;
	}
	return(n);
}
