	/** NOTE Add functionality to pdf viewer
	 * we can use the add event fuunction
	 */
	
	
	function addEvent(element, evnt, funct){
		if (element.attachEvent)
			return element.attachEvent('on'+evnt, funct);
		else
			return element.addEventListener(evnt, funct, false);
	}

    function fullScreen(id) {
		
      var viewer = document.getElementById(id);
      var rFS = viewer.mozRequestFullScreen || viewer.webkitRequestFullscreen || viewer.requestFullscreen || viewer.msRequestFullscreen;
      rFS.call(viewer);
    }