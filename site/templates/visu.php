<?php snippet('header') ?>

<div class="row">
  <svg width="700" height="700" style="background-color:'white'"></svg>
</div>

<script src="https://d3js.org/d3.v4.min.js"></script>

<script>

var containerWidth = +d3.select('.container-fluid').style('width').slice(0,-2);
  console.log(containerWidth);

var svg = d3.select("svg").attr("width", containerWidth).attr("height", containerWidth);
var defs = svg.append('defs');


var svg = d3.select("svg"),
    margin = 0,
    diameter = +svg.attr("width"),
    g = svg.append("g").attr("transform", "translate(" + diameter / 2 + "," + diameter / 2 + ")");

var color = d3.scaleLinear()
    .domain([-1, 5])
    .range(["rgb(255,255,255)", "hsl(228,30%,40%)"])
    .interpolate(d3.interpolateHcl);

var pack = d3.pack()
    .size([diameter - margin, diameter - margin])
    .padding(2);

d3.json('../../api', function(error, root) {
  if (error) throw error;

  root = d3.hierarchy(root)
      .sum(function(d) { return d.size; })
      .sort(function(a, b) { return b.value - a.value; });

  var focus = root,
      nodes = pack(root).descendants(),
      view;


defs.selectAll('pattern').data(nodes).enter().append('pattern')
            .attr('id', function(d) { return d.data.username; })
            .attr('patternContentUnits', 'objectBoundingBox')
            .attr('width', '1')
            .attr('height', '1')
            .append('image')
            .attr('xlink:href', function(d) { return d.data.image; })
            .attr('width', '1')
            .attr('height', '1')
            .attr("preserveAspectRatio", "xMinYMin slice");



  var circle = g.selectAll("circle")
    .data(nodes)
    .enter().append("circle")
      .attr("class", function(d) { return d.parent ? d.children ? "node" : "node node--leaf" : "node node--root"; })
      .attr("fill", function(d) { return d.children ? color(d.depth) : "url(#"+d.data.username+")"; })
      .on("click", function(d) { if (focus !== d) zoom(d), d3.event.stopPropagation(); });

  var text = g.selectAll("text")
    .data(nodes)
    .enter().append("text")
      .attr("class", "label")
      .style("fill-opacity", function(d) { return d.parent === root ? 1 : 0; })
      .style("display", function(d) { return d.parent === root ? "inline" : "none"; })
      .text(function(d) { return d.data.name; });


  var node = g.selectAll("circle,text");

  svg
      .style("background", color(-1))
      .style("margin-top", "-325px")
      .on("click", function() { zoom(root); });

  zoomTo([root.x, root.y, root.r * 2 + margin]);

  function zoom(d) {
    var focus0 = focus; focus = d;

    var transition = d3.transition()
        .duration(d3.event.altKey ? 7500 : 750)
        .tween("zoom", function(d) {
          var i = d3.interpolateZoom(view, [focus.x, focus.y, focus.r * 2 + margin]);
          return function(t) { zoomTo(i(t)); };
        });

    transition.selectAll("text")
      .filter(function(d) { return d.parent === focus || this.style.display === "inline"; })
        .style("fill-opacity", function(d) { return d.parent === focus ? 1 : 0; })
        .on("start", function(d) { if (d.parent === focus) this.style.display = "inline"; })
        .on("end", function(d) { if (d.parent !== focus) this.style.display = "none"; });
  }

  function zoomTo(v) {
    var k = diameter / v[2] / 2; view = v;
    node.attr("transform", function(d) { return "translate(" + (d.x - v[0]) * k + "," + (d.y - v[1]) * k + ")"; });
    circle.attr("r", function(d) { return d.r * k; });
  }
});

console.log(json);

</script>



<?php snippet('footer') ?>