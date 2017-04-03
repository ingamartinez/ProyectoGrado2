<template>
    <div id="svg-wrapper"></div>
    <button v-on:click="BEAT_VALUES = [0, 0, 3, -4, 20, -15, 3, 0, 0]">{{ counter }}</button>
</template>

<style>
    #svg-wrapper {
        width: 500px;
        height: 160px;
        margin: 2em auto;
    }

    svg path {
        fill: none;
        stroke: #000;
        stroke-width: 1.5px;
    }

    svg .axis {
        font-size: 12px;
    }

    svg .axis path {
        display: none;
    }
</style>

<script>
    let data = {
        BEAT_VALUES : [0, 0, 3, -4, 10, -7, 3, 0, 0]
    };
    let svg = null;
    let circle = null;
    let circleTransition = null;
    let latestBeat = null;
    let insideBeat = false;
    let datos = [];

    let SECONDS_SAMPLE = 5;
    let BEAT_TIME = 400;
    let TICK_FREQUENCY = SECONDS_SAMPLE * 1000 / BEAT_TIME;
    let BEAT_VALUES = data.BEAT_VALUES;

    let CIRCLE_FULL_RADIUS = 40;
    let MAX_LATENCY = 5000;

    let colorScale = d3.scale.linear()
        .domain([BEAT_TIME, (MAX_LATENCY - BEAT_TIME) / 2, MAX_LATENCY])
        .range(["#6D9521", "#D77900", "#CD3333"]);

    let radiusScale = d3.scale.linear()
        .range([5, CIRCLE_FULL_RADIUS])
        .domain([MAX_LATENCY, BEAT_TIME]);


    export default {
        data:function() {
            return data;
        },
        mounted() {

            function beat() {

                if (insideBeat) return;
                insideBeat = true;

                let now = new Date();
                let nowTime = now.getTime();

                if (datos.length > 0 && datos[datos.length - 1].date > now) {
                    datos.splice(datos.length - 1, 1);
                }

                datos.push({
                    date: now,
                    value: 0
                });

                let step = BEAT_TIME / BEAT_VALUES.length - 2;
                for (let i = 1; i < BEAT_VALUES.length; i++) {
                    datos.push({
                        date: new Date(nowTime + i * step),
                        value: BEAT_VALUES[i]
                    });
                }

                latestBeat = now;

                circleTransition = circle.transition()
                    .duration(BEAT_TIME)
                    .attr("r", CIRCLE_FULL_RADIUS)
                    .attr("fill", "#6D9521");

                setTimeout(function() {
                    insideBeat = false;
                }, BEAT_TIME);
            }

            let svgWrapper = document.getElementById("svg-wrapper");
            let margin = {left: 10, top: 10, right: CIRCLE_FULL_RADIUS * 3, bottom: 10},
                width = svgWrapper.offsetWidth - margin.left - margin.right,
                height = svgWrapper.offsetHeight - margin.top - margin.bottom;

            // create SVG
            svg = d3.select('#svg-wrapper').append("svg")
                .attr("width", width + margin.left + margin.right)
                .attr("height", height + margin.bottom + margin.top)
                .append("g")
                .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

            circle = svg
                .append("circle")
                .attr("fill", "#6D9521")
                .attr("cx", width + margin.right / 2)
                .attr("cy", height / 2)
                .attr("r", CIRCLE_FULL_RADIUS);

            // init scales
            let now = new Date(),
                fromDate = new Date(now.getTime() - SECONDS_SAMPLE * 1000);

            // create initial set of datos
            datos.push({
                date: now,
                value: 0
            });

            let x = d3.time.scale()
                    .domain([fromDate, new Date(now.getTime())])
                    .range([0, width]),
                y = d3.scale.linear()
                    .domain([-10, 10])
                    .range([height, 0]);

            let line = d3.svg.line()
                .interpolate("basis")
                .x(function(d) {
                    return x(d.date);
                })
                .y(function(d) {
                    return y(d.value);
                });

            let xAxis = d3.svg.axis()
                .scale(x)
                .orient("bottom")
                .ticks(d3.time.seconds, 1)
                .tickFormat(function(d) {
                    let seconds = d.getSeconds() === 0 ? "00" : d.getSeconds();
                    return seconds % 10 === 0 ? d.getMinutes() + ":" + seconds : ":" + seconds;
                });

            // add clipPath
            svg.append("defs").append("clipPath")
                .attr("id", "clip")
                .append("rect")
                .attr("width", width)
                .attr("height", height);

            let axis = d3.select("svg").append("g")
                .attr("class", "axis")
                .attr("transform", "translate(0," + height + ")")
                .call(xAxis);

            let path = svg.append("g")
                .attr("clip-path", "url(#clip)")
                .append("path")
                .attr("class", "line");

            svg.select(".line")
                .attr("d", line(datos));

            let transition = d3.select("path").transition()
                .duration(100)
                .ease("linear");

            (function tick() {

                transition = transition.each(function() {

                    // update the domains
                    now = new Date();
                    fromDate = new Date(now.getTime() - SECONDS_SAMPLE * 1000);
                    x.domain([fromDate, new Date(now.getTime() - 100)]);

                    let translateTo = x(new Date(fromDate.getTime()) - 100);

                    // redraw the line
                    svg.select(".line")
                        .attr("d", line(datos))
                        .attr("transform", null)
                        .transition()
                        .attr("transform", "translate(" + translateTo + ")");

                    // slide the x-axis left
                    axis.call(xAxis);

                }).transition().each("start", tick);
            })();

            setInterval(function() {

                now = new Date();
                fromDate = new Date(now.getTime() - SECONDS_SAMPLE * 1000);

                for (let i = 0; i < datos.length; i++) {
                    if (datos[i].date < fromDate) {
                        datos.shift();
                    } else {
                        break;
                    }
                }

                if (insideBeat) return;

                datos.push({
                    date: now,
                    value: 0
                });

                if (circleTransition != null) {

                    let diff = now.getTime() - latestBeat.getTime();

                    if (diff < MAX_LATENCY) {
                        circleTransition = circle.transition()
                            .duration(TICK_FREQUENCY)
                            .attr("r", radiusScale(diff))
                            .attr("fill", colorScale(diff));
                    }
                }


            }, TICK_FREQUENCY);

//            setInterval(function() {
//                beat();
//            }, 2000);
            beat();
        }
    }
</script>
