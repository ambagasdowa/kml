function renderPdf(scale,urlFile,id_canvas,idPageNum,prev,next,pageCount,btnZoomIn,btnZoomOut,btnResetZoom) {

var MIN_SCALE = 0.25;
var MAX_SCALE = 5.0;
var STEP = 0.1;
var DEFAULT_SCALE = scale;

	var pdfDoc = null,
		pageNum = 1,
		pageRendering = false,
		pageNumPending = null,
// 		scale = 0.8,
		url = base64_decode(urlFile),
// 		url = '../files/policies/ibm.pdf',
// 		id_canvas = 'the-canvas',
		canvas = document.getElementById(id_canvas),//this is to become dinamyc
// 		canvas = id_canvas,//this is to become dinamyc
// 		idPageNum = 'page_num',
// 		prev = 'prev',
// 		next = 'next',
// 		pageCount = 'page_count',
// 		id_ctx = '2d',
		ctx = canvas.getContext('2d');
	/**
	* Get page info from document, resize canvas accordingly, and render page.
	* @param num Page number.
	*/
	function renderPage(num) {
		pageRendering = true;
		// Using promise to fetch the page
		pdfDoc.getPage(num).then(function(page) {
		var viewport = page.getViewport(scale);
		canvas.height = viewport.height;
		canvas.width = viewport.width;
		// Render PDF page into canvas context
		var renderContext = {
			canvasContext: ctx,
			viewport: viewport
		};
		var renderTask = page.render(renderContext);
		// Wait for rendering to finish
		renderTask.promise.then(function () {
			pageRendering = false;
			if (pageNumPending !== null) {
			// New page rendering is pending
			renderPage(pageNumPending);
			pageNumPending = null;
			}
		});
		});
		// Update page counters
		document.getElementById(idPageNum).textContent = pageNum;
	}
	/**
	* If another page rendering in progress, waits until the rendering is
	* finised. Otherwise, executes rendering immediately.
	*/
	function queueRenderPage(num) {
		if (pageRendering) {
		pageNumPending = num;
		} else {
		renderPage(num);
		}
	}
	
	/**
	 * SET the zoom mechanish
	 */
	
	function resetZoom() {
		scale = DEFAULT_SCALE;
		queueRenderPage(pageNum);
	}
	document.getElementById(btnResetZoom).addEventListener('click', resetZoom);
	
	function zoomIn() {
		if (scale > MAX_SCALE) {
			return;
		}
		scale = scale+STEP;
		queueRenderPage(pageNum);
	}
	document.getElementById(btnZoomIn).addEventListener('click', zoomIn);
// 	console.log(btnZoomIn);
  
	function zoomOut() {
		if (scale < MIN_SCALE) {
			return;
		}
		scale = scale-STEP;
		queueRenderPage(pageNum);
	}
	document.getElementById(btnZoomOut).addEventListener('click', zoomOut);
// 	console.log(btnZoomOut);
	
	
	/**
	* Displays previous page.
	*/
	function onPrevPage() {
		if (pageNum <= 1) {
		return;
		}
		pageNum--;
		queueRenderPage(pageNum);
	}
	document.getElementById(prev).addEventListener('click', onPrevPage);
	/**
	* Displays next page.
	*/
	function onNextPage() {
		if (pageNum >= pdfDoc.numPages) {
		return;
		}
		pageNum++;
		queueRenderPage(pageNum);
	}
	document.getElementById(next).addEventListener('click', onNextPage);

	/**
	* Asynchronously downloads PDF.
	*/
	PDFJS.getDocument(url).then(function (pdfDoc_) {
		pdfDoc = pdfDoc_;
		document.getElementById(pageCount).textContent = pdfDoc.numPages;

		// Initial/first page rendering
		renderPage(pageNum);
	});
};