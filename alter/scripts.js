//var textGen = "Lightly oil a large bowl, then place dough in the bowl and turn to coat with oil. Cover with a light cloth and let rise in a warm place (80 to 95 degrees F (27 to 35 degrees C)) until doubled in volume, about 1 hour. Punch dough down, divide into 4 equal pieces, and form each into a ball.";
var textGen = document.getElementById("hiddenVar").value;
console.log(textGen);
function addNewlines(str) {
	var result = '';
	while (str.length > 0) {
	  result += str.substring(0, 60) + '\n';
	  str = str.substring(60);
	}
	return result;
  }
  var newText = addNewlines(textGen);
var canvas = document.getElementById('canv'),
		ctx = canvas.getContext('2d'),
    img = document.getElementById('image');

function grow(el) {
	el.style.height = "10rem";
	el.style.height = (el.scrollHeight)+"px";
}

var generate = function() {
	//var text = document.getElementById('textGen').value.split("\n").join("\n");
	var text = newText;
	var x = 20;
	var y = 30;
	var lineheight = 36;
	var lines = text.split('\n');
	var lineLengthOrder = lines.slice(0).sort(function(a, b) {
		return b.length - a.length;
	});
	ctx.canvas.width = ctx.measureText(lineLengthOrder[0]).width + 100;
	ctx.canvas.height = (lines.length * lineheight);

	ctx.fillStyle = "#232323";
	ctx.fillRect(0, 0, canvas.width, canvas.height);
	ctx.textBaseline = "middle";
	ctx.font="36px Anonymous Pro";
	ctx.fillStyle = "#BBBBBB";
	for (var i = 0; i<lines.length; i++)
		ctx.fillText(lines[i], x, y + (i*lineheight) );
	img.src = ctx.canvas.toDataURL();
}
	/*document.getElementById('submit').addEventListener('click', function (){
	document.getElementById("image").style.display = 'block';
	generate();
	
});
*/

//document.getElementById("image").style.display = 'block';
	generate();
	generate();
