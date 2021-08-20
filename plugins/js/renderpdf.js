function renderpdf(){
	var loadingTask=pdfjsLib.getDocument("images/manga/manganame/Chapter-1.pdf");
	loadingTask.promise.then(function(pdf) {
		console.log("PDF Loaded");
		console.log(pdf.numPages)
		//var pagenumber=1
		for (var pagenumber=1; pagenumber<=pdf.numPages; pagenumber++){
		
			pdf.getPage(pagenumber).then(function(page){
				console.log("Page Loaded");
				var scale=1;
				var viewport =page.getViewport({scale:scale});
				console.log("the-canvas"+pagenumber);
				var canvas = document.createElement("canvas");
				document.body.appendChild(canvas);
				var context = canvas.getContext("2d");
				canvas.height=viewport.height;
				canvas.width = viewport.width;

				var renderContext = {
					canvasContext: context,
					viewport: viewport
				};
				var renderTask = page.render(renderContext);

				renderTask.promise.then(function(){
					console.log("Page rendered");
				});
			});
		}
	}, function (reason){
		console.error(reason);
	})

}
