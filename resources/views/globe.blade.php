<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <script src="https://cesium.com/downloads/cesiumjs/releases/1.68/Build/Cesium/Cesium.js"></script>
  <link href="https://cesium.com/downloads/cesiumjs/releases/1.68/Build/Cesium/Widgets/widgets.css" rel="stylesheet">
</head>
<body>
  <!-- <div id="cesiumContainer" style="width: 700px; height:400px"></div> -->
  <div id="cesiumContainer" style="width: 700px; height:400px"></div>
  <div id="loadingOverlay"><h1>Loading...</h1></div>
  <div id="toolbar"></div>

  <script>
    Cesium.Ion.defaultAccessToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiI0YmM5ZmM2Mi1hODI3LTQzNjAtOTkxMC0yM2I4NDc2NzE3YjciLCJpZCI6MjY1NzMsInNjb3BlcyI6WyJhc3IiLCJnYyJdLCJpYXQiOjE1ODc5NjU4ODN9.XHXxpksVhsXbp0ec_adNEjQ6LjW2AAgEqhMLtOmupaw';
    var viewer = new Cesium.Viewer('cesiumContainer');

    var pinBuilder = new Cesium.PinBuilder();
    var bluePin = viewer.entities.add({
        name : 'Blank blue pin',
        position : Cesium.Cartesian3.fromDegrees(51, 0),
        billboard : {
            image : pinBuilder.fromColor(Cesium.Color.ROYALBLUE, 48).toDataURL(),
            verticalOrigin : Cesium.VerticalOrigin.BOTTOM
        }
    });

    var groceryPin = Cesium.when(pinBuilder.fromText('ttttttttt', Cesium.Color.GREEN, 100), function(canvas) {
        return viewer.entities.add({
            name : 'Grocery store',
            position : Cesium.Cartesian3.fromDegrees(-75.1705217, 39.921786),
            billboard : {
                image : canvas.toDataURL(),
                verticalOrigin : Cesium.VerticalOrigin.BOTTOM
            }
        });
    });

    Cesium.when.all([groceryPin], function(pins){
        viewer.zoomTo(pins);
    });
  </script>
</body>
</html>