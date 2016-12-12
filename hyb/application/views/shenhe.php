<style>
.node {
  stroke: #fff;
  stroke-width: 1.5px;
}
.nodetext {
  fill: #000;
  font-size:4px;
  cursor:pointer;
  pointer-events:none;
 }

.link {
  stroke: #999;
  stroke-opacity: .6;
}
</style>
<script src="/js/d3.v3.min.js"></script>
<script>
var width = $('body').width(),
  height = 1500;

var color = d3.scale.category20();

var force = d3.layout.force()
  .charge(-150)
  .linkDistance(50)
  .linkStrength(1)
  .size([width, height]);

var svg = d3.select("body").append("svg")
  .attr("width", width)
  .attr("height", height);

d3.json("/hyb/welcome/shenhe", function(error, graph) {
  if (error) console.log(error);
  force
    .nodes(graph.nodes)
    .links(graph.links)
    .start();

  var link = svg.selectAll(".link")
    .data(graph.links)
    .enter().append("line")
    .attr("class", "link")
    .style("stroke-width", function(d) {
      return 1;
    });

  var node = svg.selectAll(".node")
    .data(graph.nodes)
    .enter()
    .append("g")
    .call(force.drag);

  node.append("circle")
    .attr("class", "node")
    .attr("r", function(d) {
      return 1 + Math.sqrt(d.group);
    })
    .style("fill", function(d) {
      return color(d.group);
    });

  node.append("title")
    .text(function(d) {
      return d.name + '\r\n' + (1 + Math.sqrt(d.group));
    });

  node.append("text")
    .attr("dy", ".3em")
    .attr("class", "nodetext")
    .style("text-anchor", "middle")
    .text(function(d) {
      return d.name;
    });

  force.on("tick", function() {
    link.attr("x1", function(d) {
        return d.source.x;
      })
      .attr("y1", function(d) {
        return d.source.y;
      })
      .attr("x2", function(d) {
        return d.target.x;
      })
      .attr("y2", function(d) {
        return d.target.y;
      });

    node.attr("transform", function(d) {
      return "translate(" + d.x + "," + d.y + ")";
    });
  });
});
</script>