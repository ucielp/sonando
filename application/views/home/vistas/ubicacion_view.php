		<div class="header_page">
            <h1>El Predio</h1>
            <h2>&nbsp;</h2>
        </div>
        <div id="map"></div>
        
		<script type="text/javascript">
        var map = new GMap2(document.getElementById("map"));
		var mapTypeControl = new GMapTypeControl();
		var topRight = new GControlPosition(G_ANCHOR_TOP_RIGHT, new GSize(10,10));
		var bottomRight = new GControlPosition(G_ANCHOR_BOTTOM_RIGHT, new GSize(10,10));
		map.addControl(mapTypeControl, topRight);
		GEvent.addListener(map, "dblclick", function() {
		  map.removeControl(mapTypeControl);
		  map.addControl(new GMapTypeControl(), bottomRight);
		});
		map.addControl(new GSmallMapControl());
		map.setCenter(new GLatLng(-32.911243, -60.739163), 15);

		var marker = new GMarker(new GPoint(-60.739163, -32.911243));
		map.addOverlay(marker);
		</script>
	

        </div> <!-- END CONTAINER-->
	</div> <!-- END WRAPPER -->
        
        