
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));
// Vue.component('heartbeat', require('./components/HeartBeat.vue'));

// const app = new Vue({
//     el: '#app'
// });


window.onload = function() {
    var BEAT_VALUES = [];
    var svg = null;
    var circle = null;
    var circleTransition = null;
    var latestBeat = null;
    var insideBeat = false;
    var data = [];

    var SECONDS_SAMPLE = 5;
    var BEAT_TIME = 400;
    var TICK_FREQUENCY = SECONDS_SAMPLE * 1000 / BEAT_TIME;
//        var BEAT_VALUES = [0, 0, 3, -4, 10, -7, 3, 0, 0];

    var CIRCLE_FULL_RADIUS = 40;
    var MAX_LATENCY = 5000;

    var colorScale = d3.scale.linear()
        .domain([BEAT_TIME, (MAX_LATENCY - BEAT_TIME) / 2, MAX_LATENCY])
        .range(["#6D9521", "#D77900", "#CD3333"]);

    var radiusScale = d3.scale.linear()
        .range([5, CIRCLE_FULL_RADIUS])
        .domain([MAX_LATENCY, BEAT_TIME]);

    function beat() {
        if (insideBeat) return;
        insideBeat = true;

        var now = new Date();
        var nowTime = now.getTime();

        if (data.length > 0 && data[data.length - 1].date > now) {
            data.splice(data.length - 1, 1);
        }

        data.push({
            date: now,
            value: 0
        });

        var step = BEAT_TIME / BEAT_VALUES.length - 2;
        for (var i = 1; i < BEAT_VALUES.length; i++) {
            data.push({
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

    var svgWrapper = document.getElementById("svg-wrapper");
    var margin = {left: 10, top: 10, right: CIRCLE_FULL_RADIUS * 3, bottom: 10},
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
    var now = new Date(),
        fromDate = new Date(now.getTime() - SECONDS_SAMPLE * 1000);

    // create initial set of data
    data.push({
        date: now,
        value: 0
    });

    var x = d3.time.scale()
            .domain([fromDate, new Date(now.getTime())])
            .range([0, width]),
        y = d3.scale.linear()
            .domain([-10, 10])
            .range([height, 0]);

    var line = d3.svg.line()
        .interpolate("basis")
        .x(function(d) {
            return x(d.date);
        })
        .y(function(d) {
            return y(d.value);
        });

    var xAxis = d3.svg.axis()
        .scale(x)
        .orient("bottom")
        .ticks(d3.time.seconds, 1)
        .tickFormat(function(d) {
            var seconds = d.getSeconds() === 0 ? "00" : d.getSeconds();
            return seconds % 10 === 0 ? d.getMinutes() + ":" + seconds : ":" + seconds;
        });

    // add clipPath
    svg.append("defs").append("clipPath")
        .attr("id", "clip")
        .append("rect")
        .attr("width", width)
        .attr("height", height);

    var axis = d3.select("svg").append("g")
        .attr("class", "axis")
        .attr("transform", "translate(0," + height + ")")
        .call(xAxis);

    var path = svg.append("g")
        .attr("clip-path", "url(#clip)")
        .append("path")
        .attr("class", "line");

    svg.select(".line")
        .attr("d", line(data));

    var transition = d3.select("path").transition()
        .duration(100)
        .ease("linear");

    (function tick() {

        transition = transition.each(function() {

            // update the domains
            now = new Date();
            fromDate = new Date(now.getTime() - SECONDS_SAMPLE * 1000);
            x.domain([fromDate, new Date(now.getTime() - 100)]);

            var translateTo = x(new Date(fromDate.getTime()) - 100);

            // redraw the line
            svg.select(".line")
                .attr("d", line(data))
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

        for (var i = 0; i < data.length; i++) {
            if (data[i].date < fromDate) {
                data.shift();
            } else {
                break;
            }
        }

        if (insideBeat) return;

        data.push({
            date: now,
            value: 0
        });

        if (circleTransition != null) {

            var diff = now.getTime() - latestBeat.getTime();

            if (diff < MAX_LATENCY) {
                circleTransition = circle.transition()
                    .duration(TICK_FREQUENCY)
                    .attr("r", radiusScale(diff))
                    .attr("fill", colorScale(diff));
            }
        }


    }, TICK_FREQUENCY);
    beat();

    Pusher.logToConsole = true;
    //
    // var pusher = new Pusher('630b145f4caa7edf3243', {
    //     encrypted: true
    // });
    //
    // var channel = pusher.subscribe('heart-beat');
    // channel.bind('updateHeartBeat', function(data) {
        BEAT_VALUES=data.beat_values;
        beat();
    // });

    Echo.channel('heart-beat')
        .listen('UpdateHeartBeat', (e) => {
            console.log(e.heartBeat);
            BEAT_VALUES=e.heartBeat;
            beat();
        });

};