var horizontalCells, verticalCells;
var ctx;
var T = true;
var F = false;
var occ,occNew;
var SAVED;
var printArray;


var start = function() {
	if(id==-1) id = setInterval(updateMap,100);
}
function stop(){
	if(id != -1) {
		clearInterval(id);
		id = -1;
	}
}
function toggle() {
	if(id==-1) start();
	else stop();
}

var Cell = function(x,y,val) {
	this.x = x;
	this.y = y;
	this.val = {false:0,true:0};
	this.updated = false;
	this.neighbours = new Array(8);
	this.update = function() {
		var occN = 
			this.neighbours[0].val[F]+
			this.neighbours[1].val[F]+
			this.neighbours[2].val[F]+
			this.neighbours[3].val[F]+
			this.neighbours[4].val[F]+
			this.neighbours[5].val[F]+
			this.neighbours[6].val[F]+
			this.neighbours[7].val[F];
		if(occN == 2) this.val[T] = this.val[F];
		else {
			if(occN == 3) this.val[T] = 1;
			else if(occN < 2 || occN > 3) this.val[T] = 0;
			this.colour();
		}
		if(this.val[T]==1) occNew[occNew.count++] = this;
		this.updated = true;
	};
	this.colour = function() {
		if(this.val[T] == this.val[F]) return;
		if(!this.val[T]) ctx.clearRect(
			(this.x*CELL_WIDTH)	+ 1,
			(this.y*CELL_WIDTH)	+ 1,
			CELL_WIDTH			- 1,
			CELL_WIDTH			- 1
		);
		else ctx.fillRect(
			(this.x*CELL_WIDTH)	+ 1,
			(this.y*CELL_WIDTH)	+ 1,
			CELL_WIDTH			- 1,
			CELL_WIDTH			- 1
		);
	};
	this.clicked = function() {
		this.val[T] = this.val[F]==0?1:0;
		this.colour();
		this.val[F] = this.val[T];
		if(this.val[T]==1) occNew[occNew.count++] = this;
	};

}

function initiateMap() {
	var board = new Array(horizontalCells);
	occ = new Array(horizontalCells*verticalCells);
	occNew = new Array(horizontalCells*verticalCells);
	occ.count=0;
	occNew.count=0;
	for(var i=0;i<horizontalCells;i++) {
		board[i]=new Array(verticalCells);
		for(var j=0;j<verticalCells;j++) {
			board[i][j] = new Cell(i,j,SAVED?SAVED[i][j]:null);
		}
	}
	for(var i=0;i<horizontalCells;i++) {
		var l = (horizontalCells + i-1)%horizontalCells;
		var r = (i+1)%horizontalCells;
		for(var j=0;j<verticalCells;j++) {
			var u = (verticalCells + j-1)%verticalCells;
			var d = (j+1)%verticalCells;
			board[i][j].neighbours[0] = board[l][u];
			board[i][j].neighbours[1] = board[i][u];
			board[i][j].neighbours[2] = board[r][u];
			board[i][j].neighbours[3] = board[l][j];
			board[i][j].neighbours[4] = board[r][j];
			board[i][j].neighbours[5] = board[l][d];
			board[i][j].neighbours[6] = board[i][d];
			board[i][j].neighbours[7] = board[r][d];
		}
	}
	window.printArray = function() {
		var saved = "";
		for(var i=0;i<horizontalCells;i++) {
			for(var j=0;j<verticalCells;j++) {
				if(board[i][j].val[F]==1)
					saved += "board["+board[i][j].x+"]["+board[i][j].y+"].clicked();\n";
			}
		}
		console.log(saved);
	};
	return board;
}

function computeStep(board){
	var temp = occNew;
	occNew = occ;
	occ = temp;
	occNew.count = 0;
	for(var i=0;i<occ.count;i++) {
		var cell = occ[i];
		if(!cell.updated) cell.update();
		for(var n=0;n<8;n++){
		 	var c = cell.neighbours[n];
			if(!c.updated) c.update();
		}
	}
	for(var i=0;i<occ.count;i++) {
		occ[i].val[F] = occ[i].val[T];
		occ[i].updated = false;
		for(var n=0;n<8;n++){
			occ[i].neighbours[n].val[F] = occ[i].neighbours[n].val[T];
			occ[i].neighbours[n].updated = false;
		}
	}
};
var id = -1;
var init = function(){
	var canvas = document.getElementById('conway');
	var w = canvas.width, h = canvas.height;
	if (canvas.getContext){
		ctx = canvas.getContext('2d');
		ctx.fillStyle = CELL_COLOR;
		horizontalCells = w/CELL_WIDTH;
		verticalCells = h/CELL_WIDTH;
		var board = initiateMap();
		console.log(board);
		window.updateMap = function(){
			computeStep(board);
		};
		canvas.onclick = function(e) {
			e.offsetX = e.offsetX || e.layerX;
			e.offsetY = e.offsetY || e.layerY;
			var x = Math.floor((e.offsetX-1)/CELL_WIDTH);
			var y = Math.floor((e.offsetY-1)/CELL_WIDTH);
			board[x][y].clicked();
		};
	}
	if(preload) preload(board);
}
init();

