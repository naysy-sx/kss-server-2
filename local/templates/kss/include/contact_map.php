<div class="contacts-map" id="map" style="height: 675px"></div>
<script>
  ymaps.ready(function() {
    var myMap = new ymaps.Map("map", {
      center: [45.024125, 39.054994],
      zoom: 17,
      controls: ["zoomControl"],
    });

    myMap.behaviors.disable("scrollZoom");

    function checkWindowSize() {
      if (window.innerWidth < 1200) {
        myMap.behaviors.disable("drag");
        myMap.behaviors.disable("multiTouch");
      } else {
        myMap.behaviors.enable("drag");
        myMap.behaviors.enable("multiTouch");
      }
    }

    checkWindowSize();
    window.addEventListener("resize", checkWindowSize);

    var myPlacemark = new ymaps.Placemark(
      [45.024125, 39.054994], {
        balloonContent: "КубаньСтрой",
      },
    );

    myMap.geoObjects.add(myPlacemark);
  });
</script>