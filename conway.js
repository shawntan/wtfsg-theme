var horizontalCells, verticalCells;
var ctx;
function initiateMap(x,y) {
	var cellSet = new Array(2);
	cellSet[0] = new Array(x);
	cellSet[1] = new Array(x);
	for(var i=0;i<cellSet[0].length;i++) {
		cellSet[0][i]=new Array(y);
		cellSet[1][i]=new Array(y);
	}

	return cellSet;
}
function colourCell(i,j,clear) {
	if(clear) ctx.clearRect(
		(i*CELL_WIDTH)	+ 1,
		(j*CELL_WIDTH)	+ 1,
		CELL_WIDTH		- 2,
		CELL_WIDTH		- 2
	);
	else ctx.fillRect(
		(i*CELL_WIDTH)	+ 1,
		(j*CELL_WIDTH)	+ 1,
		CELL_WIDTH		- 2,
		CELL_WIDTH		- 2
	);
}
var updateRule= function(cellSetPrev,i,j){
	var thresh=0;
	var 
	left =	(cellSetPrev.length + i-1)%cellSetPrev.length,
	right = (i+1)%cellSetPrev.length,
	up =	(cellSetPrev[0].length + j-1)%cellSetPrev[0].length,
	down =	(j+1)%cellSetPrev[0].length;
	thresh+=(cellSetPrev[left][up])?1:0;
	thresh+=(cellSetPrev[left][down])?1:0;
	thresh+=(cellSetPrev[right][up])?1:0;
	thresh+=(cellSetPrev[right][down])?1:0;
	thresh+=(cellSetPrev[left][j])?1:0;
	thresh+=(cellSetPrev[right][j])?1:0;
	thresh+=(cellSetPrev[i][up])?1:0;
	thresh+=(cellSetPrev[i][down])?1:0;
	if(cellSetPrev[i][j]) {
		if(thresh == 2 || thresh == 3) return true;
		else return false;
	} else {
		if(thresh==3) return true;
		else return false;
	}
}
var computeStep = function(cellSet,cellSetPrev,stepNo){
	for(var i=0;i<cellSet.length;i++){
		for(var j=0;j<cellSet[0].length;j++){
			var live = updateRule(cellSetPrev,i,j)
			cellSet[i][j] = live?1:0;
			if(cellSet[i][j]!=cellSetPrev)colourCell(i,j,!live);
		}
	}
};
var updateMap;
var draw = function(){
	var canvas = document.getElementById('conway');
	var w = canvas.width, h = canvas.height;
	if (canvas.getContext){
		ctx = canvas.getContext('2d');
		ctx.fillStyle = CELL_COLOR;
		horizontalCells = w/CELL_WIDTH;
		verticalCells = h/CELL_WIDTH;
		var cellSet = initiateMap(horizontalCells,verticalCells);
		var stepNo = 0;
		updateMap = function(){
			computeStep(cellSet[(stepNo+1)%2],cellSet[stepNo%2],stepNo);
			stepNo++;
		};
		canvas.onclick = function(e) {
			var map = cellSet[stepNo%2];
			var x = Math.floor(e.offsetX/CELL_WIDTH);
			var y = Math.floor(e.offsetY/CELL_WIDTH);
			if(!map[x][y]) {
				map[x][y] = 1;
				colourCell(x,y,false);
			} else {
				map[x][y] = 0;
				colourCell(x,y,true);
			}
		}
	}
}
var _onload = window.onload;
window.onload = function() {
	if(_onload) _onload();
	draw();
}


var id;
function start(){
	id = setInterval(updateMap,100);
}
function stop(){
	clearInterval(id);
}
