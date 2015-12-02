		function p2g(checkboxId,scrollId){
			document.getElementById(checkboxId).onchange = function() {
				if (this.checked) {
					g2p.activate();
				} else {
					g2p.deactivate();
				}
			};

			var scrollableContainer = document.getElementById(scrollId);
			var g2p = new GrabToPan({
				element: scrollableContainer,         // required
				onActiveChanged: function(isActive) { // optional
					if (window.console) { // IE doesn't define console unless the devtools are open
						console.log('Grab-to-pan is ' + (isActive ? 'activated' : 'deactivated'));
					}
				}
			});
			g2p.activate();
		}