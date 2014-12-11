totalMessage = asdf 	// total message; substring: asdf
_							  	// space pressed; if only 1 space occurance, substring = total message;
substring = substring.reverse()	// encryption done!
// now we need to replace the token with the new encrypted token
var totalMessage = totalMessage;
var tokens = substring;

for (var i = 0; i < tokens.length; i++) 
{
    totalMessage.replace(new RegExp(tokens, "g"),"{"+i+"}");
}
// string processing here
for (var i = 0; i < tokens.length; i++) 
{
    totalMessage.replace(new RegExp("{"+i+"}","g"),tokens[i]);
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

    while(true){
        pos=string.indexOf(subString,pos);
        if(pos>=0){ n++; pos+=step; } else break;
    }
    return(n);
}